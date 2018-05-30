<?php
/**
 * Created by PhpStorm.
 * User: Birhan
 * Date: 5/17/2018
 * Time: 8:16 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller
{
    function __construct()
    {

        parent::__construct();
        $this->load->helper('form');
        $this->load->model('AdminModel');

        $this->load->model('Employee_model');
        $this->load->library('session');
    }
    public function createUser(){
        if(empty($this->session->userdata('admin'))){
            redirect(base_url('admin'));
        }else
        {
            $data = array(
                'page_title' => ' Create user'
            );
            $this->load->view('header',$data);
            $empdata['staffs']=$this->Employee_model->get_employes();

            $this->load->view('Admin/create_user',$empdata);
        }

    }
    public function hire(){
        $data = array(
            'page_title' => ' Employee'
        );
        $this->load->view('header',$data);
        $empdata['staffs']=$this->Employee_model->get_employes();
        $this->load->view('Admin/employee',$empdata);
    }
    function do_register(){
        $fname=$_POST['firstname'];
        $middlename=$_POST['middlename'];
        $lastname=$_POST['lastname'];
        $dob=$_POST['birthdate'];
        $gender=$_POST['gender'];
        $position=$_POST['role'];
        $today = date('Y-m-d');

        $data=array(
            'FirstName'=>$fname,
            'MiddleName'=>$middlename,
            'LastName'=>$lastname,
            'birth_date'=>$dob,
            'Gender'=>$gender,
            'position'=>$position,
            'hire_date'=>$today
        );

       $saved= $this->Employee_model->Insert($data);
       if($saved){
           $this->session->set_flashdata('saved','<p class="alert alert-success">Employee successfully registered'.$today.'</p>');
           redirect(base_url('employee/hire'));
       }else{
           $this->session->set_flashdata('saved','<p class="alert alert-danger">Employee not registered</p>');
           redirect(base_url('employee/hire'));
       }
    }
    function SaveUser(){

        $staffid=$_POST['staffid'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];

        $options=['cost'=>12];
        $encrypted_pass=password_hash($password,PASSWORD_BCRYPT,$options);

        $user_data=array(
            'Staff_ID'=>$staffid,
            'Username'=>$username,
            'password'=>$encrypted_pass
        );
      //check if exists
        $exists=$this->Employee_model->user_exists($staffid);
        if($exists){
            $this->session->set_flashdata('msg','<p class="alert alert-danger">User already exists</p>');
            redirect(base_url('employee/createUser'));
        }else{

            $nameexists=$this->Employee_model->username_exists($username);
            if($nameexists){
                $this->session->set_flashdata('msg','<p class="alert alert-danger">Username already exists</p>');
                redirect(base_url('employee/createUser'));
            }else {

                $created = $this->Employee_model->create_acount($user_data);
                if ($created) {
                    $this->session->set_flashdata('msg', '<p class="alert alert-success">User successfully created</p>');
                    redirect(base_url('employee/createUser'));
                } else {
                    $this->session->set_flashdata('msg', '<p class="alert alert-danger">User not created</p>');
                    redirect(base_url('employee/createUser'));
                }

            }
        }






    }

}