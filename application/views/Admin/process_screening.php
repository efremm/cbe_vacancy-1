<?php
/**
 * Created by PhpStorm.
 * User: Birhan
 * Date: 4/26/2018
 * Time: 5:18 PM
 */
?>

<div class="row" style="margin-top:2px">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">commercial bank of Ethiopia vacancy portal</h2> </div>

    </div>
    <div class="col-lg-12">
        <div class="col-lg-3">
            <?php
            $this->load->view('Admin/sidebar');
            ?>

        </div>
        <div class="col-lg-9" >
        <h4 class="page-header">Screening Applicants for vacancy:- <span class="text-success">

                <?php
                foreach ($vacancydetail as $detail)
                {
                    $seat=$detail->number_of_positions;
                    echo $detail->job_title;
                    echo "  (vacancy_id: ".$detail->vacancy_id. ")";
                }
                ?>

            </span> </h4>
            <p class="text-warning">
                <span class="fa fa-exclamation-triangle "></span> Applicants who has empty experience info/educational background info has been left out of candidency
            </p>
        <table class="table table-responsive table-condensed" id="tblapplicants">
            <thead>
            <th>Rank</th>
            <th> fUll name of Applicant</th>
              <th>Gender</th>
            <th>work Experience</th>
            <th>Cumulative GPA</th>
            <th>Action</th>
            </thead>
            <tbody>
            <?php
            $rank=1;
            foreach ($applicants as $applicant)
            {
                $startdate=$applicant->start_date;
                $enddate=$applicant->end_date;

                //
                $strdate=new DateTime($startdate);
                $enddate=new DateTime($enddate);

                $diff=date_diff($enddate,$strdate);//OP: +272 days

                $Longexp= $diff->format('%y years %m months %d days ');
                $exp= $diff->format('%y');


                $fullname=$applicant->FirstName." ".$applicant->MiddleName." ".$applicant->LastName;
                echo  "<tr>
                    <td>". $rank."</td>
                    <td class='text-capitalize'>". $fullname."</td>
                <td>". $applicant->Gender."</td>
                <td>".$Longexp."</td>
                 <td>".$applicant->cumulatve_gpa."</td>
                   <td>
                       <select class='form-control input-sm '>
                       <option value=''>select action </option>
                         <option>select as winner </option>
                       </select>
                     </td>

                </tr>";
                $rank++;
            }

            ?>
            </tbody>


        </table>
    </div>
</div>
</div>
<link rel="stylesheet" href="<?php echo base_url()?>/resources/DataTable/css/jquery.dataTables.css">
<script src="<?php echo base_url()?>/resources/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>/resources/DataTable/js/jquery.dataTables.js"></script>
<script type="text/javascript">
var table=document.getElementsByTagName('table');
$("#tblapplicants").dataTable();
</script>
