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
        max-width: 450px;
        margin: 40px auto;
        padding: 30px;
        background: #fff;
    }

    .form-control, textarea {
        border-radius: 8px;
    }

    button.btn-custom, button.btn-success {
        background-color: #004aad;
        color: white;
        font-weight: bold;
        border-radius: 8px;
        padding: 10px 0;
        border: none;
        width: 100%;
    }

    button.btn-custom:hover, button.btn-success:hover {
        background-color: #003580;
    }

    h2 {
        color: #004aad;
        margin-bottom: 25px;
        font-weight: 700;
    }
</style>

<div class="card card-custom">
    <h2 class="text-center">Acessar o Sistema:</h2>
    <form action="actionLoginEmpresa.php" method="POST" class="was-validated">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="cnpj" placeholder="CNPJ" name="cnpj" required>
            <label for="cnpj">CNPJ</label>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Por favor, informe o CNPJ.</div>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="senhaEmpresa" placeholder="Senha" name="senhaEmpresa" required>
            <label for="senhaEmpresa">Senha</label>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Por favor, informe a senha.</div>
        </div>
        <button type="submit" class="btn btn-success">Login</button>
    </form>
</div>

<?php include "footer.php" ?>
