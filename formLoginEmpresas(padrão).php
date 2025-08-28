<?php include "header.php" ?>

<div class="container text-center mb-3 mt-3">

    <h2>Acessar o Sistema:</h2>
    <div class="d-flex justify-content-center mb-3">
        <div class="row">
            <div class="col-12">
                <form action="actionLoginEmpresa.php" method="POST" class="was-validated">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="cnpj" placeholder="CNPJ" name="cnpj" required>
                        <label for="cnpj">CNPJ</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="senhaEmpresa" placeholder="Senha" name="senhaEmpresa" required>
                        <label for="senhaEmpresa">Senha</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <button type="submit" class="btn btn-success " style="background-color: #004aad">Login</button>
                   
                </form>
            </div>
        </div>
    </div>


</div>

<?php include "footer.php" ?>