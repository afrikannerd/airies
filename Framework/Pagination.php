<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 10/16/2018
 * Time: 11:50 AM
 */

namespace Framework;


class Pagination
{

    /**
     * @var int $total total count of resultset
     */
    private $total;

    /**
     * @var int $per_page maximum number of records to be rendered in a page
     */
    private $per_page;
    /**
     * @var int $current the current active page
     */
    private $current = 1;

    public function __construct($total = 100,$per_page = 20,$current = 4)
    {
        #$this->app = $app;
        $this->current = $current;
        $this->per_page =$per_page;
        $this->total = $total;
        $this->app = new Application();
    }
    
    private function next()
    {
        $next = $this->current + 1;
        return ( $next <= $this->lastpage() )? $next : false;
    }

    private function lastpage()
    {
        return ceil($this->total / $this->per_page );
    }

    private function offset()
    {
        return $this->per_page * ( $this->current - 1 );
    }
    private function prev()
    {
        $prev = $this->current - 1;
        return ( $prev > 0 ) ? $prev : false;
    }
    
    private function current()
    {
        return $this->current;
    }

    public function pagelinks()
    {
        $link = $this->app->request->url();
        $page = "<ul class='pagination'>";

        if($this->prev())
        {
            $page .= "<li><a href='{$link}/page/{$this->prev()}/'><img src='".media('back.png')."'></a></li>";

        }

        for($i = 0; $i < $this->lastpage();)
        {
            $i++;
            if($i == $this->current())
            {
                $page .= "<li><a href='$i' style='pointer-events: none;cursor: default;color: #ccc;'>{$i}</a></li>";
                continue;
            }

            $page .= "<li><a href='{$link}/page/{$i}/'>{$i}</a> </li>";

        }

        if($this->next())
        {
            $page .= "<li><a href='{$link}/page/{$this->next()}/'><img src='".media('next.png')."'></a></li>";

        }

        $page .= "</ul>";
        return $page;
    }

}