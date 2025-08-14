<?php include "header.php" ?>

<div class="container text-center mb-3 mt-3">
    
    <h2>Cadastrar Produto:</h2>
    <div class="d-flex justify-content-center mb-3">
        <div class="row">
            <div class="col-12">
                <form action="actionProduto.php" method="POST" class="was-validated" enctype="multipart/form-data">
                    <div class="form-floating mb-3 mt-3">
                        <input type="file" class="form-control" id="fotoProjeto" name="fotoProjeto" required>
                        <label for="fotoProjeto">Foto</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="nomeProjeto" placeholder="Nome" name="nomeProjeto" required>
                        <label for="nomeProduto">Nome do Projeto</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <textarea class="form-control" id="descricaoProjeto" placeholder="Informe uma breve descrição sobre o Produto" name="descricaoProduto" required></textarea>
                        <label for="descricaoProduto">Descrição do Projeto</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="valorProduto" placeholder="Valor do Produto" name="valorProjeto" required>
                        <label for="valorProduto">Valor do Projeto (R$):</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <button type="submit" class="btn btn-success">Cadastrar Projeto</button>
                </form>
            </div>
        </div>
    </div>
    <br>

</div>

<?php include "footer.php" ?>