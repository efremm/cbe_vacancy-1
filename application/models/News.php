<?php
/**
 * Created by PhpStorm.
 * User: luv2codeit
 * Date: 4/25/2018
 * Time: 9:28 PM
 */

class News extends CI_Model
{
    /**
     * News constructor.
     */
    function __construct()
    {
        $this->load->database();
    }
    function getNews(){
        $query=$this->db->get('news');
        return $query->result();
    }
}