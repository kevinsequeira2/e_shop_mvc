<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body class="bg-info">
    <center><br><br><br><h3>Category</h3></center>
    
    <br>
    <div class="container">
        <?php
            echo form_open('/CategoryController/insertCategory');
        ?>

        <div class="form-group">
        <?php
            echo form_label('Name');
            echo "<br>";
            echo form_input(array('name' =>'name' , 'placeholder' =>'name','class'=>'form-control'));
	        echo "<br>";
            echo form_submit('insertCategory','Save','class="btn btn-primary"');
            echo "<br>";
        ?>
        </div>
        <?php
            echo form_close();
        ?>

        </div>

    </center>
    
</body>
</html>