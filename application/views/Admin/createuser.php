
<div class="row" style="margin-top:2px">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">commmercial bank of Ethiopia vacancy portal</h2> </div>

    </div>
    <div class="container-fluid">
        <div class="col-lg-3">
            <?php
            $this->load->view('Admin/sidebar');
            ?>

        </div>
        <div class="col-lg-9" ">
        <div class="row">
            <h3 class="page-header"> <span class="fa fa-user-md" ></span>      Add User account</h3>
            <div class="form-group">
                <form action="" class="form-group">
                    <div class="form-group col-lg-6">
                        <label for="username">choose user account holder</label>
                        <select class="form-control" id="holder" name="accountholder">
                            <option>choose employee</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="username">Enter username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="username">Enter password</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="username">confirm password</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group col-lg-6">

                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

        </div>
    </div>
</div>

<script src="<?php echo base_url()?>/resources/js/jquery-1.10.2.js"></script>
