<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body class="bg-info">
    <center><br><br><br><h3>Category</h3></center>
    <center>
    <div class="container">
		<div class="row">

		</div>
		<div class="row">
			<table class="table">
				<tr>
					<th><span class="text-danger">Id</span></th>
					<th><span class="text-danger">Name</span></th>
					<th><span class="text-danger">Edit</span></th>
					<th><span class="text-danger">Delete</span></th>
				</tr>
				<?php foreach ($categories as $data) {?>
				<tr>
					<td><span class="text-white"><?php echo $data['id']; ?></span></td>
					<td><span class="text-white"><?php echo $data['name']; ?></span></td>
					<td><a href="<?php echo base_url(); ?>/edit/category?id=<?php echo $data['id']; ?>" class="btn btn btn-warning" role="button"><i class="fa fa-pencil-square-o"></i></a></td>
					<td><a href="<?php echo base_url(); ?>/delete/category?id=<?php echo $data['id']; ?>" class="btn btn-danger" role="button"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php }?>
			</table>
			
			
		</div>

	</div>
    <br>
    <div class="container">
        <?php
            echo form_open('/CategoryController/saveCategory');

            if(isset($categories)){
                $name = $categories[0]['name'];
            }else{

                $name = "";

            }
        ?>

        <div class="form-group">
        <?php
            echo form_label('Edit Name');
            echo "<br>";
            echo form_input(array('name' =>'name' , 'placeholder' =>'name','class'=>'form-control','value'=>$name));
	        echo "<br>";
            echo form_submit('saveCategory','Save','class="btn btn-primary"');
            echo "<br>";
            if(isset($categories)){
                echo form_hidden('id',$categories[0]['id']);
            }
        ?>
        </div>
        <button class="btn btn-danger"><a href="<?php echo base_url(); ?>/add/category">Add</a></button>
        <button class="btn btn-warning"><a href="<?php echo base_url(); ?>/admin">Back</a></button>
        <?php
            echo form_close();
        ?>
        </div>
        
    </center>
    
</body>
</html>