<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body class="bg-warning">
    <center><br><br><br><h3>Products</h3></center>
    <br>
    <br>
    <div class="container">
            <div class="row">

            </div>
            <div class="row">
                <table class="table">
                    <tr>
                        <th><span class="text-danger">Id</span></th>
                        <th><span class="text-danger">SKU</span></th>
                        <th><span class="text-danger">Description</span></th>
                        <th><span class="text-danger">Stock</span></th>
                        <th><span class="text-danger">Precio</span></th>
                        <th><span class="text-danger">Name</span></th>
                        <th><span class="text-danger">id_category</span></th>
                        <th><span class="text-danger">Image</span></th>
                        <th><span class="text-danger">Edit</span></th>
                        <th><span class="text-danger">Delete</span></th>
                    </tr>
                    <?php foreach ($products as $data) {?>
                    <tr>
                        <td><span class="text-white"><?php echo $data['id']; ?></span></td>
                        <td><span class="text-white"><?php echo $data['SKU']; ?></span></td>
                        <td><span class="text-white"><?php echo $data['description']; ?></span></td>
                        <td><span class="text-white"><?php echo $data['Stock']; ?></span></td>
                        <td><span class="text-white"><?php echo $data['Precio']; ?></span></td>
                        <td><span class="text-white"><?php echo $data['name']; ?></span></td>
                        <td><span class="text-white"><?php echo $data['id_category']; ?></span></td>
                        <td><span class="text-white"><img src="<?php echo base_url(); ?>/<?php echo $data['image']; ?>" width="100px" height="100px"></span></td>
                        <td><a href="<?php echo base_url(); ?>/edit/category?id=<?php echo $data['id']; ?>" class="btn btn-primary" role="button"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="<?php echo base_url(); ?>/delete/category?id=<?php echo $data['id']; ?>" class="btn btn-danger" role="button"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php }?>
                </table>
                
                
            </div>

        </div>
        <br>
        <center>
            <div class="container">
                <?php
                    echo form_open('/ProductsController/saveProducts');
                ?>

                <div class="form-group">
                <?php
                    echo form_label('Insert products');
                    echo "<br>";
                    echo form_label('SKU');
                    echo "<br>";
                    echo form_input(array('id'=>'input','name' =>'SKU','type' =>'number' , 'placeholder' =>'SKU','class'=>'form-control'));
                    echo "<br>";
                    echo form_label('Description');
                    echo "<br>";
                    echo form_input(array('id'=>'input','name' =>'description','type' =>'text' , 'placeholder' =>'description','class'=>'form-control'));
                    echo "<br>";
                    echo form_label('Stock');
                    echo "<br>";
                    echo form_input(array('id'=>'input','name' =>'Stock','type' =>'number' , 'placeholder' =>'Stock','class'=>'form-control'));
                    echo "<br>";
                    echo form_label('Price');
                    echo "<br>";
                    echo form_input(array('id'=>'input','name' =>'Precio','type' =>'number' , 'placeholder' =>'Price','class'=>'form-control'));
                    echo "<br>";
                    echo form_label('Name');
                    echo "<br>";
                    echo form_input(array('id'=>'input','name' =>'name' , 'placeholder' =>'name','class'=>'form-control'));
                    echo "<br>";
                    echo form_label('Image');
                    echo "<br>";
                    echo form_input(array('id'=>'input','name' =>'image' , 'type' =>'file','class'=>'form-control'));
                    echo "<br>";
                    echo form_label('Id_category');
                    echo "<br>";
                    ?>
                    
                    <select name="id_category">
                            <?php foreach ($categories as $key ) {
                                # code...
                             ?>
                            <option value="<?php echo $key['id']; ?>" <?php echo  set_select('id_category', $key['id'], TRUE); ?> ><?php echo $key['name']; ?></option>
                            <?php } ?>
                    </select>
                    <br>
                    <?php
                    echo "<br>";
                    echo form_submit('saveProducts','Save','class="btn btn-primary"');
                    echo "<br>";
                ?>
                </div>
                <button class="btn btn-danger"><a href="<?php echo base_url(); ?>/admin">Back</a></button>
                <?php
                    echo form_close();
                ?>
            </div>
        
    </center>
    
</body>
</html>