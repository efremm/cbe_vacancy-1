<?php
/**
 * Created by PhpStorm.
 * User: Birhan
 * Date: 5/12/2018
 * Time: 10:15 PM
 */

class Region extends CI_Controller
{
function __construct()
{
    parent::__construct();
    $this->load->model('Region_model');
}
function getZones(){
    $region=$_REQUEST['region'];
   $zones=$this->Region_model->zonesbyRegion($region);
   //echo $zones;
    $html="<option value=''>choose zone</option>";
    echo $html;
   foreach ($zones as $zone){
       echo '<option value="'.$zone->zone_id.'">'.$zone->zone_name.'</option>';

   }
   function Get_Zone_Name(){
       $ID=$_REQUEST['id'];
     }

    /**
     * GET NAME OF REGION
     */
    function Get_Region_Name(){
      $ID=$_REQUEST['id'];
    }

}
}