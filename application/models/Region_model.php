<?php

class Region_model extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    function get_regions()
    {
        $query = $this->db->get('tbl_regions');
        return $query->result();

    }

    function zonesbyRegion($regionid)
    {
        $this->db->where('Region_id', $regionid);
        $query = $this->db->get('tbl_zone');
        return $query->result();
    }
    function Get_region_name($regionid){
        $this->db->select('regionName');
        $this->db->where('Region_id', $regionid);
        $query = $this->db->get('tbl_Regions');
        return $query->result();
    }

    function Get_zone_name($zoneid){
        $this->db->select('zone_name');
        $this->db->where('zone_id', $zoneid);
        $query = $this->db->get('tbl_zone');
        return $query->result();
    }
}