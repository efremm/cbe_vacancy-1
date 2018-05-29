<?php
/**
 * Created by PhpStorm.
 * User: Birhan
 * Date: 4/26/2018
 * Time: 5:15 PM
 */
?>
<div class="row">

    <ul class="list-group" >
        <li  class="list-group-item " style="border: none"><h3>Quick Links</h3></li>
        <li class="list-group-item" style="border: none"> <a href="<?php echo base_url()?>vacancy/post" id="news">
                <span class="fa fa-send"></span> Post new vacancy </a> </li>
        <li class="list-group-item" style="border: none"><a href="<?php echo base_url()?>employee/hire" id="user">
                <span class="fa fa-user"></span>   Register staff member</a> </li>
        <li class="list-group-item" style="border: none"><a href="<?php echo base_url()?>employee/createUser" id="user">
                <span class="fa fa-user"></span>  Create staff User account</a> </li>
        <li class="list-group-item" style="border: none"><a href="<?php echo base_url()?>Admin/screening" id="addservice">
                <span class="fa fa-1x fa-filter"></span> screen applicants</a> </li>
        <li class="list-group-item" style="border: none"> <a href="<?php echo base_url()?>services/addresearch" id="addresearch">
                <span class="fa fa-1x fa-edit"></span> send Email to winner candidates</a> </li>
        <li class="list-group-item" style="border: none"> <a href="<?php echo base_url()?>services/addresearch" id="addresearch">
                <span class="fa fa-1x fa-edit"></span> send SMS to winner candidates</a> </li>
        <li class="list-group-item" style="border: none"> <a href="<?php echo base_url()?>Admin/reports" id="report">
                <span class="fa fa-1x fa-print"></span> Dynamic Reports</a> </li>
    </ul>
</div>
