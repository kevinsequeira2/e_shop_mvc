<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Singnup</title>
</head>
<body class="bg-success">
    <center>
        <h1 class="text-white">Singnup</h1>
        <div class="container">

            <div class="form-group">
                <?php
                        echo form_open('/UserController/addUser'); 
                    ?>
                    <br>
                    <h4 class="text-white">Email</h4>
                    <?php
                        echo "<br>";
                        echo form_input(array('id'=>'i_login','type'=>'email','name' =>'email' , 'placeholder' =>'email@example.com','class'=>'form-control'));
                        echo "<br>";
                    ?>
                    <h4 class="text-white">Password</h4>
                    <?php
                        echo "<br>";
                        echo form_input(array('id'=>'i_login','type'=>'password','name' =>'password' , 'placeholder' =>'password','class'=>'form-control'));
                        echo "<br>";
                        echo "<br>";
                    ?>
                    <h4 class="text-white">Name</h4>
                    <?php
                        echo "<br>";
                        echo form_input(array('id'=>'i_login','name' =>'name' , 'placeholder' =>'name','class'=>'form-control'));
                        echo "<br>";
                    ?>
                    <h4 class="text-white">lastName</h4>
                    <?php
                        echo "<br>";
                        echo form_input(array('id'=>'i_login','name' =>'lastName' , 'placeholder' =>'lastName','class'=>'form-control'));
                        echo "<br>";
                    ?>
                    <h4 class="text-white">cellPhone</h4>
                    <?php
                        echo "<br>";
                        echo form_input(array('id'=>'i_login','type'=>'number','name' =>'cellPhone' , 'placeholder' =>'CellPhone','class'=>'form-control'));
                        echo "<br>";
                    ?>
                    <h4 class="text-white">Address</h4>
                    <?php
                        echo "<br>";
                        echo form_input(array('id'=>'f_address','name' =>'address' , 'placeholder' =>'address','class'=>'form-control'));
                    ?>
                    <?php
                        echo "<br>";
                        echo form_submit('addUser','Singnup','class="btn btn-primary"');

                    ?>
                    
                </div>
                <?php
                    echo form_close();
                ?>
            </div>
        </div>
    </center>
    
</body>
</html>