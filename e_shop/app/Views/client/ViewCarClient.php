<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car_Client</title>
</head>
<body class="bg-info">
<center>
        <h1>Car</h1>
        <!--list of especifits products for show a client-->
        <label><b>List products</b> </label>
        <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th>Quantity</th>
                    <th>|||+|||</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
                <?php 

                    foreach ($content as $data3){
                ?>
                <tr>
                    <td><?php echo $data3->id; ?></td>
                    <td><?php echo $data3->name; ?></td>
                    <th><?php echo $data3->SKU; ?></th>
                    <th><textarea name="" id="" cols="20" rows="3"> <?php echo $data3->description; ?></textarea></th>
                    <th><?php echo $data3->Stock; ?></th>
                    <th><?php echo $data3->quantity; ?></th>
                    <th><button><a href="<?php echo base_url(); ?>/update/car?id=<?php echo $data3->id; ?>">+</a></button></th>
                    <th><?php echo $data3->Precio; ?></th>
                    <th><img src="<?php echo base_url(); ?>/<?php echo $data3->image; ?>" width="100px" height="100px"></th>
                    <!--<th><button><a href="buy_product.php?id=<?php echo $data3->id; ?>">BUY</a></button></th>-->
                    <th><button><a href="<?php echo base_url(); ?>/delete/car?id=<?php echo $data3->id; ?>">Delete</a></button></th>
                </tr>
                
                <?php } ?>
                

        </table>
        <button class="btn btn-danger"><a href="<?php echo base_url(); ?>/ViewClient">Back</a></button>
        <br>
        <br>
        <button><a href="<?php echo base_url(); ?>/buy/all">checkout</a></button>
    </center>
</body>
</html>