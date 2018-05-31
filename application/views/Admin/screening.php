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
        <div class="col-lg-9">
        <h3 class="page-header"> Applicants for all active vacancies</h3>
       <table class="table table-responsive table-striped">
           <thead>
           <th>#</th>
           <th>vacancy title</th>
           <th>Available Positions</th>
           <th>Totall applicants</th>
           <th>Date posted</th>
           <th>Due Date</th>
           <th>Action</th>
           </thead>
           <tbody>
           <?php
           $counter=1;
           foreach ($vacancies as $vacancy){
               echo "<tr>
             <td>".$counter."</td>
                
                <td>".$vacancy->job_title."</td>
                <td>".$vacancy->number_of_positions."</td>
               <td>".$vacancy->totalapplications."</td>
                <td>".$vacancy->Job_posted."</td>
                <td>".$vacancy->Due_date."</td>
                 <td>
                 <form action=".base_url()."Admin/process_screening method='post'>
                 <input type='hidden' name='vacancy_id' value='".$vacancy->vacancy_id."'> 
                <input type='hidden' name='seat' value='".$vacancy->number_of_positions."'> 

                  <button class='btn btn-info  btn-sm' id='process'>Process screening</button></td>
                  </form>";
                
               $counter++;
           }

           ?>
           </tbody>


       </table>
    </div>
</div>
</div>

<script src="<?php echo base_url()?>/resources/js/jquery-1.10.2.js"></script>
