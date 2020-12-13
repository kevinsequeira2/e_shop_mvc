<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProductsClient</title>
</head>
<body class="bg-info">
    <h4 class="text-white">Buys</h4>
    <center>
            <div class="container">
                <?php
                    echo form_open('/ClientController/viewclientProducts');
                ?>

                <div class="form-group">
                <span class="text-white">
                    <?php
                        echo form_label('Categories');
                    ?>
                </span>
                
                    
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
                    echo form_submit('viewclientProducts','Search','class="btn btn-primary"');
                    echo "<br>";
                ?>
                </div>
                <button class="btn btn-danger"><a href="<?php echo base_url(); ?>/ViewClient">Back</a></button>
                <?php
                    echo form_close();
                ?>
            </div>
        
    </center>

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
                        <th><span class="text-danger">Buy</span></th>
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
                        <td><a href="<?php echo base_url(); ?>/buy/car?id=<?php echo $data['id']; ?>" class="btn btn-primary" role="button">Buy<i class="bi bi-arrow-right-circle"></i></a></td>
                    </tr>
                    <?php }?>
                </table>
                
                
            </div>

        </div>
        <br>
</body>
</html>