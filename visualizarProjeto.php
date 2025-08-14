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
                        $cnpj    = $registro['cnpj'];
                        $fotoProjeto    = $registro['fotoProjeto'];

                        ?>

                        <div class="d-flex justify-content-center mb-3">

                            <div class="card" style="width:30%; border-style:none;">
                                            
                                <!-- Carousel -->
                                <div id="Projeto" class="carousel slide" data-bs-ride="carousel" >

                                    <!-- Indicators/dots -->
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#Projeto" data-bs-slide-to="0" class="active"></button>
                                        <button type="button" data-bs-target="#Projeto" data-bs-slide-to="1"></button>
                                        <button type="button" data-bs-target="#Projeto" data-bs-slide-to="2"></button>
                                    </div>

                                    <!-- The slideshow/carousel -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class='position-relative'>
                                                <?php
                                                    if($status_projeto == 'esgotado'){
                                                        echo "
                                                            <div class='position-absolute top-50 start-50 translate-middle bg-danger text-white px-4 py-2 fs-6 fw-bold rounded shadow' style='z-index: 10; opacity: 0.85;'>
                                                                ESGOTADO
                                                            </div>
                                                        ";
                                                    }
                                                    echo "
                                                        <img class='d-block w-100' src='$fotoProjeto' alt='Foto de $nomeProjeto' ";
                                                            if($status_projeto == 'esgotado'){
                                                                echo "style='filter:grayscale(100%)' ";
                                                            }
                                                        echo ">";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class='position-relative'>
                                                <?php
                                                    if($status_projeto == 'esgotado'){
                                                        echo "
                                                            <div class='position-absolute top-50 start-50 translate-middle bg-danger text-white px-4 py-2 fs-6 fw-bold rounded shadow' style='z-index: 10; opacity: 0.85;'>
                                                                ESGOTADO
                                                            </div>
                                                        ";
                                                    }
                                                    echo "
                                                        <img class='d-block w-100' src='$fotoProjeto' alt='Foto de $nomeProjeto' ";
                                                            if($status_projeto == 'esgotado'){
                                                                echo "style='filter:grayscale(100%)' ";
                                                            }
                                                        echo ">";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class='position-relative'>
                                                <?php
                                                    if($status_projeto == 'esgotado'){
                                                        echo "
                                                            <div class='position-absolute top-50 start-50 translate-middle bg-danger text-white px-4 py-2 fs-6 fw-bold rounded shadow' style='z-index: 10; opacity: 0.85;'>
                                                                ESGOTADO
                                                            </div>
                                                        ";
                                                    }
                                                    echo "
                                                        <img class='d-block w-100' src='$fotoProjeto' alt='Foto de $nomeProjeto' ";
                                                            if($status_projeto == 'esgotado'){
                                                                echo "style='filter:grayscale(100%)' ";
                                                            }
                                                        echo ">";
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Left and right controls/icons -->
                                    <button class="carousel-control-prev" type="button" data-bs-target="#Projeto" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#Projeto" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>
                                </div>
                                
                                <div class="card-body">
                                    <h4 class="card-title"><b><?php echo $nomeProjeto ?></b></h4>
                                    <p class="card-text">Vagas: <b> <?php echo $vagas ?></b></p>
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <?php
                                                if($status_projeto != 'esgotado'){
                                                    echo "
                                                        <a href='#' title='Ingressar'>
                                                            <button class='btn btn-outline-success'>
                                                                <i class='bi bi-pin-angle' style='font-size:10pt;'></i>
                                                                Ingressar em $nomeProjeto
                                                            </button>
                                                        </a>
                                                    ";
                                                }
                                                else{
                                                    echo "
                                                        <div class='alert alert-secondary'>
                                                            Projeto Esgotado! <i class='bi bi-emoji-frown'></i>
                                                        </div>
                                                    ";
                                                }
                                                echo "<br><br>
                                                <b>$descricao</b>"
                                            ?>
                                        </div>
                                        <br>
                                    </div>
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