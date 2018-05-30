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
        <div class="col-lg-9" ">
        <h3 class="page-header">Screen Applicants for vacancy </h3>
        <table class="table table-responsive table-striped">
            <thead>
            <th>Rank</th>
            <th> fUll name of Applicant</th>
            <th>work Experience</th>
            <th>Cumulative GPA</th>
            <th>Action</th>
            </thead>
            <tbody>
            <?php
            $rank=1;
            foreach ($applicants as $applicant)
            {
                $fullname=$applicant->FirstName." ".$applicant->MiddleName." ".$applicant->LastName;
                echo  "<tr>
                    <td>". $applicant->vacancy_id."</td>
                    <td class='text-capitalize'>". $fullname."</td>
              
                    <td>". $applicant->vacancy_id."</td>

                </tr>";

            }

            ?>
            </tbody>


        </table>
    </div>
</div>
</div>

<script src="<?php echo base_url()?>/resources/js/jquery-1.10.2.js"></script>
