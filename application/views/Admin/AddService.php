<?php
/**
 * Created by PhpStorm.
 * User: Birhan
 * Date: 4/26/2018
 * Time: 5:18 PM
 */
?>
<div class="container-fluid" style="margin-top:2px">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2>Afromed institute of public health</h2> </div>

    </div>
    <div class="col-lg-12">
        <div class="col-lg-3">
            <?php
            $this->load->view('Admin/sidebar');
            ?>

        </div>
        <div class="col-lg-9" id="content">
            <form class="form-group">
                <div class="form-group">
                    <label for="service" class="col-sm-2 control-label">name of service</label>
                    <input type="text" class="form-control" id="service" placeholder="name of service">

                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Service description</label>

                        <textarea type="text" class="form-control" id="description" placeholder="enter description"></textarea>

                </div>

                <div class="form-group">

                        <button type="submit" class="btn btn-default">Save</button>

                </div>
                <div class="table">
                    <h4 class="page-header text-info"> Services currently provided </h4>
                    <table class="table table-striped">
                        <thead>
                        <th>#</th>
                        <th> service name </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        </thead>
                    </table>
                </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url()?>/resources/js/jquery-1.10.2.js"></script>
