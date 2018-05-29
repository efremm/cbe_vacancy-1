<?php
/**
 * Created by PhpStorm.
 * User: Birhan
 * Date: 4/26/2018
 * Time: 5:17 PM
 */
?>
<div class="row">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center "> Commercial Bank of Ethiopia vacancy portal  </h2> </div>

    </div>
</div>

<div class="container-fluid">

    <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3">
                    <?php
                    $this->load->view('Admin/sidebar');
                    ?>

                </div>
                <div class="col-lg-9" id="content">
                    <div class="row">
                        <div class="form-group">
                            <?php
                       echo $this->session->flashdata('msg');
                            ?>
                            <form action="<?php echo base_url()?>/employee/SaveUser" class="form-group" method="post">
                                <div class="form-group col-lg-6">
                                    <label for="staffid">choose staff member</label>
                                    <select  id="staffid" class="form-control" name="staffid">
                                        <option value="">choose staff id</option>
                                        <?php
                                        foreach ($staffs as $staff)
                                        {
                                            echo "<option value='".$staff->Staff_ID."'>".$staff->FirstName." ".$staff->MiddleName." ".$staff->LastName."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="username">User name</label>
                                    <input type="text" class="form-control" name="username" placeholder="Enter username">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="password">password</label>
                                    <input name="password" id="password" class="form-control"/>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="cpassword">confirm password</label>
                                    <input name="cpassword" id="cpassword" class="form-control"/>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="submit" class="btn btn-primary" value="Save data">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table">
                        <table class="table table-bordered">
                            <thead>
                            <th>No.</th>
                            <th>User name</th>
                            <th> Date created</th>
                            <th> owner staff id</th>
                            <th> Action</th>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
    </div>

</div>

