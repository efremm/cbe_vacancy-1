
<div class="row" >
    <div class="panel panel-primary">
        <div class="panel-heading text-center">
            <h2>commmercial bank of Ethiopia vacancy portal</h2> </div>

    </div>
    <div class="col-lg-12" >
        <?php
        echo $this->session->flashdata("msg");
        ?>
        <div class="col-lg-3  ">
            <?php
            $this->load->view('Admin/sidebar');
            ?>

        </div>
        <div class="col-lg-9" id="content">
            <div class="row">
          <h4 class="text-info">Publish new Job</h4>
              <div class="errordiv" id="errordiv">

              </div>
           <div class="form-group">
              <?php
              $formattribe=array('class'=>'form-group',
                             'id'=>'post_job');
              echo form_open('vacancy/do_post',$formattribe);?>
                   <div class="form-group">
                       <label for="title">Job title</label>
                       <input class="form-control" name="title" id="title">
                   </div>

                   <div class="form-group col-lg-4">
                       <label for="content"> Minimum Salary</label>
                       <input class="form-control" name="minimumsalary" id="minimumsalary"/>
                   </div>
                   <div class="form-group col-lg-4">
                       <label for="content"> maximum Salary</label>
                       <input class="form-control" name="maxsalary" id="maxsalary"/>
                   </div>
                   <div class="form-group col-lg-4">
                       <label for="content">  Vacancy Category </label>
                       <select class="form-control" name="catagory" id="catagory">
                           <option value="">choose catagory</option>
                           <?php
                           foreach ($category as $catagory){
                               echo '<option value="'.$catagory->Job_catagory_id.'">'.$catagory->catagory_name.'</option>';

                           }

                           ?>
                       </select>
                   </div>
                   <div class="form-group col-lg-4">
                       <label for="content">  Vacancy type </label>
                       <select class="form-control" name="vacancytype" id="vacancytype">
                           <option value="">choose type</option>
                           <option>contract</option>
                           <option>permanent</option>
                           <option>part time</option>
                       </select>
                   </div>
                   <div class="form-group col-lg-4">
                   <label for="agelimit"> Maximum Age (in Years) </label>
                   <input class="form-control" type="number" name="agelimit" id="agelimit">
                      </div>
                   <div class="form-group col-lg-4">
                       <label for="content">  Education Qualification </label>
                       <select class="form-control" name="qualification" id="qualification" >
                           <option>choose qualification</option>
                           <?php 
                           foreach ($qualifications as $qualification) {
                            echo "<option value='".$qualification->qualification_id."'>".$qualification->Qualification_name."</option>";
                              # code...
                            } ?>
                       </select>
                   </div>
                   <div class="form-group col-lg-4">
                       <label for="content">  Education specilization </label>
                       <select class="form-control" name="specialization" id="specialization">
                           <option></option>
                       </select>
                   </div>
                   <div class="form-group col-lg-4">
                       <label for="content"> Cumulative Grade Range(Ext) </label>
                       <input max="4" min="2.0" class="form-control" name="cgpa" id="cgpa">
                           <option></option>
                       </input>
                   </div>
                   <div class="form-group col-lg-4">
                       <label for="content"> minimum required experience</label>
                       <input class="form-control" name="experience" id="experience">

                   </div>

                   <div class="form-group">
                       <label for="briefdesc">Brief Description </label>
                       <textarea class="form-control" name="briefdesc" id="briefdesc"></textarea>
                   </div>
                   <div class="form-group">
                       <label for="content">Detailed Description </label>
                       <textarea class="form-control" name="detaileddesc" id="detaileddesc"></textarea>
                   </div>

                   <div class="form-group">
                       <label for="content"> Additional Details </label>
                       <textarea class="form-control" name="additionalDetails" id="additionalDetails"></textarea>
                   </div>


                   <div class="form-group">
                       <input  type="submit" class="btn btn-primary" value="Publish">
                   </div>
               </form>
           </div>
        </div>
    </div>
    </div>
</div>

<script src="<?php echo base_url()?>/resources/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>/resources/js/jquery.validate.min.js"></script>
<?php
//todo   validation work
?>
?>
<style type="text/css">
   .error{
       color: red;
       font-size: small;
   }
</style>
<script>
$().ready(function () {
    $('#post_job').validate(
        {
            rules:{
                briefdesc:{
                    required:true
                },
                title:{
                    required:true,
                    minlength:20,
                    digits:false
                },
                minimumsalary:{
                    required:true,
                    digits:true
                },
                additionalDetails:{
                    minlength:150,
                    required:true
                },
                cgpa:{
                    required:true,
                    min:2,
                    max:4
                },
                experience:{
                    required:true,
                    digits:true
                },
                detaileddesc:{
                    required:true,
                    digits:false,
                    minlength:150
                },
                catagory:{
                    required:true
                },
                maxsalary:{
                    required:true,
                    digits:true
                },
                agelimit:{
                    required:true,
                    max:35
                },
               qualification:{
                   required:true
               },
               specialization:{
                   required:true
               },
                vacancytype:{
                    required:true
                }

            },
            messages:{
                briefdesc:{
                    required:"Enter the brief description of Job"
                },
                title:{
                    required:"Title can not be empty!! please include short description of job"

                },
                vacancytype:{
                    required:"vacancy type can not be empty"
                }


            }
         });
$('#qualification').on('change',function () {
var data=this.value;
    var xmlhttp=new XMLHttpRequest();
    var url = "<?php echo base_url()?>vacancy/get_spec/" + data;
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            $('#specialization').html(xmlhttp.responseText) ;
        }
    }
    xmlhttp.open('GET', url, true);
    xmlhttp.send();

});

    });
</script>
<script type="text/javascript">

function getspec() {
    var data=this.value;
    alert(data);

//    var xmlhttp=new XMLHttpRequest();
//    var url;
//    url = "<?php //echo base_url()?>//vacancy/get_spec/" + data;
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            $('#specialization').innerHTML = xmlhttp.responseText;
//        }
//    }
//    xmlhttp.open('GET', url, true);
//    xmlhttp.send();

}
</script>