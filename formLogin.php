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
                        <img src="img/iconvolu.png" alt="Imagem Login" class="w-100 h-100">
                    </div>

                    <!-- Coluna do Formulário -->
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="p-4 w-100">
                            <div class="text-center mb-4">
                                <img src="img/ActNow.png" style="width: 25%;" alt="Logo">
                                <h2 class="mt-3" style="color:#004aad;">Login do Usuário</h2>
                                <p class="text-muted">Faça login em sua conta!</p>
                            </div>

                            <form action="actionLogin.php" method="POST" class="was-validated">

                                <div class="mb-3">
                                    <label for="emailUsuario" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="emailUsuario" name="emailUsuario" required>
                                </div>

                                <div class="mb-4">
                                    <label for="senhaUsuario" class="form-label">Senha</label>
                                    <input type="password" class="form-control" id="senhaUsuario" name="senhaUsuario" required>
                                </div>

                                <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-custom btn-lg">Login</button>
                                </div>

                                <div class="text-center">
                                    <a class="small text-muted d-block mb-2" href="#">Esqueceu a senha?</a>
                                    <p class="mb-1">Não possui uma conta? <a href="formUsuario.php" style="color:#004aad;">Cadastre-se</a></p>
                                    <p>É uma empresa? <a href="formEmpresa.php" style="color:#004aad;">Criar conta empresarial</a></p>
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
