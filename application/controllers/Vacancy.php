<?php
/**
 * Created by PhpStorm.
 * User: luv2codeit
 * Date: 5/7/2018
 * Time: 12:45 PM
 */

class Vacancy extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Vacancy_model');
        $this->load->model('Applicant_model');

         $this->load->helper('form','date');
         $this->load->library('session');
    }

    function index(){
        $department['dept']= $this->Department_model->departments();
        $data = array(
            'page_title' => 'departments'
        );
        $id=$this->session->userdata('Id');
        $profile_data['info']=$this->Applicant_model->get_profile($id);
        $this->load->view('header',$data);
        $this->load->view('nav',$profile_data);
         $this->load->view('Vacancy',$department);
        $this->load->view('footer');
    }
    public function get_spec($id){
        $spec= $this->Vacancy_model->get_specializations($id);
        // echo json_encode($spec);
        foreach ($spec as $speciality)
        {
            echo "<option value='".$speciality->specialization_id."'>".$speciality->specialization_name."</option>";
        }

    }
    function post(){
        if (empty($this->session->userdata('admin'))){
            redirect(base_url('admin'));
        }

    else{
            $data = array(
                'page_title' => 'post-vacancy'
            );
            $vacancy_data['category']=$this->Vacancy_model->getCatagories();
            $vacancy_data['qualifications']=$this->Vacancy_model->getqualifications();
            $this->load->view('header',$data);
            $this->load->view('Admin/postvacancy',$vacancy_data);
    }
    }
    function do_post(){
        $tile=$_POST['title'];
        $min_salary=$_POST['minimumsalary'];
        $max_salary=$_POST['maxsalary'];
        $minexperience=$_POST['experience'];
        $maximum_age=$_POST['agelimit'];
        $vacancy_type=$_POST['vacancytype'];
        $min_gpa=$_POST['cgpa'];
        $vacancy_category=$_POST['catagory'];
        $specialization=$_POST['specialization'];
        $qualification=$_POST['qualification'];
        $brief_description=$_POST['briefdesc'];
        $detailed_description=$_POST['detaileddesc'];
        $additiiona_description=$_POST['additionalDetails'];

        $today=date('Y-m-d');
        $vacancy_data=array(
            'job_title'=>$tile,
            'minumum_salary'=>$min_salary,
            'Maximum_salary'=>$max_salary,
            'Job_catagory_id'=>$vacancy_category,
            'required_experience'=>$minexperience,
            'Job_posted'=>$today,
            'maximum_age'=>$maximum_age,
            'cumulative_GPA'=>$min_gpa,
            'Brief_Description'=>$brief_description,
            'Detailed_Description'=>$detailed_description,
            'Additional_Details'=>$additiiona_description,
            'vacancy_type'=>$vacancy_type,
            'qualification'=>$qualification,
           'specialization'=>$specialization

        );
$published=$this->Vacancy_model->publish($vacancy_data);
if($published){

    $this->session->set_flashdata("msg","<p class='alert alert-warning'>Job has been  punblished  </p>");
redirect(base_url('vacancy/post'));
}else{

}


    }
    function viewdetails($id){
        $data = array(
            'page_title' => 'view-vacancy details/'.$id
        );
        $userid=$this->session->userdata('Id');
        $profile_data['info']=$this->Applicant_model->get_profile($userid);

        $this->load->view('nav',$profile_data);
        $this->load->view('header',$data);
     $description['detail']= $this->Vacancy_model->get_job_details($id);
     $this->load->view('jobdetail',$description);

      }
function Edit(){

}
function DepartmentList()
{

}
function delete(){

}
function apply(){

    if($this->session->userdata('Id')==null)
    {
        $this->session->set_flashdata('notlogged','<div class="alert alert-warning">
                        You must login before you apply   <a href="'.base_url().'/applicant/login"> <strong>Login here</strong> </a> 
                        or <a href="'.base_url().'/applicant/register"> <strong> Sign up here if you are new visitor</strong> </a> </div>');
          redirect(base_url());
    }else {
        $vacancy_id = $_POST['vacancy_id'];
        $applicant_id = $_POST['app_id'];
        $exists = $this->Applicant_model->check_if_applied($applicant_id, $vacancy_id);
        if ($exists) {


            $this->session->set_flashdata('applicant_id',$applicant_id);
            $this->session->set_flashdata('vacancyid',$vacancy_id);
            $this->session->set_flashdata('sucess',
                '<div class="alert alert-warning"> You have already apllied for this vacancy <a href="'.base_url().'applicant/myapplications">Review applicantions</a> </div>');
            redirect(base_url());
        } else {
            $application_data = array(
                'Applicant_id' => $applicant_id,
                'vacancy_id' => $vacancy_id
            );
            $applied = $this->Applicant_model->saveapplication($application_data);
            if ($applied) {
                $this->session->set_flashdata('sucess', '<div class="alert alert-success">You have sucessfully applied for this vacancy</div>');
                redirect(base_url());
            } else {
                $this->session->set_flashdata('sucess', '<div class="alert alert-danger">Application not saved</div>');
                redirect(base_url());
            }


        }
    }
}
    function jobListing(){
        $data = array(
            'page_title' => 'combanketh-Joblisting'
        );
        $id=$this->session->userdata('Id');
        $profile_data['info']=$this->Applicant_model->get_profile($id);
        $this->load->view('header',$data);
        $this->load->view('nav',$profile_data);
        // get job list friom db
        $jobs['vacancies']=$this->Vacancy_model->display_jobs();


        $this->load->view('JobListing',$jobs);
        $this->load->view('footer');
    }

    public function get_applications(){

}

 function tech_jobs()
    {


        $data=$this->Vacancy_model->tech_jobs();
       echo json_encode($data);


    }

}