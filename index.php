<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.php"></link>
</head>

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
<body>



</body>
</html>