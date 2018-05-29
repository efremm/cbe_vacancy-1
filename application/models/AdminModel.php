<?php
/**
 * Created by PhpStorm.
 * User: luv2codeit
 * Date: 4/2/2018
 * Time: 11:29 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AdminModel extends CI_Model
{
    /**
     * AdminModel constructor.
     */
    public function __construct()
        {
            $this->load->database();
        }

    /**
     *check user validity
     */
    function validate_user($username,$password){
        $this->db->where('username',$username);
        //$this->db->where('password',$password);


        $this->db->where('Account_status','Active');
        $result=$this->db->get('tbl_users');
        $dbpassword=$result->row(4)->password;

        if(password_verify($password,$dbpassword)){
            return $result->row(1)->Staff_ID;

        }else{
            return false;
        }
        //return $this->db->get('tbl_users')->result();

}

    /**
     * add new admin
     */
    function add_user(){

                     }

    /**
     * close account
     */
    function close_user()
                 {

                     }
}