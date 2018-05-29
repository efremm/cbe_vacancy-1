<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Applicant_model extends CI_Model
{
    /**
     * News constructor.
     */
    function __construct()
    {
        $this->load->database();
    }

  public function get_all_applicants()
       {
       //return $this->db->count_all_results('');
       $this->db->from('tbl_applicant');
        $count=$this->db->count_all_results();
        return $count;
       }

    function display_applications($applicant_id){

        $this->db->where('Applicant_id',$applicant_id);
        $this->db->select('*');
        $this->db->from('tbl_applications');
        $this->db->join('tbl_vacancy', 'tbl_applications.vacancy_id = tbl_vacancy.vacancy_id');
        $this->db->group_by('tbl_vacancy.vacancy_id');
        $query = $this->db->get();
        return $query->result();
    }
    function saveapplication($data){
        return $this->db->insert('tbl_applications',$data);
    }
    public function check_if_applied($applicant_id,$vacancy_id){
        $this->db->where('Applicant_id',$applicant_id);
        $this->db->where('vacancy_id',$vacancy_id);
        $query=$this->db->get('tbl_applications');
        return $query->result();
    }
    function register_profile($data){
         $this->db->insert('tbl_applicant',$data);
       return  $this->db->insert_id();

    }
    function get_profile($id){
        $this->db->where('Applicant_id',$id);
        $query=$this->db->get('tbl_applicant');
        return $query->result();
    }
    function get_address($id){
        $this->db->where('Applicant_id',$id);
        $query=$this->db->get('tbl_applicant_address');
        return $query->result();
    }
    function save_address($data){
         $this->db->insert('tbl_applicant_address',$data);
        return  $this->db->insert_id();
    }
    function save_EducationaInfo($data){
        $this->db->insert('tbl_applicant_educational_background',$data);
        return  $this->db->insert_id();

    }
    function get_educational_info($id){
        $this->db->where('Applicant_id',$id);
        $query=$this->db->get('tbl_applicant_educational_background');
        return $query->result();
    }
    function save_experience($data){
        $this->db->insert('tbl_work_experience',$data);
        return  $this->db->insert_id();
    }
    function get_work_experience($id){
        $this->db->where('Applicant_id',$id);
        $query=$this->db->get('tbl_work_experience');
        return $query->result();
    }
    function pic_upload($id, $pic){
        $this->db->set('picture', $pic);
        $this->db->where('Applicant_id',$id);
      return  $this->db->update('tbl_applicant');
    }
    function get_picture($id){
        $this->db->Select('picture');
        $this->db->where('Applicant_id',$id);
        $query=$this->db->get('tbl_applicant');
        return $query->result();
    }
    function create_account($data){
        return $this->db->insert('tbl_applicant_user_account',$data);

    }
    function get_useraccont($id){

        $this->db->where('Applicant_id',$id);
        $query=$this->db->get('tbl_applicant_user_account');
        return $query->result();
    }
    public function check_user($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $query=$this->db->get('tbl_applicant_user_account');
        return $query->result();
    }

}