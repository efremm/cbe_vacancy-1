<div class="row">
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Commercial Bank of Ethiopia vacancy portal</h2></div>

        </div>

        <div class="col-lg-3">
            <?php
            $this->load->view('Admin/sidebar');
            ?>

        </div>
        <div class="col-lg-9 " id="content" >
            <div class="row">
                <div class="col-lg-4 " >

                    <h4 class="text-success">
                        <span class="fa fa-2x fa-briefcase"></span>   Vacancies
                    </h4>

                     </div>
                <div class="col-lg-4 ">

                    <h4 class="text-success">
                        <span class=" fa fa-2x glyphicon glyphicon-user"></span>  Staff members</h4>
                   </div>
                <div class="col-lg-4 ">
                    <h4 class="text-success">
                        <span class="fa fa-2x fa-users"></span>
                        <?php
                    echo json_encode($activemembers);
                    ?> Applicants</h4></div>
            </div>

                    <h4 class="well well-sm">Administrator dashborad/ Staff members reports</h4>
                    <table id="staffinfo" class="table table-responsive ">
               <thead>
                   <th >#</th>
                    <th >Full name</th>
                     <th >Gender</th>
                      <th >Age</th>
                       <th >Hire date</th>
               </thead> 
                    <tbody>
                        <?php 
$no=1;
                        foreach ($staffs as $Staff) {
                            $birthdate=$Staff->birth_date;
                            $bdadate=new DateTime($birthdate);
                            $now = new DateTime();
                            $diff=date_diff($now,$bdadate);//OP: +272 days

                            $Longage= $diff->format('%y years %m months %d days ');
                            $age= $diff->format('%y');
                            $fullname=$Staff->FirstName." ".$Staff->MiddleName." ".$Staff->LastName;
                             echo "<tr>
                             <td>".$no."</td>
                             <td>".$fullname."</td>
                              <td>".$Staff->Gender."</td>
                              <td>".$age."</td>
                              <td>".$Staff->hire_date."</td>
 
                             </tr>";
                             $no++;
                         } ?>
                    </tbody>
                </table>

            <div class="row">
                <div class="col-lg-12">
                    <h4 class="well well-sm">Staff members reports</h4>
                <table class="table table-responsive ">
               <thead>
                   <th >#</th>
                    <th >Title</th>
                     <th >Date posted</th>
                     <th >Due Date </th>
                       <th >No. of applicants</th>
                      <th >Actions</th>
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
                      <td>".$vacancy->totalapplications."</td>
                        <td><select id='action' class='form-control'>
                        <option>choose action</option>
                          <option>set inactive</option>
                          <option>Edit vacancy</option>
                           <option>do screening</option>
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
<link rel="stylesheet" href="<?php echo base_url()?>/resources/jquery/jquery-ui/css/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url()?>/resources/DataTable/css/jquery.dataTables.css">
<script src="<?php echo base_url()?>/resources/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>/resources/jquery/jquery-ui/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url()?>/resources/DataTable/js/jquery.dataTables.js"></script>
<script>
var element=document.getElementsByTagName('table');
var select=document.getElementsByTagName('select');
$(element).dataTable();

</script>


