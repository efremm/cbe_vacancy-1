<div class="row">
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Commercial Bank of Ethiopia vacancy portal</h2></div>

        </div>

        <div class="col-lg-3 " style="margin-top: -15px">
            <?php
            $this->load->view('Admin/sidebar');
            ?>

        </div>
        <div class="col-lg-9" id="content" style="margin-top: -18px">
            <div class="page-header"><h4 class="text-muted">Administrator dashborad</h4></div>
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="text-info"><span class="fa fa-user"></span> Staff members reports</h4>
                    <table id="staffinfo" class="table table-responsive table-striped">
               <thead>
                   <th>#</th>
                    <th>Full name</th>
                     <th>Gender</th>
                      <th>Age</th>
                       <th>Hire date</th>
               </thead> 
                    <tbody>
                        <?php 
$no=1;
                        foreach ($staffs as $Staff) {
                            $fullname=$Staff->FirstName." ".$Staff->MiddleName." ".$Staff->LastName;
                             echo "<tr>
                             <td>".$no."</td>
                             <td>".$fullname."</td>
                              <td>".$Staff->Gender."</td>
                              <td></td>
                              <td>".$Staff->hire_date."</td>
 
                             </tr>";
                             $no++;
                         } ?>
                    </tbody>
                </table>
                </div>
                <div class="col-lg-4 ">
                    
                    <span class=" text-info fa  fa-4x fa-graduation-cap"> <?php
                  echo json_encode($activemembers);
                  ?> </span> 
                 <h3 class="text-info">
                  </span>  <span class="text-success">
                  Registed job seekers </span> </h3>
              
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                <table class="table table-responsive">
               <thead>
                   <th>#</th>
                    <th>Title</th>
                     <th>Date posted</th>
                     <th>Due Date </th>
                       <th># of applicants</th>
                      <th>Actions</th>
               </thead> 
               <tbody>
               <?php
               $counter=1;
               foreach ($vacancies as $vacancy)
               {
                   echo "<tr>
                   <td>".$counter."</td>
                        <td>".$vacancy->job_title."</td>
                         <td>".$vacancy->Job_posted."</td>
                       <td>".$vacancy->Due_date."</td>
                      <td>".$vacancy->job_title."</td>
                        <td><select id='action' class='form-control'>
                        <option>choose action</option>
                          <option>set inactive</option>
                          <option>Edit vacancy</option>
                        </select>
                        </td>

                         </tr>";
                  $counter++;       
               }
               ?>
               </tbody>
                    
                </table>
                </div>
                
            </div>
        </div>
    </div>
</div>

