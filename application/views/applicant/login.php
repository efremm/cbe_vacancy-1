
<div class="container">
    <div class="form-group col-lg-6 col-lg-offset-2">
        <div class="well well-sm">Applicant Login</div>
        <?php
        echo $this->session->flashdata("error");
        $atrib = array('class' => 'form-group',
            'method' => 'post');
        echo form_open('applicant/authenticate',$atrib);
        ?>
        <div class="form-group">
            <label>Enter username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label>Enter password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password">
        </div>
        <button class="btn btn-primary" >Login</button>
        <?php
        echo form_close();
        ?>

    </div>
</div>