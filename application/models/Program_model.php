<?php
/**
 * Created by PhpStorm.
 * User: luv2codeit
 * Date: 5/7/2018
 * Time: 1:11 PM
 */

class Program_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }
    function save(){

    }
    function Edit(){

    }
    function delete(){

    }
    function view(){
        return $this->db->get('tbl_program')->result();

    }

}