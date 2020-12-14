<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Especifict buy</title>
</head>
<body class="bg-info">
    <center>
        <!--this form show especifits products-->
            <table class="table" >
                <tr>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
                <?php foreach ($content as $data) { ?>
                <tr>
                    <td><?php  echo $data->date; ?></td>
                    <td><?php  echo $data->total; ?></td>
                    <td><?php  echo $data->description; ?></td>
                    <td><?php  echo $data->Precio; ?></td>
                </tr>
                <?php } ?>
            </table>
        </center>
        <br>
        <br>
        <center>
        <button class="btn btn-danger"><a href="<?php echo base_url(); ?>/ViewClient">Back</a></button>
        </center>
</body>
</html>