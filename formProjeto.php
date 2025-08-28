<?php include "header.php" ?>

<style>
    body {
        background: #ffffffff;
    }

    .card-custom {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        overflow: hidden;
    }

    .card-custom img {
        object-fit: cover;
        height: 100%;
    }

    .form-control, textarea {
        border-radius: 8px;
    }

    .btn-custom {
        background-color: #004aad;
        color: white;
        font-weight: bold;
        border-radius: 8px;
        padding: 10px 0;
    }

    .btn-custom:hover {
        background-color: #003580;
    }

    /* Estilo do rodapé */
    footer.volunteer-footer {
        background-color: #004aad;
        color: #f4f6f9;
        padding: 20px 0;
        text-align: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 1rem;
    }

    footer.volunteer-footer a {
        color: #ffd966;
        text-decoration: none;
        font-weight: bold;
    }

    footer.volunteer-footer a:hover {
        text-decoration: underline;
    }
</style>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card card-custom">
                <div class="row g-0">

                    <!-- Coluna da Imagem -->
                    <div class="col-md-6 d-none d-md-block">
                        <img src="img/empresacadastro.png" alt="Projeto" class="w-100 h-100" />
                    </div>

                    <!-- Coluna do Formulário -->
                    <div class="col-md-6">
                        <div class="p-4">
                            <h2 class="text-center mb-4" style="color:#004aad;">Cadastrar Projeto</h2>

                            <form action="actionProjeto.php" method="POST" class="was-validated" enctype="multipart/form-data">

                                <div class="mb-3 form-floating">
                                    <input type="file" class="form-control" id="fotoProjeto" name="fotoProjeto" required>
                                    <label for="fotoProjeto">Foto</label>
                                </div>

                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="nomeProjeto" name="nomeProjeto" placeholder="Nome do Projeto" required>
                                    <label for="nomeProjeto">Nome do Projeto</label>
                                </div>

                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ da Empresa" required>
                                    <label for="cnpj">CNPJ da Empresa</label>
                                </div>

                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="vagas" name="vagas" placeholder="Vagas disponíveis" required>
                                    <label for="vagas">Vagas disponíveis</label>
                                </div>

                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="carga_horaria" name="carga_horaria" placeholder="Carga horária" required>
                                    <label for="carga_horaria">Carga horária</label>
                                </div>

                                <div class="mb-3 form-floating">
                                    <textarea class="form-control" id="descricao" name="descricao" placeholder="Informe uma breve descrição sobre o Produto" style="height: 100px;" required></textarea>
                                    <label for="descricao">Descrição do Projeto</label>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-custom btn-lg">Cadastrar Projeto</button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>
