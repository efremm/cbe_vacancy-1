<?php
/**
 * Created by PhpStorm.
 * User: luv2codeit
 * Date: 3/31/2018
 * Time: 8:46 AM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('AdminModel');
        $this->load->helper('email');
        $this->load->model('Employee_model');
        $this->load->model('Vacancy_model');
        $this->load->model('Applicant_model');
        $this->load->library('session');
    }
    function index(){
        $data = array(
            'page_title' => 'Admin-Login/register'
        );
        $this->load->view('header',$data);
      $this->load->view('Admin/login');
        $this->load->view('footer');
    }

    /**
     *
     */
    public function authenicate(){
         $user=$_POST['username'];
        $password=$_POST['password'];


        $user_valid=$this->AdminModel->validate_user($user,$password);
       // echo json_encode($user_valid);

        if($user_valid){
            $user= json_encode($user_valid);
            $this->session->set_userdata('admin',$user);

            redirect(base_url().'admin/home');
        }else{
            $this->session->set_flashdata('msg','<p class="alert alert-danger">Invalid credential</p>');

            redirect(base_url().'admin');
        }

   }
  public function home(){
       $data = array(
           'page_title' => 'Admin/home'
       );
       $this->load->view('header',$data);
       $home_data['staffs']=$this->Employee_model->get_employes();
      $home_data['vacancies']=$this->Vacancy_model->get_applications();
      // $home_data['vacancies']=$this->Vacancy_model->display_jobs();
       $home_data['activemembers']=$this->Applicant_model->get_all_applicants();

       $this->load->view('Admin/home',$home_data);
        $this->load->view('footer');
   }
   public function createUser(){
       $data = array(
           'page_title' => 'create user'
       );
       $this->load->view('header',$data);
       $this->load->view('Admin/createuser');
   }
  
   


   public function reports(){
       $data = array(
           'page_title' => 'Reports'
       );
       $this->load->view('header',$data);
       $this->load->view('Admin/report');
   }
  public function screening(){
         $data = array(
           'page_title' => 'screen applicants'
                 );
       $this->load->view('header',$data);
      $home_data['vacancies']=$this->Vacancy_model->get_applications();
       $this->load->view('Admin/screening',$home_data);
   }
   function sendSms(){
       $data = array(
           'page_title' => 'Send SMS'
       );
       $this->load->view('header',$data);
       $this->load->view('Admin/sendSms');
   }
   public function process_screening($vacancy_id=null){
       $data = array(
           'page_title' => 'Process screening'
       );
       $this->load->view('header',$data);
       $vacancy_id=$_POST['vacancy_id'];
       $seat=$_POST['seat'];


      $applications['applicants']=$this->Vacancy_model->get_applicants($vacancy_id);
       $applications['vacancydetail']=$this->Vacancy_model->get_job_details($vacancy_id);

       $this->load->view('Admin/process_screening',$applications);
    }
    function sendMail(){
        $data = array(
            'page_title' => 'Send Mail'
        );

        $this->load->view('header',$data);
       // $this->load->view('Admin/sendMail');

        //Load email library
        

//SMTP & mail configuration
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'birhannega844',
            'smtp_pass' => 'usmanhhh2006',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        $this->load->library('email',$config);
        //$this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

//Email content
        $htmlContent = '<h1>Sending email via SMTP server</h1>';
        $htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';

        $this->email->to('luv2codeit@gmail.com');
        $this->email->from('luv2codeit@gmail.com','MyWebsite');
        $this->email->subject('How to send email via SMTP server in CodeIgniter');
        $this->email->message($htmlContent);

//Send email
        $this->email->send();
    }

   public function logout(){
      $this->session->unset_userdata('admin');
      redirect(base_url('admin'));
   }

}