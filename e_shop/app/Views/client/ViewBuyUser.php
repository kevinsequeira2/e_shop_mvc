<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuysUsers</title>
</head>
<body class="bg-warning">
    <center>
        <table class="table">
        
            <tr>
                <th>id</th>
                <th>Code</th>
                <th>Date</th>
                <th>Total</th>
                <th>VIEW BUY</th>

            </tr>
            <?php foreach ($content as $data) {?>
            <tr>
                <td><?php echo $data->id; ?></td>
                <td><?php echo $data->code; ?></td>
                <td>|<?php echo $data->date; ?>|</td>
                <td><?php echo $data->total; ?></td>
                <td><button><a href="<?php echo base_url(); ?>/especifict?id=<?php echo $data->code; ?>">GO</a></button></td>

            </tr>
            <?php } ?>
        </table>
    </center>
    <center>
        <button id="firstText"><a href="<?php echo base_url(); ?>/ViewClient">Back welcome</a></button>
    </center>
</body>
</html>