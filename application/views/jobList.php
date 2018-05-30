
<div class="container">
    <div class="col-lg-12">
        <div class="col-lg-9" id="jobposts">
            <?php
            if(isset($error)){
                echo "<div class='alert alert-success'>".$error."</div>";
            }?>

            <div class="page-header">
                
                    Commercial  Bank  of  Ethiopia  would  like  to  invite  qualified  and  interested  candidates  for  the
                    following Positions 
            </div>

            <?php
            echo $this->session->flashdata('notlogged');
            echo $this->session->flashdata('sucess');

            foreach ($vacancies as $object)
            {


                echo '<p class="">Job Title: '.$object->job_title .'</p>';
                echo '<p>Minimum Required experience:'.$object->required_experience.' year</p>';
                echo '<p>Minimum salary: '.$object->minumum_salary.' Birr</p>';
                echo '<p>maximum salary: '.$object->Maximum_salary.' Birr</p>';
                echo '<p>Employement: '.$object->vacancy_type.' </p>';
                echo '<p>number_of_positions '.$object->number_of_positions.' </p>';
                echo '<p>Maximum age: '.$object->maximum_age.' year<small>
                      <span class="text-muted text-warning">(Applicants Aged more than 35 are  no more wanted)</span> </small></p>';
                echo  "<a href='".base_url()."vacancy/viewdetails/".$object->vacancy_id."' class=' btn  btn-sm '><strong> <span class='fa fa-1x fa-eye'></span> view details</strong></a><br>";

                echo '<p class=" text-muted text-center help-block">  job posted:  '.$object->Job_posted .' </p>';


                if($this->session->userdata('Id')!=null)
                {
                    ?>
                    <form class="form-group" method="POST" action="<?php    echo base_url('vacancy/apply'); ?>">
                        <input type="hidden" name="vacancy_id" value="     <?php echo  $object->vacancy_id?>">
                        <input type="hidden" name="app_id" value=" <?php    echo $this->session->userdata('Id'); ?>">

                        <?php echo "<button type='submit' class='btn btn-primary '>Apply for this job</button><hr>"; ?>
                    </form>
                    <?php
                }
                else
                {
                    ?>

                    <form class="form-group" method="POST" action="<?php echo base_url('vacancy/apply'); ?>">
                        <input type="hidden" name="vacancy_id" value="     <?php echo  $object->vacancy_id?>">
                        <input type="hidden" name="app_id" value=" <?php    echo $this->session->userdata('Id'); ?>">
                        <?php echo "<button type='submit' class='btn btn-primary '>Apply to this job</button><hr>"; ?>
                    </form>
                    <?php
                }
            }
            ?>
        </div>
        <div class="col-lg-3 ">

            <div class="page-header">Jobs by Catagory</div>
                <ul class="list-group">
                    <li class="list-group-item" style="border: none">  <a id="Tech"> <span class="fa fa-sitemap"></span>  network Administration </a></li>
                    <li class="list-group-item" style="border: none">  <a id="business" > <span class="fa fa-money">       </span> Accounting and Finance </a></li>
                    <li class="list-group-item" style="border: none">  <a id="Marketing"><span class="fa fa-shopping-cart">      </span> Marketing and sales</a></li>
                    <li class="list-group-item" style="border: none">  <a id="humanresource"> <span class="fa fa-user">   </span> Human resources management</a></li>
                    <li class="list-group-item" style="border: none">  <a id="management"> <span class="fa fa-chain">     </span> Management jobs</a></li>
                    <li class="list-group-item" style="border: none">  <a id="accounting"> <span class="fa fa-credit-card"></span> Accounting </a></li>
                    <li class="list-group-item" style="border: none">  <a id="business"> <span class="fa fa-usd"></span>  Business and Administration </a></li>
                    <li class="list-group-item" style="border: none">  <a id="sales"> <span class="fa fa-stack-exchange"></span>  Sales and Marketing </a></li>
                    <li class="list-group-item" style="border: none">  <a id="customer"> <span class="fa fa-user-md"></span>  Customer Service </a></li>
                    <li class="list-group-item" style="border: none">  <a id="communication"> <span class="fa fa-bullhorn"></span>  Communications and Public Relation Jobs</a></li>
                    <li class="list-group-item" style="border: none">  <a id="hr"> <span class="fa fa-check"></span>  Human Resource and Recruitment </a></li>
                    <li class="list-group-item" style="border: none">  <a id="programming"> <span class="fa fa-code"></span>  programmimg and system administration</a></li>
                    <li class="list-group-item" style="border: none">  <a id="db"> <span class="fa fa-database"></span>  Database management</a></li>
                </ul>

        </div>
    </div>
</div>

    <script src="<?php echo base_url()?>/resources/js/jquery-1.10.2.js"></script>
    <script type="text/javascript">

        var xmlhttp;
        $(document).ready(function()
        {
            xmlhttp=new XMLHttpRequest();

            $("#Tech").click(function(e)
            {
                e.preventDefault();

                xmlhttp.onreadystatechange=function()
                {
                    var html='<p class="text-muted"><strong>Jobs related to networking and network adminsitration</strong></p>';
                    var placement=document.getElementById("jobposts");
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                        data = JSON.parse(this.responseText);

                        for (x in data) {
                            html+= "<p> Job  title " + data[x].job_title + "</p>";
                            html+= "<p> Minimum required experience " + data[x].required_experience + "</p>";
                            html+= "<p> Minimum expected  salary " + data[x].minumum_salary + "</p>";
                            html+= "<p> Maximum   salary " + data[x].Maximum_salary + "</p>";

                            html+= "<p> vacancy   type " + data[x].vacancy_type + "</p>";
                           // html+= "<p> Maximum   permitted age " + data[x].maximum_age + "</p>";
                            html+= "<p> Maximum   salary " + data[x].Maximum_salary + "</p>";
                            html+=  "<p> Employement: " + data[x].vacancy_type+ "</p>";
                            html+=  "<p> Required CGPA: " + data[x].cumulative_GPA+ "</p>";
                            html+=    "<p>Maximum age: "+ data[x].cumulative_GPA+ " year<small>" +
                                "<span class='text-muted text-warning'>" +
                                "(Applicants Aged more than 35 are  no more wanted)</span> </small></p>";

                            html+="<a class='btn btn-sm btm-primary' href="<?php base_url()?>+"vacancy/viewdetails/" + data[x].vacancy_id+">" +
                                "<strong> <span class='fa fa-1x fa-eye'>" +
                                "</span> view details" +
                                "</strong>" +
                                "</a>" +
                                "<br>";



                                html+="<form method='post' action='<?php echo base_url('vacancy/apply')?>'>" +
                                    "<input type='hidden' name='jobid' value='"+data[x].vacancy_id+"'>" +
                                    "<input type='hidden' name='userid' value=''>" +
                                    "<button class='btn btn-primary' type='submit' > Apply for this vacancy </button>" +
                                    " </form>";

                            html+=   "<p class=' text-muted text-center help-block'>  job posted:" + data[x].Job_posted+" </p>";

                        }

                        placement.innerHTML=html;
                        return false;

                    }
                    else
                    {
                        placement.innerHTML="Requested file not found";
                    }
                };

                xmlhttp.open("GET","Vacancy/tech_jobs",true);
                xmlhttp.send();

            });
            $("#business").click(function()
            {

                xmlhttp.onreadystatechange=function()
                {
                    var placement=document.getElementById("jobposts");
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {

                        placement.innerHTML=xmlhttp.responseText;

                    }
                    else
                    {
                        placement.innerHTML="Requested file not found";
                    }
                };

                xmlhttp.open("GET","index.php/Vacancy/business_jobs",true);
                xmlhttp.send();
            });

            $("#Marketing").click(function()
            {

                xmlhttp.onreadystatechange=function()
                {
                    var placement=document.getElementById("jobposts");
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {

                        placement.innerHTML=xmlhttp.responseText;

                    }
                    else
                    {
                        placement.innerHTML="Requested file not found";
                    }
                };

                xmlhttp.open("GET","index.php/Vacancy/marketing_jobs",true);
                xmlhttp.send();
            });
//humanresource starts
            $("#humanresource").click(function()
            {

                xmlhttp.onreadystatechange=function()
                {
                    var placement=document.getElementById("jobposts");
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {

                        placement.innerHTML=xmlhttp.responseText;

                    }
                    else
                    {
                        placement.innerHTML="Requested file not found";
                    }
                };

                xmlhttp.open("GET","index.php/Vacancy/hr_jobs",true);
                xmlhttp.send();
            });
//humanresource ends
// accounting mobiles
            $("#accounting").click(function()
            {

                xmlhttp.onreadystatechange=function()
                {
                    var placement=document.getElementById("jobposts");
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {

                        placement.innerHTML=xmlhttp.responseText;

                    }
                    else
                    {
                        placement.innerHTML="Requested file not found";
                    }
                };

                xmlhttp.open("GET","index.php/Vacancy/accounting_jobs",true);
                xmlhttp.send();
            });
//accounting job list  ends
//Management job list starts
            $("#management").click(function()
            {

                xmlhttp.onreadystatechange=function()
                {
                    var placement=document.getElementById("jobposts");
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {

                        placement.innerHTML=xmlhttp.responseText;

                    }
                    else
                    {
                        placement.innerHTML="Requested file not found";
                    }
                };

                xmlhttp.open("GET","index.php/Vacancy/management_jobs",true);
                xmlhttp.send();
            });
        });

    </script>

