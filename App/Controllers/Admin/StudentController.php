<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/30/2018
 * Time: 9:47 AM
 */

namespace App\Controllers\Admin;


use Framework\Controller;

class StudentController extends Controller
{
    function index()
    {
        $this->view->setTitle('Admin | Students');
        /**
         * @var \App\Models\Students $student
         */
        $student = $this->load->model('Students');
        
        $student->setTable('classes');
        $data['classes'] = $student->all();
        $student->setTable('counties');
        $data['counties'] = $student->all();
        return $this->view->render('admin/student',$data);
    }

    function submit()
    {

        $model = $this->load->model('Students');

        $model->addStudent();
        return redirect('/admin/students');
    }

    function view()
    {
        /**
         * @var \App\Models\Students $model
         */
        $model = $this->load->model('Students');
        $data['students'] = $model->getStudents();
        return $this->view->render('admin/viewstudent',$data);
    }

    function remove()
    {
        return $this->view->render('admin/removestudent');
    }

    function profile()
    {

        /**
         * @var \App\Models\Students $model
         */
        $model = $this->load->model('Students');
        preg_match('#(\d+)$#',$this->request->url(),$id);
        $model->setTable('studentdetails');
        $data['user'] = $model->get('regid=?',$id[0]);
        if(!($data['user'] instanceof \stdClass))
        {
            $this->session->add('error',"no student exists with admission {$id[0]}");
            return redirect("/admin/viewstudent");
        }

        return $this->view->render('admin/profile',$data);
    }

}