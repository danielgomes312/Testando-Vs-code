<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$array = [
    'nome' => 'Daniel',
    'idade' => '25',
    'empresa' => 'Virtex',
    'cor' => 'vermelho',
    'profissao' => 'atendente de telemarketing'
];
?>

<table border="1">
    <?php foreach($array as $chave => $valor): ?>
        <tr>
            <td><?php echo $chave; ?></td>
            <td><?php echo $valor; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>