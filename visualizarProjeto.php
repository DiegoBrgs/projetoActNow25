<?php include "header.php" ?>

<div class="container text-center mt-5 mb-5">

    <div class="row text-center">

        <?php

            //Verifica se há recebimento de parâmetro via método GET
            if(isset($_GET['id_projeto'])){
                $id_projeto = $_GET['id_projeto'];

                //Inclui o arquivo de conexão com o Banco de Dados
                include "conexaoBD.php";

                $exibirProjeto = "SELECT * FROM Projeto WHERE id_projeto = $id_projeto";
                $res           = mysqli_query($conn, $exibirProjeto); //Executa a QUERY
                $totalProjeto = mysqli_num_rows($res); //Retorna a quantidade de registros

                if($totalProjeto > 0){
                    if($registro = mysqli_fetch_assoc($res)){
                        $id_projeto        = $registro['id_projeto'];
                        $nomeProjeto      = $registro['nomeProjeto'];
                        $vagas      = $registro['vagas'];
                        $carga_horaria = $registro['carga_horaria'];
                        $descricao     = $registro['descricao'];
                        $status_projeto    = $registro['status_projeto'];
                        $Empresa_cnpj    = $registro['Empresa_cnpj'];
                        $fotoProjeto    = $registro['fotoProjeto'];

                        ?>

                        <div class="container my-4">
                            <div class="row mx-auto shadow rounded overflow-hidden" style="max-width: 900px;">
                                <!-- Coluna do carrossel -->
                                <div class="col-md-6 p-0">
                                    <div id="Projeto<?php echo $id_projeto ?>" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php
                                            for ($i = 0; $i < 3; $i++) {
                                                $active = $i === 0 ? "active" : "";
                                                echo "
                                                <div class='carousel-item $active'>
                                                    <div class='position-relative'>
                                                ";
                                                if ($status_projeto == 'esgotado') {
                                                    echo "
                                                        <div class='position-absolute top-50 start-50 translate-middle bg-danger text-white px-3 py-1 fs-6 fw-bold rounded shadow' style='z-index: 10; opacity: 0.85;'>
                                                            ESGOTADO
                                                        </div>
                                                    ";
                                                }
                                                echo "
                                                        <img class='d-block w-100 project-img' src='$fotoProjeto' alt='Foto de $nomeProjeto'";
                                                if ($status_projeto == 'esgotado') {
                                                    echo " style='filter: grayscale(100%)'";
                                                }
                                                echo ">
                                                    </div>
                                                </div>";
                                            }
                                            ?>
                                        </div>

                                        <!-- Controles -->
                                        <button class="carousel-control-prev" type="button" data-bs-target="#Projeto<?php echo $id_projeto ?>" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#Projeto<?php echo $id_projeto ?>" data-bs-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Coluna das informações -->
                                <div class="col-md-6 bg-light p-3 d-flex flex-column justify-content-center shadow-sm">
                                    <h5 class="card-title"><b><?php echo $nomeProjeto ?></b></h5>
                                    <p class="card-text mb-9">Vagas: <b><?php echo $vagas ?></b></p>

                                        
                                    <div class='align-items-center'>
                                            <img class='rounded-circle me-3 img-fluid w-35' src='$fotoEmpresa' alt='Foto da $nome_empresa' />
                                                
                                    </div>
                                    <div class='small'>
                                                <div class='fw-bold'>$nome_empresa</div>
                                                <div class='text-muted'>$area_atuacao <br>Número de Vagas: <b>$vagas</b></div>
                                            </div>
                                    <br><br><br><br>
                                    

                                    <?php
                                    if ($status_projeto != 'esgotado') {
                                        echo "
                                            <a href='#' title='Ingressar' class='mb-2'>
                                                <button class='btn btn-outline-success btn-sm'>
                                                    <i class='bi bi-pin-angle' style='font-size:10pt;'></i>
                                                    Ingressar em $nomeProjeto
                                                </button>
                                            </a>
                                        ";
                                    } else {
                                        echo "
                                            <div class='alert alert-secondary py-1 px-2'>
                                                Projeto Esgotado! <i class='bi bi-emoji-frown'></i>
                                            </div>
                                        ";
                                    }

                                    echo "<hr><p class='small'><b>$descricao</b></p>";
                                    ?>
                                </div>
                            </div>
                        </div>


                    <?php

                    }
                }
                else{
                    echo "<div class='alert alert-warning text-center'>Projeto não localizado!</div>";
                }

            }
            else{
                echo "<div class='alert alert-warning text-center'>Não foi possível carregar o Projeto!</div>";
            }

        ?>

        

    </div>

</div>

<?php include "footer.php" ?>