<script src="<?php echo base_url()?>resources/js/jquery-1.10.2.js"></script>
<div class="row" >
    <div class="row">
        <img class="img img-responsive" src="<?php echo base_url()?>/images/header.jpg" style="width: 100%;height: 120px;">
    </div>
    <div class="container-fluid" >
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="link"><a href="<?php echo base_url()?>"> <span class="fa fa-1x fa-home"> </span> <strong>Home</strong> </a></li>


                    <li link title="recent job listings"><a href="<?php echo base_url()?>vacancy/jobListing"><span class="fa fa-search"></span>  <strong> Search Jobs</strong>  </a></li>

                    <li title="Frequently asked questions"><a href="<?php echo base_url()?>combankEth/faq"> <strong><span class="fa  fa-question-circle"></span> FAQ</strong> </a></li>
                     <li title="Contact us"><a href="<?php echo base_url()?>combankEth/contact_us"> <strong><span class="fa  fa-phone-square"></span>  contact us </strong> </a></li>
                    <li title="Contact us"><a href="<?php echo base_url()?>combankEth/about"> <strong> <span class="fa  fa-info-circle"></span> About us</span>  </strong> </a></li>
                 <?php
                 if(!empty($this->session->userdata('applicantlogged'))){
                     ?>
                     <li title="Contact us"><a href="<?php echo base_url()?>Applicant/myapplications"> <strong> <span class="fa fa-bookmark"></span> My applications </strong> </a></li>
                     <?php
                 }
                 ?>
                </ul>
                <ul class=" nav navbar-nav navbar-right">
                    <?php
                    if(empty($this->session->userdata('applicantlogged'))){
                       ?>
                        <li> <a href="<?php echo base_url()?>applicant/login"> <span class="fa  fa-sign-in"></span> Login</a></li>
                    <?php
                    }
                    ?>


                    <li> <a href="<?php echo base_url()?>applicant/register"> <span class="fa fa-edit"></span>
                            <?php
                            $fullname=null;
                            if(!empty($this->session->userdata('Id')))
                            {
                            foreach ($info as $name)
                            {
                                $fullname=$name->FirstName." ".$name->MiddleName;
                            }
                            if(!empty($this->session->userdata('Id'))){
                                echo "Welcome, ".$fullname;
                            }else{
                                echo "Become member";
                            }

                            }else{
                                echo "become member";
                            }

                            ?>
                        </a>
                    </li>
                    <?php
                    if(!empty($this->session->userdata('applicantlogged'))){
                        ?>

                        <li title="Contact us"><a href="<?php echo base_url()?>Applicant/logout">  <span class="fa fa-sign-out"></span> Logout  </a></li>
                        <?php
                    }
                    ?>

                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</div>
</div>
