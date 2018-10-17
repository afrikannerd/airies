<?php
header("Content-type:image/svg+xml");

require_once 'libs/SVGGraph/SVGGraph.php';

$settings = array(
    'back_colour'       => '#fff',    'stroke_colour'      => '#000',
    'back_stroke_width' => 0,         'back_stroke_colour' => '#eee',
    'axis_colour'       => '#333',    'axis_overlap'       => 2,
    'axis_font'         => 'Georgia', 'axis_font_size'     => 10,
    'grid_colour'       => '#666',    'label_colour'       => '#000',
    'fill_under'        => array(true, false),
    'marker_size'       => 4,
    'marker_type'       => array('x', 'square'),
    'marker_colour'     => array('red'),
    'line_stroke_width' => [0],
    'axis_max_v' => 100,
    'division_size_v' => [5,5],
    'show_grid' => false,
    'graph_title' => "Result Trends",
    'label_x'=>'Class',
);
$graph = new SVGGraph(400, 200,$settings);
$graph->colours = array('white');
$graph->Values(["F1T1"=>67.78,"F1T2"=>65.50,"F1T3"=>62.63,
    "F2T1"=>null,"F12T2"=>null,"F3T1"=>null,"F3T2"=>null,"F3T3"=>null,
    "F4T1"=>null,"F4T2"=>null
]);

$name = time().".svg";
$h =  $graph->Fetch('LineGraph',false);
$svg = fopen('public/media/'.$name,'w') or die('problems galore.Better call caleb');
fwrite($svg,$h);
fclose($svg);

header("Content-type:text/html");
ob_start();




?>
<!Doctype html>

<html>

<head>
    <title>Report</title>
    <meta http-equiv="Content-Type" content="svg/xml" />

<style>
html{
margin: 20px;
}
.school{
    left: 104px;
    top: 10px;
    position: absolute;
   }
    .name{font-family: Tahoma;font-weight: bold;font-size: large;color: rgb(130,78,85);}
    .address{font-family: Tahoma;
        font-weight: bold;font-size: small;color: rgb(130,78,85);}
    .email{font-family: "Courier New";font-size: 14px;color: #222}
    .report-header{height: 86px;width: inherit;}
    .student-photo{
        height: 78px;width: 78px;
        position: absolute;
        border: 1px dotted #ce8483;
        right: 10px;
        top:10px;
        text-align: center;
        }
    .divider{
        margin-top: 10px;
        margin-bottom: 10px;
        border-top: 1px solid #ccc;
    }
    .term{font-weight: bold;width: 100%;text-align: center}
    .studinfo{width: 100%;
        height: auto;font-family: Verdana, Helvetica, "Gill Sans", sans-serif;font-size: 0.7em}
    table{width: 100%;empty-cells: hide;border-spacing: 0;}
    .studinfo tr{ width: 100%;
        max-width: 98%;}
    .studinfo tr>td{width: auto;min-width: 100px;text-align: center;}
    .studinfo tr>td:last-child{text-align: right;}
    .studinfo tr>td:first-child{text-align: left;}
    .student-marks{font-size: 0.7em;}
    .student-marks td, .student-marks th {border-right: 1px solid #ccc;border-bottom: 1px solid #ccc;}
    .student-marks td:first-child{border-left: 1px solid #cccccc;}
    .student-marks th {border-top: 1px solid #ccc;font-size: 0.8em}
    .student-marks th:first-child{border-left: 1px solid #ccc;}
    .total{border-left: 1px solid #ccc;}
    .student-stats th,.student-stats td{text-align: center ;}
    .student-graph{width:400px;height: 200px;border:1px solid #ccc;}
    .teacher-remarks{position: absolute;
        margin-left: 401px;width: auto;
        height: 200px;border: 1px solid #cccccc;
        top: 106px;}
    .principal-remarks{clear: both;width: 100%;height: 150px;border:1px solid #ccc;margin-top: 10px;}
    .footer{padding: 10px;}
</style>
</head>
<body>
<div class="report-form" style="width: 100%;max-height: 98%; border: 1px dotted #c9302c;padding: 10px; position: relative">
    <div class="report-header">
        <div style=";width: 90px;height:86px;text-align: center;"><img src="public/media/logo.png"></div>
        <div class="school">
            <div class="name">SUNSHINE ACADEMY</div>
            <div class="address">P.O.BOX 44-00100<br>NAIROBI<br>+254700000000</div>
            <div class="email">academy@sunshine.ac.ke</div>
        </div>
        <div class="student-photo">
            <img src="public/media/testphoto.jpg">
        </div>
    </div>
    <div class="divider"></div>
    <div class="term">TERM 3 2018</div>
    <div class="studinfo">
        <div>
            <table>
                <tr>
                    <td><span style="font-weight: bold;">Name:</span> <?php echo $result->name?></td>
                    <td><span style="font-weight: bold;">AdmNo:</span> <?php echo $result->admno?></td>
                    <td><span style="font-weight: bold;">Form:</span> <?php echo $result->classname?></td>
                    <td><span style="font-weight: bold;">House:</span></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><span style="font-weight: bold;">FORM POSITION:</span> <u><b>23</b></u> OUT OF <u><b>159</b></u></td>
                    <td><span style="font-weight: bold;">CLASS POSITION:</span> <u><b>7</b></u> OUT OF <u><b>53</b></u></td>
                    <td><span style="font-weight: bold;">GRADE:</span> B</td>
                    <td><span style="font-weight: bold;">MEAN:</span> 62.63</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="student-marks">
        <table>
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Mid Term</th>
                    <th>End Term</th>
                    <th>Average</th>
                    <th>Grade</th>
                    <th>Points</th>
                    <th>Rank</th>
                    <th>Remarks</th>
                    <th>Teacher</th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td>Maths</td>
                    <td><?php echo $result->maths?></td>
                    <td><?php echo $result2->maths?></td>
                    <td><?php echo results($result->maths,$result2->maths)->mean()?></td>
                    <td><?php echo results($result->maths,$result2->maths)->grade()?></td>
                    <td><?php echo results($result->maths,$result2->maths)->point()?></td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <td>English</td>
                    <td><?php echo $result->english?></td>
                    <td><?php echo $result2->english?></td>
                    <td><?php echo results($result->english,$result2->english)->mean()?></td>
                    <td><?php echo results($result->english,$result2->english)->grade()?></td>
                    <td><?php echo results($result->english,$result2->english)->point()?></td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <td>Kiswahili</td>
                    <td><?php echo $result->kiswahili?></td>
                    <td><?php echo $result2->kiswahili?></td>
                    <td><?php echo results($result->kiswahili,$result2->kiswahili)->mean()?></td>
                    <td><?php echo results($result->kiswahili,$result2->kiswahili)->grade()?></td>
                    <td><?php echo results($result->kiswahili,$result2->kiswahili)->point()?></td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <td>Biology</td>
                    <td><?php echo $result->biology?></td>
                    <td><?php echo $result2->biology?></td>
                    <td><?php echo results($result->biology,$result2->biology)->mean()?></td>
                    <td><?php echo results($result->biology,$result2->biology)->grade()?></td>
                    <td><?php echo results($result->biology,$result2->biology)->point()?></td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <td>Physics</td>
                    <td><?php echo $result->physics?></td>
                    <td><?php echo $result2->physics?></td>
                    <td><?php echo results($result->physics,$result2->physics)->mean()?></td>
                    <td><?php echo results($result->physics,$result2->physics)->grade()?></td>
                    <td><?php echo results($result->physics,$result2->physics)->point()?></td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <td>Chemistry</td>
                    <td><?php echo $result->chemistry?></td>
                    <td><?php echo $result2->chemistry?></td>
                    <td><?php echo results($result->chemistry,$result2->chemistry)->mean()?></td>
                    <td><?php echo results($result->chemistry,$result2->chemistry)->grade()?></td>
                    <td><?php echo results($result->chemistry,$result2->chemistry)->point()?></td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <td>History & Gov't</td>
                    <td><?php echo $result->history?></td>
                    <td><?php echo $result2->history?></td>
                    <td><?php echo results($result->history,$result2->history)->mean()?></td>
                    <td><?php echo results($result->history,$result2->history)->grade()?></td>
                    <td><?php echo results($result->history,$result2->history)->point()?></td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <td>Geography</td>
                    <td><?php echo $result->geography?></td>
                    <td><?php echo $result2->geography?></td>
                    <td><?php echo results($result->geography,$result2->geography)->mean()?></td>
                    <td><?php echo results($result->geography,$result2->geography)->grade()?></td>
                    <td><?php echo results($result->geography,$result2->geography)->point()?></td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <td>Religion</td>
                    <td><?php echo $result->religion?></td>
                    <td><?php echo $result2->religion?></td>
                    <td><?php echo results($result->religion,$result2->religion)->mean()?></td>
                    <td><?php echo results($result->religion,$result2->religion)->grade()?></td>
                    <td><?php echo results($result->religion,$result2->religion)->point()?></td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <td>Computer Studies</td>
                    <td><?php echo $result->computer_studies?></td>
                    <td><?php echo $result2->computer_studies?></td>
                    <td><?php echo results($result->computer_studies,$result2->computer_studies)->mean()?></td>
                    <td><?php echo results($result->computer_studies,$result2->computer_studies)->grade()?></td>
                    <td><?php echo results($result->computer_studies,$result2->computer_studies)->point()?></td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <td>Business Studies</td>
                    <td><?php echo $result->business_studies?></td>
                    <td><?php echo $result2->business_studies?></td>
                    <td><?php echo results($result->business_studies,$result2->business_studies)->mean()?></td>
                    <td><?php echo results($result->business_studies,$result2->business_studies)->grade()?></td>
                    <td><?php echo results($result->business_studies,$result2->business_studies)->point()?></td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td class="total">689</td>
                    <td>B</td>
                    <td>8.9</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td class="total">1100</td>
                    <td>A</td>
                    <td>12</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="divider"></div>
    <div class="student-stats student-marks">
        <div style="text-align: center;font-weight: bold;width: 100%;font-size: 1.1em">Student Progress</div>
        <table>
            <thead>
                <tr>
                    <th>FORM 1</th>
                    <th>FORM 2</th>
                    <th>FORM 3</th>
                    <th>FORM 4</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <table>
                            <thead>
                                <tr>
                                    <th>Term</th>
                                    <th>Pos</th>
                                    <th>Out Of</th>
                                    <th>Mean</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>12</td>
                                    <td>171</td>
                                    <td>67.78</td>
                                    <td>9.2</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>6</td>
                                    <td>175</td>
                                    <td>65.50</td>
                                    <td>9.0</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>23</td>
                                    <td>159</td>
                                    <td>62.63</td>
                                    <td>8.9</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table>
                            <thead>
                            <tr>
                                <th>Term</th>
                                <th>Pos</th>
                                <th>Out Of</th>
                                <th>Mean</th>
                                <th>Points</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table>
                            <thead>
                            <tr>
                                <th>Term</th>
                                <th>Pos</th>
                                <th>Out Of</th>
                                <th>Mean</th>
                                <th>Points</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table>
                            <thead>
                            <tr>
                                <th>Term</th>
                                <th>Pos</th>
                                <th>Out Of</th>
                                <th>Mean</th>
                                <th>Points</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="divider"></div>
        <div class="student-graph">

            <img src="public/media/<?=$name?>">


        </div>
        <div class="teacher-remarks">
            <h5>Class Teacher Remarks</h5>
            <div style="border-top: 1px solid #222;margin-top: 160px;margin-left:150px;width: 170px;"></div>
        </div>

        <div class="principal-remarks">
            <div style="text-decoration: underline">Principal's Comments</div>
        </div>
        <div class="footer">
            <div style="margin: auto;padding: 5px;text-align: center;font-weight: bold;">Fees</div>
            <table>
                <thead>

                </thead>
                <tbody>
                <tr>
                    <td>Arrears</td>
                    <td style="color:green;">-14000</td>
                </tr>
                <tr>
                    <td>Next Term</td>
                    <td>26950</td>
                </tr>
                <tr>
                    <td>Total Arrears</td>
                    <td style="color:red;">12950</td>
                </tr>
                </tbody>

            </table>

        </div>
    </div>
</div>
</body>
</html>
<?php
$html = ob_get_clean();

#echo $html;die;
require_once 'libs/dompdf/autoload.inc.php';
require_once 'libs/dompdf/lib/html5lib/Parser.php';
require_once 'libs/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'libs/dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'libs/dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

use Dompdf\Dompdf;


// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($result->name.'-'.$result->admno,['Attachment'=>false]);
unlink("public/media/$name");