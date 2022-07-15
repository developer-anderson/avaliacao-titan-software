<?php
require_once('connection/db.php');
$result = $db->query("select * from precos ");
if (isset($_POST['novo']))
{
    $sql = "insert into produtos set `name` = '".$_POST['name']."', `color` = '".$_POST['color']."', id_preco = ".$_POST['precos'];
    $db->query($sql);
    header("location: index.php");
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desafio</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <div class="center">
        <div class="card">
            <h2>Inclusão  de Produtos</h2>
            <a href="./">Voltar</a>
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
                    <select name="precos" class="form-control" id="precos" placeholder="Digite a forma de pagamento">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <option value="<?php echo ($row['price_id']); ?>"><?php echo ($row['price']); ?></option>
                        <?php } ?>
                    </select>
                    <button name="novo" type="submit">Salvar</button>

                </form>
            </div>
        </div>

    </div>
    <script src="main.js"></script>
</body>

</html>