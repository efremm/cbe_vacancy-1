<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model
{
    function __construct()
    {
        /** @var TYPE_NAME $this */
        $this->load->database();
    }

    /**
     * @param $data
     * @return mixed
     */
    function Insert($data){
    $this->db->insert('tbl_staff',$data);
    return  $this->db->insert_id();
}

    /**
     * @param $id
     */
    function resign($id){
    $this->db->where('Staff_id',$id);
      return  $this->db->get('tbl_staff')->result();
}

    /**
     * @param $id
     */
    function update_info($id){
    $this->db->where('Staff_id',$id);
        return  $this->db->get('tbl_staff')->result();
}

    /**
     * @param $id
     */
    function get_staff_tinfo($id){
    $this->db->where('Staff_id',$id);
        return  $this->db->get('tbl_staff')->result();

}
function get_employes(){
    return  $this->db->get('tbl_staff')->result();
}
public function create_acount($data){
    return $this->db->insert('tbl_users',$data);

}
//check if user exists
    function user_exists($id){
        $this->db->where('Staff_id',$id);
        return  $this->db->get('tbl_users')->result();

    }
}