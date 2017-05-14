<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once 'mycss.php'?>

</head>
<body>
   
    <br/>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 well">        
                <img src="<?php echo base_url('photos/econcern.png')?>"  height="42" width="60"></img>
                <?php $attributes = array("name" => "loginform");
                echo form_open("index.php/login", $attributes);?>
                <legend>Login</legend>
                <div class="form-group">
                    <label for="name">Institution ID</label>
                    <input class="form-control" name="CompanyID" placeholder="Enter Institution ID" type="text"
                     value="<?php echo set_value('CompanyID'); ?>" />
                    <span class="text-danger"><?php echo form_error('CompanyID'); ?></span>

                </div>
                <div class="form-group">
                    <label for="name">ID Number</label>
                    <input class="form-control" name="IDNumber" placeholder="Enter ID Number" type="text" value="<?php echo set_value('IDNumber'); ?>" />
                    <span class="text-danger"><?php echo form_error('IDNumber'); ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input class="form-control" name="Pwd" placeholder="Password" type="password" value="<?php echo set_value('Pwd'); ?>" />
                    <span class="text-danger"><?php echo form_error('Pwd'); ?></span>
                </div>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                </div>
                <legend></legend>
            
                <?php echo form_close(); ?>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
        </div>
        
    </div>

    <?php include_once 'myjs.php'?>
</body>
</html>
