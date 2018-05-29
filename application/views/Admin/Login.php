<?php
/**
 * Created by PhpStorm.
 * User: luv2codeit
 * Date: 3/31/2018
 * Time: 8:48 AM
 */
?>

<div class="row">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="text-center text-uppercase">  commercial bank of ethiopia vacancy portal  </h3>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-offset-2 col-lg-6">
            <div class="page-header">  <h4>Administrator Panel</h4> </div>
<!--            <form class="form-group" action="--><?php //base_url()?><!--/index.php/Admin/authenicate" method="post">-->
                <?php
                echo $this->session->flashdata('msg');
                $attrib=array(
                        'class'=>'form-group',
                         'method'=>'post'
                );
                echo form_open('Admin/authenicate',$attrib);
                ?>
                <div class="form-group ">
                    <label for="usrename">user name</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                </div>
                <button type="submit" class="btn btn-primary pull-right">Login </button>
            </form>

        </div>

    </div>
</div>
