<?php
require_once('connection/db.php');
$result = $db->query("select * from precos ");
if (isset($_GET['product_id']))
{
    $sql = 'select * from produtos pr left join precos ps on pr.id_preco = ps.price_id where 1=1 and pr.product_id = '.$_GET['product_id'];
    $dados = $db->query($sql);
    $dados = $dados->fetch_assoc();
}
if (isset($_POST['novo']))
{
    $sql = "update produtos set `name` = '".$_POST['name']."' where  product_id = ".$_POST['product_id'];
    $db->query($sql);
    //header("location: index.php");
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
                    <input class="form-control" type="text" id="name" value="<?php echo $dados['name']; ?>" name="name">
                    <input  type="hidden" id="product_id" value="<?php echo $_GET['product_id']; ?>" name="product_id">
                    <label for="color">Color</label>

                  
                    <button name="novo" type="submit">Editar</button>

                </form>
            </div>
        </div>

    </div>
</body>

</html>