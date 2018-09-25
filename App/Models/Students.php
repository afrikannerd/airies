<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 9/16/2018
 * Time: 4:27 PM
 */

namespace App\Models;


use Framework\Model;

class Students extends Model
{

    function addStudent()
    {


        $this->data('name',$this->request->post('name'))
             ->data('regid',$this->request->post('admno'))
             ->data('password',password_hash($this->request->post('pwd'),\PASSWORD_DEFAULT))
             ->data('permission','1')
             ->insert('users');



        $this->data('admno',$this->request->post('admno'))
             ->data('transfer',$this->request->post('transfer'))
             ->data('fromm',$this->request->post('prev_school'))
             ->data('class',$this->request->post('class'))
             ->data('county_id',$this->request->post('county'))
             ->data('dob',$this->request->post('dob'))
             ->data('address',$this->request->post('box'))
             ->data('guardian',$this->view->request->post('guardian'))
             ->data('guardiancontact',$this->request->post('guard-contact'))
             ->insert('students');
        if($this->success())
        {
            $this->session->add('success',"Record {$this->lastID()} inserted successfully");
        }else
        {
            $this->session->add('error',$this->errors());
        }


    }

    function getStudents()
    {
        #SELECT u.*,s.*,c.classname from users as u,classes as c INNER JOIN students as s ON c.id=s.class WHERE u.regid=s.admno AND u.regid=466
        #$sql = "SELECT u.name,u.regid,c.classname from users as u,classes as c INNER JOIN students as s ON c.id=s.class WHERE u.regid=s.admno";
        return $this->select('u.name','u.regid','c.classname')
                    ->from('users as u,classes as c')
                    ->join('INNER JOIN students as s ON c.id=s.class WHERE u.regid=s.admno')
                    ->fetchAll();
    }

    public function studentDetails()
    {
        #SELECT u.*,s.*,c.classname from users as u,classes as c INNER JOIN students as s ON c.id=s.class WHERE u.regid=s.admno AND u.regid=466
        #SELECT u.* , s.* , c.classname,(SELECT name FROM counties AS c INNER JOIN students AS s ON c.id=s.county_id WHERE s.admno=u.regid) as
         #county FROM users as u,classes as c INNER JOIN students as s ON c.id=s.class WHERE u.regid=s.admno AND u.regid=466


        ;
        /*return $this->select('u.*','s.*','c.classname')
                    ->from('users as u,classes as c')
                    ->join('INNER JOIN students as s ON c.id=s.class')
                    ->where('u.regid=s.admno AND u.regid=?',$id[0])
                    ->fetch();*/


    }
}