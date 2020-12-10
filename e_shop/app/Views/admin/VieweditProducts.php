<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EditProducts</title>
</head>
<body>
<center>
            <div class="container">
                <?php
                    echo form_open('/ProductsController/edit_Products');
                    if(isset($products)){
                        $SKU = $products[0]['SKU'];
                        $description = $products[0]['description'];
                        $image = $products[0]['image'];
                        $Precio = $products[0]['Precio'];
                        $Stock = $products[0]['Stock'];
                        $name = $products[0]['name'];
                        $id_category = $products[0]['id_category'];
                    }else{
                        $SKU = "";
                        $description = "";
                        $image = "";
                        $Precio = "";
                        $Stock = "";
                        $name = "";
        
                    }
                ?>

                <div class="form-group">
                <?php
                    echo form_label('Insert products');
                    echo "<br>";
                    echo form_label('SKU');
                    echo "<br>";
                    echo form_input(array('id'=>'input','name' =>'SKU','type' =>'number' , 'placeholder' =>'SKU','class'=>'form-control','value'=>$SKU));
                    echo "<br>";
                    echo form_label('Description');
                    echo "<br>";
                    echo form_input(array('id'=>'input','name' =>'description','type' =>'text' , 'placeholder' =>'description','class'=>'form-control','value'=>$description));
                    echo "<br>";
                    echo form_label('Stock');
                    echo "<br>";
                    echo form_input(array('id'=>'input','name' =>'Stock','type' =>'number' , 'placeholder' =>'Stock','class'=>'form-control','value'=>$Stock));
                    echo "<br>";
                    echo form_label('Price');
                    echo "<br>";
                    echo form_input(array('id'=>'input','name' =>'Precio','type' =>'number' , 'placeholder' =>'Price','class'=>'form-control','value'=>$Precio));
                    echo "<br>";
                    echo form_label('Name');
                    echo "<br>";
                    echo form_input(array('id'=>'input','name' =>'name' , 'placeholder' =>'name','class'=>'form-control','value'=>$name));
                    echo "<br>";
                    echo form_label('Image');
                    echo "<br>";
                    echo form_input(array('id'=>'input','name' =>'image' , 'type' =>'file','class'=>'form-control'));
                    ?>
                    <img src="<?php echo base_url()."/".$image; ?>" >
                    <br>
                    
                    <select name="id_category">

                            <option value="<?php echo $id_category; ?>" <?php echo  set_select('id_category', $id_category, TRUE); ?> ><?php echo $id_category; ?></option>
                    </select>
                    <?php
                    echo form_hidden('id',$products[0]['id']);
                    echo "<br>";
                    echo form_submit('edit_Products','Save','class="btn btn-primary"');
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