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
        max-width: 500px;
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
    <h2 class="text-center">Cadastro de Empresa:</h2>
    <form action="actionEmpresa.php?pagina=formEmpresa" method="POST" class="was-validated" enctype="multipart/form-data">

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nome_empresa" placeholder="Nome" name="nome_empresa" required>
            <label for="nome_empresa">Nome da Empresa</label>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Por favor, insira o nome da empresa.</div>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="cnpj" placeholder="CNPJ" name="cnpj" required>
            <label for="cnpj">CNPJ</label>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Por favor, insira o CNPJ.</div>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="area_atuacao" placeholder="Área" name="area_atuacao" required>
            <label for="area_atuacao">Área de Atuação</label>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Por favor, insira a área de atuação.</div>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="localizacao" placeholder="Endereço" name="localizacao" required>
            <label for="localizacao">Endereço da Empresa</label>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Por favor, insira o endereço.</div>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="senhaEmpresa" placeholder="Senha" name="senhaEmpresa" required>
            <label for="senhaEmpresa">Senha</label>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Por favor, insira a senha.</div>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="confirmarSenhaEmpresa" placeholder="Confirme a Senha" name="confirmarSenhaEmpresa" required>
            <label for="confirmarSenhaEmpresa">Confirme a Senha</label>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Por favor, confirme a senha.</div>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
</div>

<?php include "footer.php" ?>
