


<div class="container">




<?php
foreach ($detail as $object) {


    echo '<p class="">Job Title: ' . $object->job_title . '</p>';
    echo '<p>Minimum Required experience:' . $object->required_experience . ' year</p>';
    echo '<p>Minimum salary: ' . $object->minumum_salary . ' Birr</p>';
    echo '<p>maximum salary: ' . $object->Maximum_salary . ' Birr</p>';
    echo '<p>Employement: ' . $object->vacancy_type . ' </p>';
    echo '<p>Maximum age: ' . $object->maximum_age . ' year<small>
                      <span class="text-muted text-warning">(Applicants Aged more than 35 are not no more wanted)</span> </small></p>';

    echo '<p class="text-justify">  Brief Description:  ' . $object->Brief_Description . ' </p>';
    echo '<p class="text-justify">  Detailed Description:  ' . $object->Detailed_Description . ' </p>';
    echo '<p class="text-justify">  Additional Description:  ' . $object->Additional_Details . ' </p>';
    echo '<p class=" text-muted pull-right">  job posted:  ' . $object->Job_posted . ' </p>';

    $atrib = array('class' => 'form-group',
        'method' => 'post');
    echo form_open('applicant/apply',$atrib);
    echo form_hidden('user',$this->session->userdata('Loggeduser'));
    $btnattrib=array('class' => 'btn btn-primary');
    echo form_submit('class=form-control' ,'Apply to this Job',$btnattrib);
    echo form_close();

}
?>
</div>
