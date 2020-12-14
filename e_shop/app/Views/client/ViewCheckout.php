<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body class="bg-info">
    <center><h1>Purchase order</h1></center>
        <center>
        <!--here show products purchase for the client-->
            <table class="table"> 
                <tr>
                    <th>
                        Total products
                    </th>
                    <th>
                        Total Price
                    </th>
                </tr>
                <?php foreach ($content as $data) { ?>
                <tr>
                    <td><?php echo $data->total_of_products; ?></td>
                    <td><?php echo $data->total; ?></td>
                </tr>
                <?php }?>
            </table>
            
        </center>
        <center><button><a href="<?php echo base_url(); ?>/buy/completed">CONFIRM</a></button></center>
</body>
</html>