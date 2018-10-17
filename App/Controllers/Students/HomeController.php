<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 9/6/2018
 * Time: 5:19 PM
 */

namespace App\Controllers\Students;


use Framework\Controller;

class HomeController extends Controller
{
    function index()
    {
        return $this->view->render('students/index');
    }

    function login()
    {
        /**
         * @var \App\Models\Users $user
         */
        $user = $this->load->model('Users');
        $path = explode('/',$this->route->getCurrent());
        $path = end($path);
        if($user->user())
        {
            return redirect('/student');
        }else{
            if( $user->login() )
            {
                
                $this->session->add('username',$user->user()->regid);
                
                $this->session->add('path',$path);

                return redirect('/student');
            }
        }


        return $this->view->render('students/login');
    }
    function result()
    {
        return $this->view->render('students/result');
    }

    function fee()
    {
        return $this->view->render('students/fees');
    }

    function report()
    {


        $model = $this->load->model('Students');


        $result = $model->from('report')->where('admno=?',$this->session->get('username'))
                        ->where('exam_id=?',2)->fetch();
        $result2 = $model->from('report')->where('admno=?',$this->session->get('username'))
            ->where('exam_id=?',1)->fetch();

        $avg =  $model->select('(english+kiswahili+maths+physics+biology+chemistry+business_studies+computer_studies+history+geography+religion) AS average')
                     ->from('report')->where("admno=?",$this->session->get('username'))->fetchAll();
        $average=0;
        while ($t = array_shift($avg))
        {
            $average += $t->average;
        }
        $points = 0;
        $count = 0;
        $result_point1 = (array) $result;
        $result_point2 = (array) $result2;
        foreach ($result_point1 as $xkey=>$xval) {
            foreach ($result_point2 as $ykey=>$yval) {
                if(in_array($xkey,['english','kiswahili','maths','physics','biology','chemistry','business_studies','computer_studies','history','geography','religion']))
                {
                    $points += results((int)$xval,(int)$yval)->point() ;
                    $count += 1;
                }

            }
        }
        $points = round(($points/$count),2);
        $totalmarks = ceil($average/2);
        $average = round((float)($average/22),2);
        $grade = grading($average);
        return include_once 'helpers/pdf.php';

    }

}