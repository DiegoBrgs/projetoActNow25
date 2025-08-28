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

    .form-control {
        border-radius: 8px;
    }

    .btn-custom {
        background-color: #004aad;
        color: white;
        font-weight: bold;
        border-radius: 8px;
    }

    .btn-custom:hover {
        background-color: #003580;
    }
</style>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card card-custom">
                <div class="row g-0">
                    
                    <!-- Coluna da Imagem -->
                    <div class="col-md-6 d-none d-md-block">
                        <img src="img/volucadastro.jpg" alt="Imagem Cadastro" class="w-100 h-100">
                    </div>

                    <!-- Coluna do Formulário -->
                    <div class="col-md-6">
                        <div class="p-4">
                            <h2 class="text-center mb-4" style="color:#004aad;">Cadastro de Usuário</h2>

                            <form action="actionUsuario.php?pagina=formUsuario" method="POST" class="was-validated" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label for="fotoUsuario" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="fotoUsuario" name="fotoUsuario" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nomeUsuario" class="form-label">Nome Completo</label>
                                    <input type="text" class="form-control" id="nomeUsuario" name="nomeUsuario" required>
                                </div>

                                <div class="mb-3">
                                    <label for="cpfUsuario" class="form-label">CPF</label>
                                    <input type="text" class="form-control" id="cpfUsuario" name="cpfUsuario" required>
                                </div>

                                <div class="mb-3">
                                    <label for="emailUsuario" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="emailUsuario" name="emailUsuario" required>
                                </div>

                                <div class="mb-3">
                                    <label for="descUsuario" class="form-label">Fale mais sobre você</label>
                                    <textarea class="form-control" id="descUsuario" name="descUsuario" rows="3" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="senhaUsuario" class="form-label">Senha</label>
                                    <input type="password" class="form-control" id="senhaUsuario" name="senhaUsuario" required>
                                </div>

                                <div class="mb-4">
                                    <label for="confirmarSenhaUsuario" class="form-label">Confirme a Senha</label>
                                    <input type="password" class="form-control" id="confirmarSenhaUsuario" name="confirmarSenhaUsuario" required>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-custom btn-lg">Cadastrar</button>
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
