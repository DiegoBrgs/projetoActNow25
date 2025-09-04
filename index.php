<?php include "header.php" ?>
  

<!--Header2 Index -->
<header class="py-5" style="background-color: #004aad">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6"  >
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-white mb-2">Trabalhe, Ajude, Coopere</h1>
                    <p class="lead fw-normal text-white-50 mb-4">Comece agora e adquira conhecimento e experiência para seu futuro!</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#listaProjetos">Começar Agora!</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="sobreNois.php">Sobre Nós</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="img/pexels-rdne-6646916.jpg" alt="..." /></div>
        </div>
    </div>
</header>

<div class='container mt-5 mb-5'>

    <?php

        //Inclui o arquivo de conexão com o Banco de Dados
        include "conexaoBD.php";

        //Variável PHP que recebe a Query para selecionar todos os campos da tabela Projetos e Empresa
        $listarProjetos = "SELECT 
            Projeto.id_projeto,
            Projeto.nomeProjeto,
            Projeto.vagas,
            Projeto.carga_horaria,
            Projeto.descricao,
            Projeto.status_projeto,
            Projeto.fotoProjeto,
            Projeto.Empresa_cnpj,
            
            Empresa.nome_empresa,
            Empresa.area_atuacao,
            Empresa.fotoEmpresa,
            Empresa.localizacao
        FROM 
            Projeto
        INNER JOIN 
            Empresa ON Projeto.Empresa_cnpj = Empresa.cnpj
        ";

        //Verificar se há algum parâmetro chamado filtroProjeto sendo recebido por GET
        if(isset($_GET['filtroProjeto'])){
            //Se houver valor setado no GET chamado 'filtroProjeto', armazena na variável $
            $filtroProjeto = $_GET['filtroProjeto'];

            //Se o filtro for diferente de 'todos', concatena a filtragem
            if($filtroProjeto != 'todos'){
                $listarProjetos = $listarProjetos . " WHERE Projeto.status_projeto LIKE '$filtroProjeto' ";
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

        


        //Texto sobre os projetos
        echo"<div class='row gx-5 justify-content-center'>
                <div class='col-lg-8 col-xl-6'>
                    <div class='text-center'>
                        <h2 class='fw-bolder'>Projetos</h2>
                        <p class='lead fw-normal text-muted mb-5'>Aqui estão listados todos os projetos cadastrados no sistema</p>
                    </div>
                </div>
            </div>
            
            <hr>
        ";        


        //Pesquisa e filtro
        if($totalProjetos > 0){
            if($totalProjetos == 1){
                //Se o total de Projetos for igual a um, exibe mensagem no singular
                echo "<div class='alert alert-info text-center'>Há <strong>$totalProjetos</strong> Projetos $mensagemFiltro cadastrado!</div>";
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
            <form name='formFiltro' action='index.php#listaProjetos' method='GET'>
                <div class='form-floating mt-3'>
                    <select class='form-select' name='filtroProjeto' required>
                        <option value='todos'"; if($filtroProjeto == 'todos'){echo "selected";} echo">Exibir todos os Projetos</option>
                        <option value='disponivel'"; if($filtroProjeto == 'disponivel'){echo "selected";} echo">Exibir apenas Projetos disponíveis</option>
                        <option value='esgotado'"; if($filtroProjeto == 'esgotado'){echo "selected";} echo">Exibir apenas Projetos esgotados</option>
                    </select>
                    <label for='filtroProjeto'>Selecione um Filtro</label>
                    <br>
                </div>
                <button type='submit' class='btn btn-outline-primary' style='float:right'><i class='bi bi-funnel'></i> Filtrar Projetos</button>
                <br>
            </form>
        ";

    ?>


    <!-- Exibe a grid com os cards -->
    <div id="listaProjetos" class="row">

        <?php
            //Loop para armazenar os registros da tabela em variáveis PHP
            while($registro = mysqli_fetch_assoc($res)){
                $id_projeto          = $registro['id_projeto'];
                $nomeProjeto         = $registro['nomeProjeto'];
                $vagas               = $registro['vagas'];
                $cargaHoraria        = $registro['carga_horaria'];
                $descricao           = $registro['descricao'];
                $statusProjeto       = $registro['status_projeto'];
                $cnpj                = $registro['Empresa_cnpj'];
                $fotoProjeto         = $registro['fotoProjeto'];
                $nome_empresa        = $registro['nome_empresa'];
                $area_atuacao        = $registro['area_atuacao'];
                $fotoEmpresa         = $registro['fotoEmpresa'];


                echo "
                        <div class='col-sm-3 mb-3'>
                                <div class='card h-100 shadow border-0'>

                                    <div class='card-body' style='height:100%'>
                                        <a href='visualizarProjeto.php?id_projeto=$id_projeto' style='text-decoration:none' title='Visualizar mais detalhes de $nomeProjeto'>
                                            <div class='position-relative'> ";
                                                if($statusProjeto == 'esgotado'){
                                                    echo "
                                                        <div class='position-absolute top-50 start-50 translate-middle bg-danger text-white px-4 py-2 fs-6 fw-bold rounded shadow' style='z-index: 10; opacity: 0.85;'>
                                                            ESGOTADO
                                                        </div>
                                                    ";
                                                }
                                                echo "
                                                    <img class='card-img-top w-100' style='height: 350px; object-fit: cover;' src='$fotoProjeto' alt='Foto de $nomeProjeto' ";
                                                        if($statusProjeto == 'esgotado'){
                                                            echo "style='filter: grayscale(100%)' ";
                                                        }
                                                    echo ">
                                            </div>
                                        </a>
                                    </div>

                                    <div class='card-body p-4'>
                                        <div class='badge bg-primary bg-gradient rounded-pill mb-2'>$statusProjeto</div>
                                        <a class='text-decoration-none link-dark stretched-link' href='visualizarProjeto.php?id_projeto=$id_projeto'><h5 class='card-title mb-3'>$nomeProjeto</h5></a>
                                        <p class='card-text mb-0'>$descricao</p>
                                    </div>
                                    <div class='card-footer p-4 pt-0 bg-transparent border-top-0'>
                                        <div class='d-flex align-items-end justify-content-between'>
                                            <div class='d-flex align-items-center'>
                                                <img class='rounded-circle me-3 img-fluid w-25' src='$fotoEmpresa' alt='Foto da $nome_empresa' />
                                                <div class='small'>
                                                    <div class='fw-bold'>$nome_empresa</div>
                                                    <div class='text-muted'>$area_atuacao <br>Número de Vagas: <b>$vagas</b></div>
                                                </div>
                                            </div>
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