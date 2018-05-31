<?php
/**
 * Created by PhpStorm.
 * User: luv2codeit
 * Date: 5/7/2018
 * Time: 12:43 PM
 */

class Applicant extends CI_Controller
{

function __construct()
{
    parent::__construct();
    $this->load->model('Applicant_model');
    $this->load->model('Region_model');
    $this->load->model('Vacancy_model');


    $this->load->helper('form');
    $this->load->library('session');

}
function index(){

    $data = array(
        'page_title' => 'Applicant-Home'
    );

    $profile_data['regions'] = $this->Region_model->get_regions();
    if(!empty($this->session->userdata('Id')))
    {
        $id=$this->session->userdata('Id');

        $profile_data['info']=$this->Applicant_model->get_profile($id);

        $profile_data['education']=$this->Applicant_model->get_educational_info($id);
        $profile_data['workexperience']=$this->Applicant_model->get_work_experience($id);
        $profile_data['picture']=$this->Applicant_model->get_picture($id);
        $profile_data['account']=$this->Applicant_model->get_useraccont($id);
        $profile_data['cv']=$this->Applicant_model->get_cv($id);
        $profile_data['address']=$this->Applicant_model->get_address($id);

        $address_data = $this->Applicant_model->get_address($id);
        $region=null;
        $zone=null;
        foreach ($address_data as $address)
        {
            $region=$address->Region_id;
            $zone=$address->zone_id;
        }
        $profile_data['regionName']=$this->Region_model->Get_region_name($region);
        $profile_data['ZoneName']=$this->Region_model->Get_zone_name($zone);

        //echo json_encode($profile_data);
        $this->load->view('header',$data);
        $this->load->view('nav',$profile_data);
        $this->load->view('Applicant/register',$profile_data);
        $this->load->view('footer');
    }
    else
    {
        $this->load->view('header',$data);
        $this->load->view('nav');
        $this->load->view('Applicant/register');
        $this->load->view('footer');
    }
}

    /**
     *Applicant address
     */
    function Address(){

}

    /**
     *Applicant login
     */
    function login(){
        $data = array(
            'page_title' => 'Applicant-login'
        );
        $id=$this->session->userdata('Id');
        $profile_data['info']=$this->Applicant_model->get_profile($id);
        $this->load->view('header',$data);
        $this->load->view('nav',$profile_data);
        $this->load->view('Applicant/login');
        $this->load->view('footer');

     }
     public function uploadcv(){
         $config['upload_path']          = './uploads/cv';
         $config['allowed_types']        = 'doc|pdf|jpeg|png';
         $config['max_size']             = 100;
         $config['max_width']            = 1024;
         $config['max_height']           = 768;

         $this->load->library('upload', $config);
         $userid=$this->session->userdata('Id');
         if(!empty($userid)){
             if ( ! $this->upload->do_upload('file'))
             {
                 $error = array('error' => $this->upload->display_errors());
                 $error=json_encode($error);

                 $this->session->set_flashdata("cv",$error);
                 redirect(base_url('applicant/register'));
             }
             else
             {
                 $userid=$this->session->userdata('Id');
                 $image_date  =$this->upload->data();
                 $data = array('upload_data' =>$image_date);
                 $file_array = $this->upload->data('file_name');
                 $profile['profile_picture'] = $file_array['file_name'];

                 $picsaved=$this->Applicant_model->pic_upload($userid,$file_array);

                 $data=json_encode($data);
                 $this->session->set_userdata('picture',$file_array);

                 $this->session->set_flashdata("picmsg","profile picture successfully uploaded");
                 redirect(base_url('applicant/register'));
             }
         }else{
             $this->session->set_flashdata("picmsg","<p class='text-danger'>your id is undefined!. please fill your personal info first</p>");
             redirect(base_url('applicant/register'));
         }



     }

     function authenticate(){
       $username= $_POST['username'];
       $password= $_POST['password'];
       $id=null;
       $valid=$this->Applicant_model->check_user($username,$password);
       if($valid){
           foreach ($valid as $userdata){
               $id=$userdata->Applicant_id;
           }

               $this->session->set_userdata("Id",$id);
               $this->session->set_userdata("applicantlogged",$username);

         redirect('applicant');
       }else{
           $this->session->set_flashdata("error","<p class='text-danger'>invalid login credentials</p>");
       redirect(base_url('applicant/login'));
       }

     }

    /**
     *view applicant profile
     */
    function viewprofile(){

       }
       function logout(){
        $this->session->unset_userdata('applicantlogged');
           $this->session->unset_userdata('Id');
           $this->session->unset_userdata('picture');
           $this->session->unset_userdata('education');
           $this->session->unset_userdata("account");
        redirect(base_url());
       }

    /**
     * register as member
     */
    public function register(){
        $data = array(
            'page_title' => 'Applicant-profile'
        );
        $profile_data['regions']=$this->Region_model->get_regions();
        $id = $this->session->userdata('Id');
        $profile_data['info'] = $this->Applicant_model->get_profile($id);
        $profile_data['regions'] = $this->Region_model->get_regions();

        $profile_data['categories'] = $this->Vacancy_model->list_job_catagories();

        $profile_data['education'] = $this->Applicant_model->get_educational_info($id);
        $profile_data['workexperience'] = $this->Applicant_model->get_work_experience($id);
        $profile_data['picture'] = $this->Applicant_model->get_picture($id);
        $profile_data['account'] = $this->Applicant_model->get_useraccont($id);
        $profile_data['cv'] = $this->Applicant_model->get_cv($id);

        $profile_data['address'] = $this->Applicant_model->get_address($id);
        if(!empty($this->session->userdata('Id'))) {

            if ($id != null)
            {

            $profile_data['info'] = $this->Applicant_model->get_profile($id);
            $profile_data['regions'] = $this->Region_model->get_regions();
            $profile_data['education'] = $this->Applicant_model->get_educational_info($id);
            $profile_data['workexperience'] = $this->Applicant_model->get_work_experience($id);
            $profile_data['picture'] = $this->Applicant_model->get_picture($id);
            $profile_data['account'] = $this->Applicant_model->get_useraccont($id);

            $address_data = $this->Applicant_model->get_address($id);
            $region=null;
            $zone=null;
             foreach ($address_data as $address)
             {
                 $region=$address->Region_id;
                 $zone=$address->zone_id;
             }
                $profile_data['regionName']=$this->Region_model->Get_region_name($region);
                $profile_data['ZoneName']=$this->Region_model->Get_zone_name($zone);
            //echo json_encode($profile_data);
            $this->load->view('header', $data);
            $this->load->view('nav', $profile_data);
            $this->load->view('Applicant/register', $profile_data);
            $this->load->view('footer');
        }
        else
            {
                $this->load->view('header', $data);
                $this->load->view('nav');
                $this->load->view('Applicant/register',$profile_data);
                $this->load->view('footer');
            }
        }
        else
            {
            $this->load->view('header',$data);
            $this->load->view('nav');
            $this->load->view('Applicant/register',$profile_data);
            $this->load->view('footer');
        }



    }
function do_register(){
       if(!empty($this->session->userdata('Id')))
       {
           $id=$this->session->userdata('Id');
           $this->session->set_flashdata("msg","<p class='alert alert-warning'>you have already registered and your Id number is".$id." </p>");

          // redirect(base_url('applicant/register'),$profile_data);


       }
       else
       {
           //form data
           $fname=$_POST['firstname'];
           $lname=$_POST['lastname'];
           $mname=$_POST['middlename'];
           $mobile=$_POST['mobile'];
           $gender=$_POST['gender'];
           $dob=$_POST['dob'];
           $email=$_POST['email'];
// check email if registered
           $check_mail=$this->Applicant_model->check_mail_exists($email);
            if($check_mail){
                $this->session->set_flashdata("msg","<p class='alert alert-dismissable alert-danger'>Email already exists '</p>'");

                redirect(base_url('applicant/register'));
            }
            else
            {
                $check_mobile=$this->Applicant_model->check_mobile_exists($mobile);
                if($check_mobile){
                    $this->session->set_flashdata("msg","<p class='alert alert-dismissable alert-danger'>Mobile number already exists '</p>'");

                    redirect(base_url('applicant/register'));
                }else
                    {
                        // arrange for database insertion
                        $profile=array(
                            "FirstName"=>$fname,
                            "MiddleName"=>$mname,
                            "LastName"=>$lname,
                            "Mobile"=>$mobile,
                            "Gender"=>$gender,
                            "DOB"=>$dob,
                            "email"=>$email

                        );
                        // pass data to database as parametre
                        $saved=$this->Applicant_model->register_profile($profile);

                        if($saved==true){
                            $id= json_encode($saved);
                            $this->session->set_flashdata("msg","<p class='alert alert-dismissable alert-success'>profile successfully saved and your Id is ".$id.'</p>');
                            $this->session->set_userdata("Id",$id);
                            redirect(base_url('applicant/register'));
                        }else
                        {
                            $this->session->set_flashdata("msg","profile not saved");
                            redirect(base_url('applicant/register'));
                        }

                }
            }

       }


}

    /**
     *|edit profile of applicant
     */
    public  function EditProfile(){

  }
  public function saveprofilepicture(){
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|jpeg|png';
      $config['max_size']             = 100;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;

      $this->load->library('upload', $config);
      $userid=$this->session->userdata('Id');
if(!empty($userid)){
    if ( ! $this->upload->do_upload('file'))
    {
        $error = array('error' => $this->upload->display_errors());
        $error=json_encode($error);

        $this->session->set_flashdata("picmsg",$error);
        redirect(base_url('applicant/register'));
    }
    else
    {
        $userid=$this->session->userdata('Id');
        $image_date  =$this->upload->data();
        $data = array('upload_data' =>$image_date);
        $file_array = $this->upload->data('file_name');
        $profile['profile_picture'] = $file_array['file_name'];

        $picsaved=$this->Applicant_model->pic_upload($userid,$file_array);

        $data=json_encode($data);
        $this->session->set_userdata('picture',$file_array);

        $this->session->set_flashdata("picmsg","profile picture successfully uploaded");
        redirect(base_url('applicant/register'));
    }
}else{
    $this->session->set_flashdata("picmsg","<p class='text-danger'>your id is undefined!. please fill your personal info first</p>");
    redirect(base_url('applicant/register'));
}



  }
  function saveAdress(){
        // accepting form data
      $userid=$this->session->userdata('Id');
      $zoneid=$_POST['zone'];
      $region=$_POST['region'];
      $wereda=$_POST['wereda'];
      $kebele=$_POST['kebele'];

      if($userid==null){
          $this->session->set_flashdata("addmsg","<p class='alert alert-dismissable alert-danger'>your Id is unkniown please fill your personal info first  </p>");
          redirect(base_url('applicant/register'));
      }else
          {
              $addresInfo=array("Region_id"=>$region,
                  "zone_id"=>$zoneid,
                  "wereda_name"=>$wereda,
                  "Applicant_id"=>$userid,
                  "kebele"=>$kebele);
          $addsaved=$this->Applicant_model->save_address($addresInfo);
          if($addsaved==true){
              $addressID=json_encode($addsaved);
              $this->session->set_userdata('addressID',$addressID);
              $this->session->set_flashdata("addmsg","<p class='alert alert-dismissable alert-success'>Address successfully saved  </p>");
              redirect(base_url('applicant/register'));
          }else{
              $this->session->set_flashdata("addmsg","<p class='alert alert-dismissable alert-danger'>Address not saved </p>");
              redirect(base_url('applicant/register'));
          }

      }

  }

    /**
     * save academic info of applicant
     */
    public function saveAcademicInfo(){
        // accepting form data

        $institue=$_POST['institute'];
        $studyarea=$_POST['studyarea'];
        $from=$_POST['from'];
        $to=$_POST['to'];
        $gpa=$_POST['gpa'];
        $applicantId=$this->session->userdata('Id');
        //arrange for insertion
        $educational_info=array(
            'Applicant_id'=>$applicantId,
            'Institution'=>$institue,
            'department_id'=>$studyarea,
            'start_date'=>$from,
            'end_date'=>$to,
            'cumulatve_gpa'=>$gpa
        );
        $userid=$this->session->userdata('Id');
        if(empty($userid)){
            $this->session->set_flashdata("msg","<p class='alert alert-danger'>your Id number is unknownn. please register your personal info first</p>");
            redirect(base_url('applicant/register'));
        }else{
            $Educationalaved=$this->Applicant_model->save_EducationaInfo($educational_info);
            if($Educationalaved){
                $edu= json_encode($Educationalaved);
                $this->session->set_flashdata("edumsg","<p class='alert alert-dismissable alert-success'>Educational background successfully saved'</p>'");
                $this->session->set_userdata("education",$edu);
                redirect(base_url('applicant/register'));
            }else{
                $this->session->set_flashdata("msg","profile not saved");
                redirect(base_url('applicant/register'));
            }
        }

}

    /**
     * do saving of  work experience of applicant
     */
    public function saveExperience(){

        $organization=$_POST['organization'];
        $position=$_POST['position'];
        $from=$_POST['from'];
        $to=$_POST['to'];
        $experience_info=array(
            "Applicant_id"=>$this->session->userdata('Id'),
            "organization"=>$organization,
            "Postion_Id"=>$position,
            "start_date"=>$from,
            "end_date"=>$to
        );
        $userid=$this->session->userdata('Id');
        if(empty($userid))
        {
            $this->session->set_flashdata("msg","<p class='alert alert-dismissable alert-danger'>Your Id is undefined!. please fill your personal info first.experienec not saved'</p>'");
            redirect(base_url('applicant/register'));
        }else{
            $saved=$this->Applicant_model->save_experience($experience_info);
            if($saved){
                $id= json_encode($saved);
                $this->session->set_flashdata("msg","<p class='alert alert-dismissable alert-success'>work experince successfully saved'</p>'");
                $this->session->set_userdata("workexperience",$id);
                redirect(base_url('applicant/register'));
            }else{
                $this->session->set_flashdata("msg","error".$this->db->_error_message());
                redirect(base_url('applicant/register'));
            }
        }

}

    /**
     * add work experinece form
     */
    /**
     * view vacancy applications
     */
    public  function myapplications(){
        $data = array(
            'page_title' => 'my applications '
        );
        $id=$this->session->userdata('Id');
        $profile_data['myapplications']= $this->Applicant_model->display_applications($id);
        $profile_data['info']=$this->Applicant_model->get_profile($id);
     // echo json_encode($applications);
        $this->load->view('header',$data);
        $this->load->view('nav',$profile_data);
        $this->load->view('Applicant/myapplications',$profile_data);
        $this->load->view('footer');



     }

    /**
     * add profile photo for applicant
     */
    public function create_account(){
        $userid=$this->session->userdata('Id');
        if(empty($userid))
        {
            $this->session->set_flashdata("success","<p class='alert alert-dismissable alert-danger'>your Id is undefined!. please fill your personal info first.user account not saved'</p>'");
           redirect(base_url('applicant/register'));
        }
        else
            {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $today = date('yy-mm-dd');
                $options=['cost'=>12];
                $encrypted_pass=password_hash($password,PASSWORD_BCRYPT,$options);


            $account_data = array(
                'Applicant_id' => $userid,
                "username" => $username,
                "password" => $encrypted_pass,
                "date_inserted" => $today
            );
            $created = $this->Applicant_model->create_account($account_data);
            if ($created) {
                $this->session->set_flashdata("success", "<p class='alert alert-dismissable alert-success'>user account successfully saved'</p>'");
                $this->session->set_userdata("account", $username);
                redirect(base_url('applicant/register'));
            } else {
                $this->session->set_flashdata("success", "<p class='alert alert-dismissable alert-danger'>user account not saved'</p>'");
                redirect(base_url('applicant/register'));
            }
        }
        }

    /**
     * save picture
     */


}