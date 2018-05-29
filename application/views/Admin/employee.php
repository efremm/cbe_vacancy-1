
<div class="row">
    <div class="panel panel-primary">
        <div class="panel-heading text-center">
            <h2>commmercial bank of Ethiopia vacancy portal</h2> </div>

    </div>
    <div class="col-lg-12" style="margin-top: -20px">
        <?php
        echo $this->session->flashdata("msg");
        ?>
        <div class="col-lg-3  ">
            <?php
            $this->load->view('Admin/sidebar');
            ?>

        </div>
        <div class="col-lg-9" id="content">
            <div class="col-lg-8">

            </div>
            <h4 class="page-header text-info">  Employee  </h4>
            <?php echo $this->session->flashdata('saved');?>

    <button class="addnew btn btn-sm btn-primary pull-right" id="addnew" style="display: block">  Add Employee</button>


                <div class="form_content " style="display: none">

                    <?php
                    $attrib=array(
                            'class'=>'form-group',
                             'method'=>'post',
                        'id'=>'register'
                    );
                    echo form_open('employee/do_register',$attrib);
                    ?>
                    <div class="form-group col-lg-6">
                        <label for="fname">Fisrt name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="first name">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="fname">Middle name</label>
                        <input type="text" class="form-control" name="middlename" id="middlename" placeholder="middle name">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="fname">Last name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="last name">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="fname">Date of  Birth</label>
                        <input data-type="data"  class="datepicker form-control" name="birthdate" id="birthdate" >
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="fname">Gender</label>
                        <select  class="form-control" name="gender" id="gender" >
                            <option value="">choose gender</option>
                            <option value="male">Male</option>
                            <option value="femlae">Female</option>
                        </select>

                    </div>
                    <div class="form-group col-lg-6">
                        <label for="position">Position</label>
                        <select  class="form-control" name="role" id="fname">
                            <option value="">choose one</option>
                            <option value="recruit">Recruiter</option>
                            <option value="hr">human resource officer</option>

                        </select>
                    </div>
                    <div class="form-group col-lg-6">

                        <button  type="submit" class="btn btn-primary">Save info</button>
                    </div>
                    </form>
                </div>


                <table class="table table-striped">
                    <thead>

                    <th>Staff ID</th>
                    <th>full name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Hire date</th>
                    <th>position</th>
                    <th></th>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($staffs as $staff) {
                        $birthdate = $staff->birth_date;
                        $bdadate = new DateTime($birthdate);
                        $now = new DateTime();
                        $diff = date_diff($now, $bdadate);//OP: +272 days

                        $Longage = $diff->format('%y years %m months %d days ');
                        $age = $diff->format('%y');


                        echo "<tr>
      <td>" . $staff->Staff_ID . "</td>
      <td>" . $staff->FirstName . " " . $staff->MiddleName . " " . $staff->LastName . "</td>
          <td>" . $staff->Gender . "</td>
     <td>" . $age . "</td>
   <td>" . $staff->hire_date. "</td>
      <td>" . $staff->position . "</td>
      
     
         
</tr>";
                    }
                    ?>

                    </tbody>

                </table>

        </div>
    </div>

</div>
<link rel="stylesheet" href="<?php echo base_url()?>/resources/jquery/jquery-ui/css/jquery-ui.css">
<script src="<?php echo base_url()?>/resources/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>/resources/js/jquery.validate.min.js"></script>

<script src="<?php echo base_url()?>/resources/jquery/jquery-ui/js/jquery-ui.min.js"></script>

<script type="text/javascript">
    $(".addnew").click(function () {

        $header = $(this);
        //getting the next element
        $content = $header.next();
        //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
        $content.slideToggle(500, function () {
            //execute this after slideToggle is done
            //change text of header based on visibility of content div
            $header.text(function () {
                //change text based on condition
                return $content.is(":visible") ? "Close form" : "Register new";
            });
        });

    });
    $('.datepicker').datepicker(
        {
            dateFormat: "yy-mm-dd",
            inline:true,
            changeYear:true,
            changeMonth:true
        });



</script>

<style type="text/css">
    .error{
        color: red;
        font-size: small;
        
    },

    .form_content{
display: none;
    }
    
</style>

