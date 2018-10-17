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

        $model = $this->load->model('Students');
        $data['students'] = $model->getStudents();
        $model->setTable('classes');
        $data['classes'] = $model->all();
        return $this->view->render('admin/viewstudent',$data);
    }

    function remove()
    {
        $referer = $this->session->get("referer");
        preg_match('#(\d+)#',$this->request->url(),$id);
        $model = $this->load->model('Students');
        $model->setTable('students');
        $model->delete('admno=?',$id[0]);
        $model->setTable('users');
        $model->delete('regid=?',$id[0]);
        return redirect($referer);

    }

    function profile()
    {


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

    function edit()
    {
        preg_match('#(\d+)#',$this->request->url(),$id);

        $model = $this->load->model('Students');
        $model->setTable('studentdetails');
        $data['old'] = $model->get("regid=?",$id[0]);
        $model->setTable('classes');
        $data['classes'] = $model->all();
        $model->setTable('counties');
        $data['counties'] = $model->all();
        return $this->view->render('admin/edit',$data);
    }

    function update()
    {
        $referer = $this->session->get("referer");
        $ref = ADMIN_REFERER;
        if(preg_grep("#^$ref#",[$referer]))
        {
            $model = $this->load->model("Students");
            $model->update();
            return redirect($referer);
        }
        return redirect($referer);

    }
}