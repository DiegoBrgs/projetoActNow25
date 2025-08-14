<?php include "header.php" ?>

<div class="container text-center mb-3 mt-3">
    
    <h2>Cadastrar Produto:</h2>
    <div class="d-flex justify-content-center mb-3">
        <div class="row">
            <div class="col-12">
                <form action="actionProjeto.php" method="POST" class="was-validated" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" id="cnpj" placeholder="Nome" name="cnpj" required>
                        <label for="cnpj">CNPJ da Empresa</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="vagas" placeholder="Vagas" name="vagas" required>
                        <label for="vagas">Vagas disponíveis</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="carga_horaria" placeholder="carga_horaria" name="carga_horaria" required>
                        <label for="carga_horaria">Carga horária</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    
                    <div class="form-floating mb-3 mt-3">
                        <textarea class="form-control" id="descricao" placeholder="Informe uma breve descrição sobre o Produto" name="descricao" required></textarea>
                        <label for="descricao">Descrição do Projeto</label>
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