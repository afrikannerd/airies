<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/25/2018
 * Time: 3:01 PM
 */

namespace App\Models;



use Framework\Model;

class Users extends Model
{

    /**Database user data
     * @var \stdClass | null
     */
    private $user = null;


    protected $table = 'users';

    

    function index()
    {
        $condition = func_get_args();
        
        return $this->where('admno = ?',7733)
                    ->from('students')
                    ->fetch();
    }

    function submit()
    {

    }

    /**
     * @return \stdClass|null
     */
    function user()
    {
        return $this->user;
    }

    function login():bool
    {
        if(!is_null($this->request->post('login')))
        {
        $username = $this->request->post('username');
        $this->user = $this->where('regid=?',$username)->fetch($this->table);

        if($this->user)
        {

            return password_verify($this->request->post('pwd'),$this->user->password);
        }
        }

       return false;


    }
    
    function details()
    {
        #"SELECT p.*,m.* FROM `teachers` p INNER JOIN users m ON p.tscno=m.regid";
        #"SELECT p.*,m.contact,m.class_subj FROM `users` p INNER JOIN teachers m ON m.tscno=p.regid";
        return $this->select('p.*','m.contact','m.class_subj')
             ->join('INNER JOIN teachers m ON m.tscno=p.regid')
             ->fetch('users p');
        #return $this->where('regid=?', $this->session->get('username'))->fetch($this->table);
    }

    function admin():bool
    {
        if(!is_null($this->request->post('login')))
        {

            $username = $this->request->post('username');
            $this->user = $this->where('email=?',$username)->fetch('admin');

            if($this->user)
            {
                return password_verify($this->request->post('pwd'),$this->user->password);
            }
        }

        return false;
    }


}