
<div class="container">
    <div class="col-lg-8">
        <div class="page-header">Applicant personal info</div>
        <?php


        if(empty($this->session->userdata('Id'))) {
            echo $this->session->flashdata('msg');

            $atrib = array('class' => 'form-group',
                'method' => 'post');
            echo form_open('applicant/do_register');
            ?>

            <div class="form-group col-lg-6">
                <label for="firstname">First name</label>

                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="first namme">
            </div>
            <div class="form-group col-lg-6">
                <label for="middlename">middle name</label>

                <input type="text" class="form-control" id="middlename" name="middlename" placeholder="middle name">

            </div>
            <div class="form-group col-lg-6">
                <label for="lastname">Last name</label>

                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="last name">

            </div>
            <div class="form-group col-lg-6">
                <label for="dob">Date of birth</label>

                <input type="text" class="form-control datepicker" id="dob" name="dob" placeholder="date of Birth">

            </div>
            <div class="form-group col-lg-6">
                <label for="gender">Gender</label>

                <select class="form-control" id="gender" name="gender">
                    <option>Male</option>
                    <option>Female</option>
                </select>

            </div>

            <div class="form-group col-lg-6">
                <label for="address">Mobile</label>
                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="mobile number">
            </div>
            <div class="form-group col-lg-6">
                <label for="address">Email</label>
                <input type="email" class="form-control" id="Emal" name="email" placeholder="Email Address">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save info</button>
            </div>


            <?php
            echo form_close();
        }else{
            echo $this->session->flashdata('msg');

            ?>
            <p class="text-muted">sumary of your profile</p>

            <?php
            $id=$this->session->userdata('Id');
            $age=0;
            foreach ($info as $profile)
            {

                $birthdate=$profile->DOB;
                $bdadate=new DateTime($birthdate);
                $now = new DateTime();
                $diff=date_diff($now,$bdadate);//OP: +272 days

                $Longage= $diff->format('%y years %m months %d days ');
                $age= $diff->format('%y');

                echo "<p class=' text-capitalize'>Full name: $profile->FirstName $profile->MiddleName $profile->LastName</p>";
                echo "<p>Gender: $profile->Gender</p>";
                echo "<p>Age:$Longage </p>";
                echo "<p>mobile: $profile->Mobile</p>";
            }
            if($age-35>=1){
                echo "<p class='text-muted  text-danger'> Age greater than 35. your age is no longer supported in our policy </p>";
            }
            else if(35-$age<=1){
                echo "<p class='text-muted  text-danger'> Age close to 35. After a year you will not be candidate for our jobs</p>";
            }
        }
        ?>

        <div class="page-header">Address  </div>
        <?php

        echo $this->session->userdata('addmsg');
        if(!empty($this->session->userdata('addressID'))||$this->session->userdata('Id')) {
            echo "<p class='text-muted'> Here is your address</p>";
            if(empty($address)){
                echo form_open('applicant/saveAdress');
?>
                <div class="form-group col-lg-6">
                    <label for="region">choose region</label>
                    <select class="form-control" name="region" id="region">
                        <option>choose region</option>
                        <?php
                        foreach ($regions as $region) {
                            echo "<option value='$region->Region_id'> $region->regionName</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="zone">zone</label>
                    <select class="form-control" name="zone" id="zone">
                        <option>choose zone</option>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="wereda">wereda</label>
                    <input class="form-control" name="wereda" placeholder="Enter your wereda"/>
                    <input type="hidden" value="<?php echo $this->session->userdata('Id') ?>" name="userid"/>

                </div>
                <div class="form-group col-lg-6">
                    <label for="kebele">kebele</label>
                    <input class="form-control" name="kebele" placeholder="Enter your kebele"/>
                </div>
                <input class="btn btn-primary" type="submit" value="save address">

            <?php
                echo form_close();
            }
            foreach ($regionName as $region){
                echo "<p> Region ".$region->regionName."</p>";

            }
            foreach ($ZoneName as $zone){
                echo "<p> Zone ".$zone->zone_name."</p>";

            }
            foreach ($address as $addres){
               // echo "<p> region ".$addres->Region_id."</p>";
               // echo  "<p> zone ". $addres->zone_id."</p>";
                echo  "<p> wereda ". $addres->wereda_name."</p>";
                echo  "<p> kebele ". $addres->kebele."</p>";

            }

        }else {
            echo form_open('applicant/saveAdress');


            ?>
            <div class="form-group col-lg-6">
                <label for="region">choose region</label>
                <select class="form-control" name="region" id="region">
                    <option>choose region</option>
                    <?php
                    foreach ($regions as $region) {
                        echo "<option value='$region->Region_id'> $region->regionName</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="zone">zone</label>
                <select class="form-control" name="zone" id="zone">
                    <option> choose region</option>
                </select>

            </div>
            <div class="form-group col-lg-6">
                <label for="wereda">wereda</label>
                <input class="form-control" name="wereda" placeholder="Enter your wereda"/>
                <input type="hidden" value="<?php echo $this->session->userdata('Id') ?>" name="userid"/>

            </div>
            <div class="form-group col-lg-6">
                <label for="kebele">kebele</label>
                <input class="form-control" name="kebele" placeholder="Enter your kebele"/>
            </div>
            <input class="btn btn-primary" type="submit" value="save address">
            <?php
            echo form_close();
            ?>
            <?php
        }
        ?>

        <div class="page-header"> Educational Background </div>
        <?php
        $atrib = array('class' => 'form-group',
            'method' => 'post');
        if(empty($this->session->userdata('education'))||$this->session->userdata('Id')){


            echo $this->session->flashdata('edumsg');
            if(empty($education)){

                echo  form_open('applicant/saveAcademicInfo',$atrib);
                ?>

                <div class="form-group col-lg-6">
                    <label for="institute">Institute</label>
                    <input type="text" name="institute" id="institute" class="form-control">
                </div>
                <div class="form-group col-lg-6">
                    <label for="institute">Area of study</label>
                    <select name="studyarea" id="studyarea" class="form-control">
                <option value="">choose area of study</option>
                    <?php
                    foreach ($categories as $catagory)
                    {
                        echo "<option value=".$catagory->Job_catagory_id.">".$catagory->catagory_name."</option>";
                    }
                        ?>
                </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="institute">Academic qualification</label>
                    <select class="form-control" name="qualification">
                    <option>diploma</option>
                        <option>BSC</option>
                         <option>MSC</option>
                         <option>PHD</option>
                         <option>Ass. prof</option>
                    </select> 
                </div>
                <div class="form-group col-lg-6">
                    <label for="institute"> from</label>
                    <input  data-type="date" type="text" name="from" id="from" class="datepicker form-control">
                </div>
                <div class="form-group col-lg-6">
                    <label for="institute">to</label>
                    <input data-type="date" type="text" name="to" id="to" class="datepicker form-control">
                </div>
                <div class="form-group col-lg-6">
                <label for="position">cumulative GPA</label>
                <input step="0.01" name="gpa" id="gpa" type="number" class=" form-control">
            </div>
                <div class="form-group col-lg-6">
                    &nbsp; <br>
                    <input type="submit" class="btn btn-primary ">
                </div>

                </form>
           <?php
            }


            foreach ($education as $eduInfo){
                echo "<p>institution ".  $eduInfo->Institution."</p>";
                echo "<p>Study start date ". $eduInfo->start_date."</p>";
                echo "<p>Study due date ". $eduInfo->end_date."</p>";
                  echo "<p>cumulative GPA ". $eduInfo->cumulatve_gpa."</p>";
                
            }

        }else {

            echo  form_open('applicant/saveAcademicInfo',$atrib);
            ?>

            <div class="form-group col-lg-6">
                <label for="institute">Institute</label>
                <input type="text" name="institute" id="institute" class="form-control">
            </div>
            <div class="form-group col-lg-6">
                <label for="institute">Area of study</label>
                 <select name="studyarea" id="studyarea" class="form-control">
                <option value="">choose area of study</option>
                    <?php
                    foreach ($categories as $catagory)
                    {
                        echo "<option value=".$catagory->Job_catagory_id.">".$catagory->catagory_name."</option>";
                    }
                        ?>
                </select>
                
            </div>
            <div class="form-group col-lg-6">
                <label for="institute">Academic qualification</label>
               
<select class="form-control" name="qualification">
<option>diploma</option>
    <option>BSC</option>
     <option>MSC</option>
     <option>PHD</option>
     <option>Ass. prof</option>
</select> 
            </div>
            <div class="form-group col-lg-6">
                <label for="institute"> from</label>
                <input  data-type="date" type="text" name="from" id="from" class="datepicker form-control">
            </div>
            <div class="form-group col-lg-6">
                <label for="institute">to</label>
                <input data-type="date" type="text" name="to" id="to" class="datepicker form-control">
            </div>
            <div class="form-group col-lg-6">
                <label for="position">cumulative GPA</label>
                <input step="0.01" name="gpa" id="gpa" type="number" class=" form-control">
            </div>
            <div class="form-group col-lg-6">
       &nbsp; <br>
                <input type="submit" class="btn btn-primary ">
            </div>

            </form>
            <?php
        }
        ?>
<div class="row">
    <div class="page-header "><strong> work Experience </strong> </div>
</div>
           

        <?php
        $atrib = array('class' => 'form-group',
            'method' => 'post');
        echo "<p class='text-muted'>Your work experience</p>";
        if(!empty($this->session->userdata('workexperience'))||$this->session->userdata('Id'))
        {
            if(empty($workexperience)){
                echo form_open('applicant/saveExperience',$atrib)
                ?>
                <div class="form-group col-lg-6">
                    <label for="institute">organization</label>
                    <input name="organization" type="text" class="form-control">
                </div>
                <div class="form-group col-lg-6">
                    <label for="position">position</label>
                    <input name="position"  id="position" type="text" class="form-control">
                </div>
                <div class="form-group col-lg-6">
                    <label for="position">from</label>
                    <input name="from" id="form" type="text" class="datepicker form-control">
                </div>
                <div class="form-group col-lg-6">
                    <label for="position">to</label>
                    <input name="to" id="to" type="text" class="datepicker form-control">
                </div>
                <div class="form-group col-lg-6">

                    <input type="submit" class="btn btn-primary ">
                </div>
                <?php
                echo form_close();

            }

            foreach ($workexperience as $experience){
                echo "<p> Hiring organization ".$experience->organization."</p>";
                echo "<p> starting date ".$experience->start_date."</p>";
                echo "<p> Resign date ".$experience->end_date."</p>";
            }
        }
            else{



            echo form_open('applicant/saveExperience',$atrib)
            ?>
            <div class="form-group col-lg-6">
                <label for="institute">organization</label>
                <input name="organization" type="text" class="form-control">
            </div>
            <div class="form-group col-lg-6">
                <label for="position">position</label>
                <select name="position"  id="position"  class="form-control">
                    <option value="">choose area of study</option>
                    <?php
                    foreach ($categories as $catagory)
                    {
                        echo "<option value=".$catagory->Job_catagory_id.">".$catagory->catagory_name."</option>";
                    }
                        ?>
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="position">from</label>
                <input name="from" id="form" type="text" class="datepicker form-control">
            </div>
            <div class="form-group col-lg-6">
                <label for="position">to</label>
                <input name="to" id="to" type="text" class="datepicker form-control">
            </div>
            
            <div class="form-group col-lg-6">

                <input type="submit" class="btn btn-primary ">
            </div>
            <?php
            echo form_close();
            ?>

            <?php

        }
        ?>
    </div>
    <div class="col-lg-4 pull-right">
        <div class="page-header"> upload profile picture</div>
        <?php
            echo  "<p class='text-warning'>".$this->session->userdata('picmsg')."</p>";


        if(!empty($this->session->userdata('picture'))||$this->session->userdata('Id')){
            foreach ($picture as $pic)
            {
                echo '<img alt="profile pic" class=" img img-thumbnail" src="'.base_url()."uploads/".$pic->picture.'">';

                echo form_open_multipart('Applicant/saveprofilepicture');
                ?>
                <div class="form-group">
                    <input type="file" name="file" size="20"/>
                </div>

                <input class="btn btn-primary" type="submit" value="change picture"/>

                </form>
           <?php }
        }else {

            echo form_open_multipart('Applicant/saveprofilepicture'); ?>
            <div class="form-group">
                <input type="file" name="file" size="20"/>
            </div>

            <input class="btn btn-primary" type="submit" value="upload"/>

            </form>
            <?php
        }
        ?>
        <div class="row">
            <div class="page-header">create Account</div>
            <?php
            echo $this->session->flashdata('success');
            if(!empty($this->session->userdata('account'))||$this->session->userdata('Id')){

                if(empty($account)){
                    ?>
            <?php
            echo form_open('applicant/create_account');
            echo "Your id is ".$this->session->userdata('Id');

            ?>
            <div class="form-group">
                <label>User name</label>
                <input type="text" name="username" class="form-control" placeholder="Enter user name">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="***************">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="cpassword" class="form-control" placeholder="***************">
            </div>
            <input type="submit" class="btn btn-primary" value="create account">
        </div>
                    <?php
                }
                   foreach ($account as $account_detail){
                       echo "<p>user name ".$account_detail->username;
                       echo "</p><p>Password : As you set</p>";
                   }
            }else{
                echo "<p class='text-muted'>fill forms to create  accont</p>";
                ?>
                <div class="form-group">
                   <?php
                   echo form_open('applicant/create_account');
                  echo "Your id is ".$this->session->userdata('Id');

                   ?>
                    <div class="form-group">
                        <label>User name</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter user name">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="***************">
                    </div>
                    <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control" placeholder="***************">
                </div>
                    <input type="submit" class="btn btn-primary" value="create account">
                </div>
            <?php
            }
            ?>
        <div class="page-header">Cv and Resumen</div>

        <?php
        echo  "<p class='text-warning'>".$this->session->userdata('cv')."</p>";


        if(empty($this->session->userdata('cv'))){
            foreach ($cv as $pic)
            {
               // echo '<img alt="profile pic" class=" img img-thumbnail" src="'.base_url()."uploads/".$pic->picture.'">';

                echo form_open_multipart('Applicant/uploadcv');
                ?>
                <div class="form-group">
                    <input type="file" name="file" size="20"/>
                </div>

                <input class="btn btn-primary" type="submit" value="upload new cv"/>

                </form>
            <?php }
        }else {

            echo form_open_multipart('Applicant/saveprofilepicture'); ?>
            <div class="form-group">
                <input type="file" name="file" size="20"/>
            </div>

            <input class="btn btn-primary" type="submit" value="upload"/>

            </form>
            <?php
        }
        ?>




        </div>

    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url()?>resources/jquery/jquery-ui/css/jquery-ui.min.css">
<script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/jquery/jquery-ui/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>resources/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">

    $('.datepicker').datepicker(
        {
            dateFormat: "yy-mm-dd",
            inline:true,
            changeYear:true,
            changeMonth:true
        });
    var universities = [
        "Addis ababa university",
        "Adama science and technology university",
        "Ambo university",
        "Diredawa university",
        "mekele university",
        "Adigrat university",
        "Aksum university",
        "Haromaya university",
        "Kotebe metroplitan university",
        "Hawasa university",
        "Bahirdar university",
        "Gonder university",
        "Debre tabor university",
        "debre markos university",
        "Debark university",
        "weldiya university",
        "semera university",
        "Jigjiga uinversity",
        "Adgrat university",
        "wachamo university",
        "Dilla university",
        "welayto sodo university",
        "welkite university "
    ];

    var qualification = [
        "Bsc",
        "MSc",
        "Diploma",
        "PhD",
        "professor",
        "Assistant professor"

    ];
    $('#institute').autocomplete({
        source:universities
    });

    $('#qualification').autocomplete({
        source:qualification
    });
    var xmlhttp=new XMLHttpRequest();
    $('#region').on('change',function () {
     var region=this.value;
   //alert(region);
    var zone=document.getElementById('zone');
   var xmlhttp=new XMLHttpRequest();
   xmlhttp.onreadystatechange=function () {
       if(xmlhttp.readyState==4&& xmlhttp.status==200)
       {
          zone.innerHTML=xmlhttp.responseText;
          // document.getElementById(tagID).innerHTML = request.responseText;
       }
   }
   xmlhttp.open('GET','<?php echo base_url()?>/region/getzones?region='+region ,true);
   xmlhttp.send();

});

</script>