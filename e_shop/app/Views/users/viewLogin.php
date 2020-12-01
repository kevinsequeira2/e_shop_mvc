<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body class="bg-primary">
    <center>
        <div class="container">
            
            <div class="col-md-5">
                
                <div class="row">
                    <h1 class="text-white">Login</h1>
                </div>
                
            </div>
            <br>
            <br>
            <br>
            <div class="form-group">
                <?php
                    echo form_open('/UserController/validLogin'); 
                ?>
                <h4 class="text-white">Email</h4>
                <?php
                    echo "<br>";
                    echo "<br>";
                    echo form_input(array('id'=>'i_login','name' =>'email' , 'placeholder' =>'email','class'=>'form-control'));
                    echo "<br>";
                 ?>
                 <h4 class="text-white">Password</h4>
                 <?php
                    echo "<br>";
                    echo "<br>";
                    echo form_input(array('id'=>'i_login','type'=>'pass','name' =>'password' , 'placeholder' =>'password','class'=>'form-control'));
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";

                    echo form_submit('validLogin','Go','class="btn btn-success"');
                    echo "<br>";
                    echo "<br>";
                ?>
                <label class="text-white"><?php echo $error; ?></label>
                <br>
                <a href="<?php echo base_url(); ?>/users/singnup" class="text-white" >Singnup</a>
            </div>
            <?php
                echo form_close();
            ?>
        </div>
    </center>
    
    
</body>
</html>