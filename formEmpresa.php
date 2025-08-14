<?php include "header.php" ?>

<div class="container text-center mb-3 mt-3">

    <h2>Cadastro de Empresa:</h2>
    <div class="d-flex justify-content-center mb-3">
        <div class="row">
            <div class="col-12">
                <form action="actionEmpresa.php?pagina=formEmpresa" method="POST" class="was-validated" enctype="multipart/form-data">

                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="nome_empresa" placeholder="Nome" name="nome_empresa" required>
                        <label for="nome_empresa">Nome da Empresa</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="cnpj" placeholder="CNPJ" name="cnpj" required>
                        <label for="cnpj">CNPJ</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
        
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="area_atuacao" placeholder="Área" name="area_atuacao" required>
                        <label for="area_atuacao">Área de Atuação</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="localizacao" placeholder="Endereço" name="localizacao" required>
                        <label for="localizacao">Endereço da Empresa</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="senhaEmpresa" placeholder="Senha" name="senhaEmpresa" required>
                        <label for="senhaEmpresa">Senha</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="confirmarSenhaEmpresa" placeholder="Confirme a Senha" name="confirmarSenhaEmpresa" required>
                        <label for="confirmarSenhaEmpresa">Confirme a Senha</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>
        </div>
        <br>
    </div>

</div>
                

<?php include "footer.php" ?>