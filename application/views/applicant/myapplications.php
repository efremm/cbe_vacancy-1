
<div class="container">
    <div class="row">
        <div class="text-primary">
          <strong> List of My appplications </strong>
            <hr>
        </div>
        <div class="table">
            <table class="table table-striped">
                <thead>
                <th>#</th>
                <th>vacancy_title</th>
                <th>vacancy id</th>
                <th>app id</th>
                <th>Date Posted</th>
                <th>Date of application</th>
                <th>Evaluation</th>
                <th>Actions</th>


                </thead>
                <tbody>
                <?php
                $iterator=1;
                foreach ($myapplications as $myapplication){
                    echo "<tr>
                    <td>".$iterator."</td>
                    <td>".$myapplication->job_title."</td>
                     <td>".$myapplication->vacancy_id."</td>
                      <td>".$myapplication->Applicant_id."</td>
                      <td>".$myapplication->Job_posted."</td>
                      <td>".$myapplication->Date_of_application."</td>
                        <td>".$myapplication->evaluation_result."</td>
                        <td><select id='actions' class='form-control input-sm'>
                         <option>select action</option>
                        <option>WithDraw</option>
                         <option>Delete</option>
                         </select></td>
                          </tr>";
                    $iterator++;
                }

                ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<script src="<?php echo base_url()?>resources/js/jquery-1.10.2.js"></script>
<script type="text/javascript">

     $('#actions').on('change',function () {
         alert('chane');
     })


</script>