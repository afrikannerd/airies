<?php
/**
 * Copyright (C) 2015-2018 Graham Breach
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
/**
 * For more information, please contact <graham@goat1000.com>
 */

require_once 'SVGGraphMultiGraph.php';
require_once 'SVGGraphCylinderGraph.php';
require_once 'SVGGraphStackedCylinderGraph.php';
require_once 'SVGGraphGroupedCylinderGraph.php';

class StackedGroupedCylinderGraph extends StackedCylinderGraph {

  protected $single_axis = true;

  // stores the actual group starts
  protected $groups = array();

  protected function Draw()
  {
    if($this->log_axis_y)
      throw new Exception('log_axis_y not supported by StackedGroupedCylinderGraph');

    $body = $this->Grid() . $this->UnderShapes();

    $group_count = count($this->groups);
    list($group_width, $bspace, $group_unit_width) =
      GroupedBarGraph::BarPosition($this->bar_width, $this->bar_width_min,
      $this->x_axes[$this->main_x_axis]->Unit(), $group_count, $this->bar_space,
      $this->group_space);

    $bar = array('width' => $group_width);
    $bnum = 0;
    $bar_count = count($this->multi_graph);
    $bars_shown = array_fill(0, $bar_count, 0);
    $bars = '';
    $this->ColourSetup($this->multi_graph->ItemsCount(-1), $bar_count);

    $this->block_width = $group_width;
    list($this->bx, $this->by) = $this->Project(-1, 0, $group_width);

    // make the top ellipse, set it as a symbol for re-use
    $top = $this->BarTop();

    // get the translation for the whole bar 
    // unit space is 1 deep * $chunk_count wide
    list($tx, $ty) = $this->Project(0, 0, $bspace);
    $all_group = array();
    if($tx || $ty)
      $all_group['transform'] = "translate($tx,$ty)";
    if($this->semantic_classes)
      $all_group['class'] = 'series';

    $group = array();
    foreach($this->multi_graph as $itemlist) {
      $item = $itemlist[0];
      $k = $item->key;
      $bar_pos = $this->GridPosition($item, $bnum);

      if(!is_null($bar_pos)) {

        for($l = 0; $l < $group_count; ++$l) {
          $bar['x'] = $bspace + $bar_pos + ($l * $group_unit_width);
          $start_bar = $this->groups[$l];
          $end_bar = isset($this->groups[$l + 1]) ? $this->groups[$l + 1] : $bar_count;

          // stack the bars in order they must be drawn
          $stack = array();
          $ypos = $yneg = 0;
          for($j = $start_bar; $j < $end_bar; ++$j) {
            $item = $itemlist[$j];
            if(!is_null($item->value)) {
              if($item->value < 0) {
                array_unshift($stack, array($j, $yneg));
                $yneg += $item->value;
              } else {
                $stack[] = array($j, $ypos);
                $ypos += $item->value;
              }
            }
          }

          $stack_last = count($stack) - 1;
          foreach($stack as $b => $stack_bar) {
            list($j, $stack_pos) = $stack_bar;
            $item = $itemlist[$j];
            $t = ($b == $stack_last ? $top : NULL);
            $bar_sections = $this->Bar3D($item, $bar, $t, $bnum, $j,
              $stack_pos);

            $group['fill'] = $this->GetColour($item, $bnum, $j);
            $show_label = $this->AddDataLabel($j, $bnum, $group, $item,
              $bar['x'] + $tx, $bar['y'] + $ty, $bar['width'], $bar['height']);

            if($this->show_tooltips)
              $this->SetTooltip($group, $item, $j, $item->key, $item->value);
            if($this->show_context_menu)
              $this->SetContextMenu($group, $j, $item);
            $link = $this->GetLink($item, $k, $bar_sections);
            $this->SetStroke($group, $item, $j, 'round');
            if($this->semantic_classes)
              $group['class'] = "series{$j}";
            $bars .= $this->Element('g', $group, NULL, $link);
            unset($group['id'], $group['class']);

            // set up legend
            $cstyle = array('fill' => $this->GetColour($item, $bnum, $j));
            $this->SetStroke($cstyle, $item, $j);

            // store whether the bar can be seen or not
            $this->bar_visibility[$j][$item->key] = ($t || $item->value != 0);
            $this->SetLegendEntry($j, $bnum, $item, $cstyle);
          }
        }
      }
      ++$bnum;
    }

    if(count($all_group))
      $bars = $this->Element('g', $all_group, NULL, $bars);
    $body .= $bars;
    $body .= $this->OverShapes();
    $body .= $this->Axes();
    return $body;
  }

  /**
   * Override AdjustAxes to change depth
   */
  protected function AdjustAxes(&$x_len, &$y_len)
  {
    /**
     * The depth is roughly 1/$num - but it must also take into account the
     * bar and group spacing, which is where things get messy
     */
    $ends = $this->GetAxisEnds();
    $num = $ends['k_max'][0] - $ends['k_min'][0] + 1;

    $block = $x_len / $num;
    $group = count($this->groups);
    $a = $this->bar_space;
    $b = $this->group_space;
    $c = (($block) - $a - ($group - 1) * $b) / $group;
    $d = ($a + $c) / $block;
    $this->depth = $d;
    return parent::AdjustAxes($x_len, $y_len);
  }

  /**
   * construct multigraph
   */
  public function Values($values)
  {
    parent::Values($values);
    if(!$this->values->error)
      $this->multi_graph = new MultiGraph($this->values, $this->force_assoc,
        $this->datetime_keys, $this->require_integer_keys);
  }

  /**
   * Check that the required options are set and match the data
   */
  protected function CheckValues()
  {
    parent::CheckValues();
    if(empty($this->stack_group))
      throw new Exception('stack_group not set for StackedGroupedBarGraph');

    // make sure the group details are stored in an array
    if(!is_array($this->stack_group))
      $this->stack_group = array($this->stack_group);

    // make the list of groups
    $datasets = count($this->multi_graph);
    $this->groups = array(0); // first starts at 0, obviously

    $last_start = 0;
    foreach($this->stack_group as $group_start) {
      if($group_start <= $last_start)
        throw new Exception('Invalid stack_group option');
      if($group_start < $datasets)
        $this->groups[] = $group_start;
      $last_start = $group_start;
    }

    // without this check there will be an invalid axis error
    if(count($this->groups) == 1)
      throw new Exception('Too few datasets for grouping');
  }

  /**
   * Returns the maximum (stacked) value
   */
  protected function GetMaxValue()
  {
    $max = NULL;
    $values = &$this->multi_graph->GetValues();

    // find the max for each group from the MultiGraph's structured data
    for($i = 0; $i < count($this->groups); ++$i) {
      $start = $this->groups[$i];
      $end = isset($this->groups[$i + 1]) ? $this->groups[$i + 1] - 1 : NULL;
      list($junk, $group_max) = $values->GetMinMaxSumValues($start, $end);
      if(is_null($max) || $group_max > $max)
        $max = $group_max;
      $start = $end + 1;
    }
    return $max;
  }

  /**
   * Returns the minimum (stacked) value
   */
  protected function GetMinValue()
  {
    $min = NULL;
    $values = &$this->multi_graph->GetValues();

    // find the min for each group from the MultiGraph's structured data
    for($i = 0; $i < count($this->groups); ++$i) {
      $start = $this->groups[$i];
      $end = isset($this->groups[$i + 1]) ? $this->groups[$i + 1] - 1 : NULL;
      list($group_min) = $values->GetMinMaxSumValues($start, $end);
      if(is_null($min) || $group_min < $min)
        $min = $group_min;
      $start = $end + 1;
    }
    return $min;
  }

}

