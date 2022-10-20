<?php
    //USAR SESSOES QND USAMOS INFOR PERSISTENTE
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Carrinho De Compras</title>
</head>
<body>

    <h2 class="title">Carrinho</h2>
    <div class="container">
        <?php
            //ARRAY MULTIDIMENCIONAL
            $items = array(['nome' => 'NOTEBOOK GAMER', 'imagem' => 'img/1xg.jpg', 'preco' => '200'],
                ['nome' => 'PS5', 'imagem' => 'img/ps5.webp', 'preco' => '5000'],
                ['nome' => 'XBOX SERIE X', 'imagem' => 'img/xbox.jpg', 'preco' => '6000']);

            foreach ($items as $key => $value) {
                # code...

        ?>
            <div class="produto">
                <img src="<?php echo $value['imagem']?>" alt="">
                <a href="?adicionar=<?php echo $key?>">Adicionar Ao Carrinho</a>
            </div><!--produto-->

        <?php
            }
        ?>
    </div><!--container-->

    <?php
        if(isset($_GET['adicionar'])){
            //Vamos adicionar ao carrinho
            //(INT) É DA UM CAT PARA GARANTIR Q SEJA INTERO
            $idProduto = (int) $_GET['adicionar'];
            if(isset($items[$idProduto])){
                if(isset($_SESSION['carrinho'][$idProduto])){
                    $_SESSION['carrinho'][$idProduto]['quantidade']++;
                }else{
                    $_SESSION['carrinho'][$idProduto] = array('quantidade'=>1,'nome'=>$items[$idProduto]['nome'],'preco' => $items[$idProduto]['preco']);
                }
            }else{
                die('Produto não existe.');
            }
        }
    ?>

    <h2 class="title">Carrinho:</h2>

    <?php
        foreach($_SESSION['carrinho'] as $key => $value){
            echo '<div class="carrinho-item">';
            echo '<p>Nome: '.$value['nome']. ' | Quantidade '.$value['quantidade']. ' | Preço '.($value['quantidade']) * ($value['preco']).'</p>';
            echo '</div>';
        }
    ?>
    
</body>
</html>
