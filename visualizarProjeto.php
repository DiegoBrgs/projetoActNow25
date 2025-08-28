<?php include "header.php" ?>

<div class="container text-center mt-5 mb-5">

    <div class="row text-center">

        <?php

            //Verifica se há recebimento de parâmetro via método GET
            if(isset($_GET['id_projeto'])){
                $id_projeto = $_GET['id_projeto'];

                //Inclui o arquivo de conexão com o Banco de Dados
                include "conexaoBD.php";


                $exibirProjeto = "SELECT 
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
                WHERE
                id_projeto = $id_projeto
                ";
                $res           = mysqli_query($conn, $exibirProjeto); //Executa a QUERY
                $totalProjeto = mysqli_num_rows($res); //Retorna a quantidade de registros

                if($totalProjeto > 0){
                    if($registro = mysqli_fetch_assoc($res)){
                        $id_projeto     = $registro['id_projeto'];
                        $nomeProjeto    = $registro['nomeProjeto'];
                        $vagas          = $registro['vagas'];
                        $carga_horaria  = $registro['carga_horaria'];
                        $descricao      = $registro['descricao'];
                        $status_projeto = $registro['status_projeto'];
                        $Empresa_cnpj   = $registro['Empresa_cnpj'];
                        $fotoProjeto    = $registro['fotoProjeto'];

                        $nome_empresa   = $registro['nome_empresa'];
                        $area_atuacao   = $registro['area_atuacao'];
                        $fotoEmpresa    = $registro['fotoEmpresa'];

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
                                 
                                <div class="col-md-6  p-3 d-flex flex-column justify-content-around shadow-sm">
                                    <div class>
                                        <?php
                                            echo"   
                                            <div class='d-flex  align-items-center '>
                                                    <img class='rounded-circle me-5 img-fluid w-25' src='$fotoEmpresa' alt='Foto da $nome_empresa' />
                                                <div class='small'>
                                                    <div class='fw-bold'>$nome_empresa</div>
                                                    <div class='text-muted'>$area_atuacao <br></div>
                                                </div>
                                            </div><hr>
                                            ";
                                        ?>
                                    </div>
                                    <div class="align-items-start">

                                        <h5 class="card-title"><b><?php echo $nomeProjeto ?></b></h5>
                                        <p class="card-text mb-9">Vagas: <b><?php echo $vagas ?></b></p>
                                        <p class='small'><b><?php echo $descricao ?></b></p>
                                    </div><br><br><br><br><br><br><br><br><br>
                                    
                                
                                    <?php



                                    echo"<hr><div class='align-items-end'>";
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

                                    echo"</div>";
                                   
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