<?php
require_once('connection/db.php');
if (isset($_POST['pesquisar'])) {
    $sql = 'select * from produtos pr left join precos ps on pr.id_preco = ps.price_id where 1=1';
    if(!empty($_POST['name']))
    {
        $sql .= ' and pr.name like "%' . $_POST['name'].'%"';
    }
    if(!empty($_POST['color']))
    {
        $sql .= ' and pr.color = "' . $_POST['color'].'"';
    }

    $result = $db->query("$sql");
} else {
    $result = $db->query("select * from produtos pr left join precos ps on pr.id_preco = ps.price_id ");
}
$price = 0;
$sale = 0;
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabelas Responsivas</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <div class="center">
        <div class="card">
            <h2>Filtro de Produtos</h2>
            <div class="content">
                <form class="form-inline" action="" method="post" name="produt">
                    <label for="name">Nome do produto:</label>
                    <input class="form-control" type="text" id="name" name="name">
       
                    <label for="color">Color</label>
                
                    <select id="color" class="form-control" name="color">
                    <option value="">Selecione</option>
                        <option value="Azul">Azul</option>
                        <option value="Amarelo">Amarelo</option>
                        <option value="Vermelho">Vermelho</option>
                    </select>
                    <button name="pesquisar" type="submit">Pesquisar</button>
              
                </form>
            </div>
        </div>
        <div class="card">
            <h2>Produtos</h2>
            <div class="content">
                <table class="rTable">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Cor</th>
                            <th>Preço</th>
                            <th>Desconto</th>
                            <th>Preço + Desc</th>
                            <th>#</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) {
                            if ($row['color'] == 'Azul' or $row['color'] == 'Vermelho' and $row['price'] <= 50.00) {
                                $sale = 20;
                            } elseif ($row['color'] == 'Amarelo') {
                                $sale = 10;
                            } elseif ($row['color'] == 'Vermelho' and $row['price'] > 50.00) {
                                $sale = 5;
                            }
                            $price = $row['price'] - (($row['price'] / 100) * $sale);
                        ?>
                            <tr>

                                <td><?php echo ($row['name']); ?></td>
                                <td><?php echo ($row['color']); ?></td>
                                <td><?php echo "R$ " . (number_format($row['price'], 2, ",", '.')); ?></td>
                                <td><?php echo ($sale); ?></td>
                                <td><?php echo "R$ " . (number_format($price, 2, ",", '.')) ?></td>
                                <td><button type="button" onclick="excluirProduto(<?php echo ($row['product_id']); ?>)">Excluir</button></td>
                            </tr>
                        <?php } ?>



                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="main.js"></script>
</body>

</html>