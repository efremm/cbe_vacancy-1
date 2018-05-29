<?php
/**
 * Created by PhpStorm.
 * User: Birhan
 * Date: 4/26/2018
 * Time: 5:18 PM
 */
?>

<div class="container-fluid" style="margin-top:2px">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2>Afromed institute of public health</h2> </div>

    </div>
    <div class="col-lg-12">
        <div class="col-lg-3">
            <?php
            $this->load->view('Admin/sidebar');
            ?>

        </div>
        <div class="col-lg-9" ">
        <h3 class="page-header">Add new research </h3>
        <form>
            <div class="form-group">
                <label for="title">research tilte</label>
                <input type="text" name="researchtitle" class="form-control" id="researchtitle" placeholder="Enter research title">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description </label>
                <input type="password" class="form-control" id="desc" placeholder="description">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Check me out
                </label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
</div>

<script src="<?php echo base_url()?>/resources/js/jquery-1.10.2.js"></script>
