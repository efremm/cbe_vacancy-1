<div class="container">
    <div class="row">

        <div class="col-lg-12">
            <form action="" class="form-group">
                <div class="form-group col-lg-4">
                    <label for="catagory">Job category</label>
                    <select class="form-control" name="category">
                        <option> choose job catagory</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label for="catagory">vacancy type</label>
                    <select class="form-control" name="category">
                        <option> Permanent</option>
                        <option> contract</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label for="catagory">Date posted</label>
                    <select class="form-control" name="category">
                        <option> Ascending</option>
                        <option> Descending</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-9">
            <div class="text-muted"><strong>Commercial Bank of Ethiopia would like to invite qualified and
                    interested candidates for the following Positions</strong> <hr> </div>
            <?php
            foreach ($vacancies as $vacancy){
                echo '<p class="">Job Title: '.$vacancy->job_title .'</p>';
                echo '<p>Minimum Required experience:'.$vacancy->required_experience.' year</p>';
                echo '<p>Minimum salary: '.$vacancy->minumum_salary.' Birr</p>';
                echo '<p>maximum salary: '.$vacancy->Maximum_salary.' Birr</p>';
                echo '<p>Employement: '.$vacancy->vacancy_type.' </p>';
                echo '<p>number_of_positions '.$vacancy->number_of_positions.' </p>';

                echo '<p>Maximum age: '.$vacancy->maximum_age.' year<small>
                      <span class="text-muted text-warning">(Applicants Aged more than 35 are  no more wanted)</span> </small></p>';
                echo  "<a href='".base_url()."vacancy/viewdetails/".$vacancy->vacancy_id."' class=' btn  btn-sm '><strong> <span class='fa fa-1x fa-eye'></span> view details</strong></a><br>";
//                echo '<p class="text-justify">  Brief Description:  '.$object->Brief_Description .' </p>';
//                echo '<p class="text-justify">  Detailed Description:  '.$object->Detailed_Description .' </p>';
//                echo '<p class="text-justify">  Additional Description:  '.$object->Additional_Details .' </p>';
                echo '<p class=" text-muted text-center help-block">  job posted:  '.$vacancy->Job_posted .' </p>';
            }
            ?>

        </div>
        <div class="col-lg-3">
           <ul class="list-item">
               <li class="list-group-item " style="border: none"><strong> <span class="text-success fa fa-filter"></span> <span class="text-info">Filter Jobs</span> </strong> </li>
               <li class="list-group-item " style="border: none">Filter by Date</li>
               <li class="list-group-item " style="border: none">By date Posted</li>
               <li class="list-group-item " style="border: none">By vacancy type</li>
               <li class="list-group-item " style="border: none">by salary</li>

           </ul>
        </div>
    </div>
</div>
<link rel="stylesheet" href="<?php echo base_url()?>/resources/jquery/jquery-ui/css/jquery-ui.min.css">

<script type="text/javascript" src="<?php echo base_url()?>resources/jquery/jquery-ui/js/jquery-ui.js"></script>
