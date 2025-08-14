<?php include "header.php" ?>

<div class='container mt-5 mb-5'>

    <?php

        //Inclui o arquivo de conexão com o Banco de Dados
        include "conexaoBD.php";

        //Variável PHP que recebe a Query para selecionar todos os campos da tabela Projetos
        $listarProjetos = "SELECT * FROM Projeto";

        //Verificar se há algum parâmetro chamado filtroProjeto sendo recebido por GET
        if(isset($_GET['filtroProjeto'])){
            //Se houver valor setado no GET chamado 'filtroProjeto', armazena na variável $
            $filtroProjeto = $_GET['filtroProjeto'];

            //Se o filtro for diferente de 'todos', concatena a filtragem
            if($filtroProjeto != 'todos'){
                $listarProjetos = $listarProjetos . " WHERE statusProjeto LIKE '$filtroProjeto' ";
            }

            switch($filtroProjeto){
                case "todos" : $mensagemFiltro = "no total";
                break;

                case "disponivel" : $mensagemFiltro = "disponíveis";
                break;

                case "esgotado" : $mensagemFiltro = "esgotados";
                break;
            }

        }
        else{
            $filtroProjeto = "todos";
            $mensagemFiltro = "no total";
        }

        $res            = mysqli_query($conn, $listarProjetos); //Recebe true OR false com base na execução
        $totalProjetos  = mysqli_num_rows($res); //Retorna a quantidade de registros encontrados

        if($totalProjetos > 0){
            if($totalProjetos == 1){
                //Se o total de Projetos for igual a um, exibe mensagem no singular
                echo "<div class='alert alert-info text-center'>Há <strong>$totalProjetos</strong> Projeto $mensagemFiltro cadastrado!</div>";
            }
            else{
                //Se o total de Projetos não for igual a um, exibe mensagem no plural
                echo "<div class='alert alert-info text-center'>Há <strong>$totalProjetos</strong> Projetos $mensagemFiltro cadastrados!</div>";
            }
        }
        else{
            echo "<div class='alert alert-info text-center'>Não há Projetos cadastrados no sistema!</div>";
        }

        echo "
            <form name='formFiltro' action='index.php' method='GET'>
                <div class='form-floating mt-3'>
                    <select class='form-select' name='filtroProjeto' required>
                        <option value='todos'"; if($filtroProjeto == 'todos'){echo "selected";} echo">Exibir todos os Projetos</option>
                        <option value='disponivel'"; if($filtroProjeto == 'disponivel'){echo "selected";} echo">Exibir apenas Projetos disponíveis</option>
                        <option value='esgotado'"; if($filtroProjeto == 'esgotado'){echo "selected";} echo">Exibir apenas Projetos esgotados</option>
                    </select>
                    <label for='filtroProjeto'>Selecione um Filtro</label>
                    <br>
                </div>
                <button type='submit' class='btn btn-outline-success' style='float:right'><i class='bi bi-funnel'></i> Filtrar Projetos</button>
                <br>
            </form>
        ";

    ?>

    <hr>

    <!-- Exibe a grid com os cards -->
    <div class="row">

        <?php
            //Loop para armazenar os registros da tabela em variáveis PHP
            while($registro = mysqli_fetch_assoc($res)){
                $idProjeto        = $registro['idProjeto'];
                $fotoProjeto      = $registro['fotoProjeto'];
                $nomeProjeto      = $registro['nomeProjeto'];
                $descricaoProjeto = $registro['descricaoProjeto'];
                $valorProjeto     = $registro['valorProjeto'];
                $statusProjeto    = $registro['statusProjeto'];

                echo "
                    <div class='col-sm-3'>

                        <div class='card' style='width:100%; height:100%'>

                            <div class='card-body' style='height:100%'>
                                <a href='visualizarProjeto.php?idProjeto=$idProjeto' style='text-decoration:none' title='Visualizar mais detalhes de $nomeProjeto'>
                                    <div class='position-relative'> ";
                                        if($statusProjeto == 'esgotado'){
                                            echo "
                                                <div class='position-absolute top-50 start-50 translate-middle bg-danger text-white px-4 py-2 fs-6 fw-bold rounded shadow' style='z-index: 10; opacity: 0.85;'>
                                                    ESGOTADO
                                                </div>
                                            ";
                                        }
                                        echo "
                                            <img class='card-img-top' src='$fotoProjeto' alt='Foto de $nomeProjeto' ";
                                                if($statusProjeto == 'esgotado'){
                                                    echo "style='filter:grayscale(100%)' ";
                                                }
                                            echo ">
                                    </div>
                                </a>
                            </div>

                            <div class='card-body text-center'>
                                <h4 class='card-title'>$nomeProjeto</h4>
                                <p class='card-text'>Valor: <strong>R$ $valorProjeto</strong>
                                <div class='d-grid' style='border-size:border-box'>
                                    <a class='btn btn-outline-success' href='visualizarProjeto.php?idProjeto=$idProjeto' style='text-decoration:none' title='Visualizar mais detalhes de $nomeProjeto'>
                                        <i class='bi bi-eye'></i> Visualizar Projeto
                                    </a>
                                </div>
                            </div>

                        </div> 

                    </div>

                ";
            }
        ?>

    </div>

</div>

<?php include "footer.php" ?>