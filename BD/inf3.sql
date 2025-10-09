<?php  include "header.php"  ?>

    <div class="container text-center">

        <?php
            //Verifica se há algum parÂmetro sendo recebido por método GET
            if(isset($_GET["idProduto"])){
                $idProduto = $_GET["idProduto"]; //Armazena o parâmetro em uma váriavel PHP

                include "conexaoBD.php"; //Inclui a conexão com o Banco de Dados
                $buscarProduto  = "SELECT * FROM Produtos WHERE idProduto = $idProduto"; //Seleciona os dados do Produto
                $res            = mysqli_query($conn, $buscarProduto); //Executa o comando SQL
                $totalProdutos  = mysqli_num_rows($res); //Retorna a quantidade de registros encontrados na QUERY executada

                if($totalProdutos > 0){
                    //Se houverem dados na linha da tabela, atribui o valor atual do array para uma variável
                    if($registro = mysqli_fetch_assoc($res)){
                        $idProduto          = $registro["idProduto"];
                        $fotoProduto        = $registro["fotoProduto"];
                        $nomeProduto        = $registro["nomeProduto"];
                        $descricaoProduto   = $registro["descricaoProduto"];
                        $valorProduto       = $registro["valorProduto"];

                        echo"
                        <h2>Editar Produto:</h2>
                        <div class='d-flex justify-content-center mb-3'>
                            <div class='row'>
                                <div class='col-12'>
                                    <form action='#actionEditarProduto.php' method='POST' class='was-validated' enctype='multipart/form-data'>
                                        <div class='form-floating mb-3 mt-3'>
                                            <input type='file' class='form-control' id='fotoProduto' name='fotoProduto' required>
                                            <label for='fotoProduto'>Foto</label>
                                            <div class='valid-feedback'></div>
                                            <div class='invalid-feedback'></div>
                                        </div>
                                        <div class='form-floating mb-3 mt-3'>
                                            <input type='text' class='form-control' id='nomeProduto' placeholder='Nome' name='nomeProduto' required>
                                            <label for='nomeProduto'>Nome do Produto</label>
                                            <div class='valid-feedback'></div>
                                            <div class='invalid-feedback'></div>
                                        </div>
                                        <div class='form-floating mb-3 mt-3'>
                                            <textarea class='form-control' id='descricaoProduto' placeholder='Informe uma breve descrição sobre o Produto' name='descricaoProduto' required></textarea>
                                            <label for='descricaoProduto'>Descrição do Produto</label>
                                            <div class='valid-feedback'></div>
                                            <div class='invalid-feedback'></div>
                                        </div>
                                        <div class='form-floating mt-3 mb-3'>
                                            <input type='text' class='form-control' id='valorProduto' placeholder='Valor do Produto' name='valorProduto' required>
                                            <label for='valorProduto'>Valor do Produto (R$):</label>
                                            <div class='valid-feedback'></div>
                                            <div class='invalid-feedback'></div>
                                        </div>
                                        <button type='submit' class='btn btn-success'>Cadastrar Produto</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        ";
                    }
                }
                else{ //Se não encontrar produtos com base no ID
                    echo "<div class='alert alert-warning text-center'>Nâo foi possível encontrar os dados do produto!</div>";
                }
                
            }
            else{ //Se não receber idProduto via GET
                echo "<div class='alert alert-warning text-center'>Não foi possível carregar os dados do produto!</div>";
            }
        ?>


    </div>

<?php include "footer.php" ?>
