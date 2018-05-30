<?php
/**
 * Created by PhpStorm.
 * User: luv2codeit
 * Date: 5/7/2018
 * Time: 1:08 PM
 */

class Vacancy_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
        $this->load->helper("date");
        $this->load->library('session');
    }
    function get_specializations($qualification_id){
        $this->db->where('qualification_id',$qualification_id);
        $query=$this->db->get('tbl_specialization');
        return $query->result();
    }
function get_job_details($vacancy_id){
   $this->db->where('vacancy_id',$vacancy_id);
    $query=$this->db->get('tbl_vacancy');
    return $query->result();
}
public function getJobDetails($id){
    $this->db->where('vacancy_id',$id);
    $query=$this->db->get('tbl_vacancy');
    return $query->result();
}
public function get_applications(){
    $this->db->select('
             tbl_applications.Applicant_id,
                tbl_vacancy.job_title,
                tbl_vacancy.vacancy_id,
                   tbl_vacancy.Job_posted,
                      tbl_vacancy.Due_date,
              count(tbl_applications.Applicant_id) as totalapplications,
              
          ');
    $this->db->from('tbl_applications');
    $this->db->join('tbl_vacancy', 'tbl_applications.vacancy_id = tbl_vacancy.vacancy_id');
    $this->db->where('tbl_vacancy.vacancy_id=tbl_applications.vacancy_id');
    $this->db->group_by('tbl_vacancy.vacancy_id');
    $query = $this->db->get();
    return $query->result();
   }
   public function get_applicants($vacancy_id){
            $this->db->select('*');
            $this->db->where('tbl_applications.vacancy_id',$vacancy_id);
            $this->db->from('tbl_applications');
            $this->db->join('tbl_applicant', 'tbl_applicant.Applicant_id = tbl_applications.Applicant_id');

            $this->db->group_by('tbl_applications.vacancy_id');
            $query=$this->db->get();
       return $query->result();
   }

    function display_jobs()
    {
        $this->db->order_by('Job_posted', 'DESC');
        $query=$this->db->get('tbl_vacancy');
        return $query->result();
    }
   function tech_jobs()
    {

//$key=$_POST['key'];

        $this->db->where("Job_catagory_id",1);
        $this->db->where("current_state",'active');
        $this->db->order_by('Job_posted', 'DESC');
        $query=$this->db->get('tbl_vacancy');
        return $query->result();
    }
    function management_jobs()
    {

//$key=$_POST['key'];

        $this->db->where("catagory",2);
        $this->db->where("current_state",'active');
        $this->db->order_by('Job_posted', 'DESC');
        $query=$this->db->get('vacancy');
        return $query->result();
    }
    function accounting_jobs()
    {

//$key=$_POST['key'];

        $this->db->where("catagory",5);
        $this->db->where("current_state",'active');
        $this->db->order_by('Job_posted', 'DESC');
        $query=$this->db->get('vacancy');
        return $query->result();
    }
    function marketing_jobs()
    {

//$key=$_POST['key'];

        $this->db->where("catagory",3);
        $this->db->where("current_state",'active');
        $this->db->order_by('Job_posted', 'DESC');
        $query=$this->db->get('vacancy');
        return $query->result();
    }
    function hr_jobs()
    {

//$key=$_POST['key'];

        $this->db->where("catagory",5);
        $this->db->where("current_state",'active');
        $this->db->order_by('Job_posted', 'DESC');
        $query=$this->db->get('vacancy');
        return $query->result();
    }
    function business_jobs()
    {

//$key=$_POST['key'];

        $this->db->where("catagory",3);
        $this->db->where("current_state",'active');
        $this->db->order_by('Job_posted', 'DESC');
        $query=$this->db->get('vacancy');
        return $query->result();
    }

    function list_job_catagories(){
        $query=$this->db->get('job_catagory');
        return $query->result();
    }

    function it_jobs_cout(){

        $this->db->where('catagory', '1');
        $this->db->from('vacancy');
        $query=$this->db->count_all_results();
        return $query;
    }
    function management_jobs_cout(){

        $this->db->where('catagory', '2');
        $this->db->from('vacancy');
        $query=$this->db->count_all_results();
        return $query;
    }
    function accounting_jobs_cout(){

        $this->db->where('catagory', '5');
        $this->db->from('vacancy');
        $query=$this->db->count_all_results();
        return $query;
    }
    function business_jobs_cout(){

        $this->db->where('catagory', '6');
        $this->db->from('vacancy');
        $query=$this->db->count_all_results();
        return $query;
    }
    function hr_jobs_cout(){

        $this->db->where('catagory', '4');
        $this->db->from('vacancy');
        $query=$this->db->count_all_results();
        return $query;
    }
    function publish($data)
    {
        return $this->db->insert('tbl_vacancy', $data);
    }
    function getCatagories(){
      return  $this->db->get('job_catagory')->result();
    }
     function getqualifications(){
      return  $this->db->get('tbl_qualifications')->result();
    }

}