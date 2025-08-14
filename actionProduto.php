<!-- Inclui o header.php -->
<?php include "header.php" ?>

    <div class="container mt-3 mb-3">

        <?php

            //Verifica o método de requisição do servidor
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //Bloco para declaração de variáveis
                $fotoProjeto = $nomeProjeto = $descricao = $carga_horaria = $vagas = $cnpj = "";

                //Variável booleana para controle de erros de preenchimento
                $erroPreenchimento = false;

                //Validação do campo nomeProjeto
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["nomeProjeto"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>NOME</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $nomeProjeto = filtrar_entrada($_POST["nomeProjeto"]);
                }

                //Validação do campo descricao
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["descricao"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>DESCRIÇÃO</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $descricao = filtrar_entrada($_POST["descricao"]);
                }

                //Validação do campo carga_horaria
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["carga_horaria"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>CARGA HORARIA</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $carga_horaria = filtrar_entrada($_POST["carga_horaria"]);
                }
                //Validação do campo cnpj
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["cnpj"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>CNPJ</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $carga_horaria = filtrar_entrada($_POST["carga_horaria"]);
                }

                //Validação do campo vagas
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["vagas"]) && $_POST["vagas"] !== "0"){ 
                    echo "<div class='alert alert-warning text-center'>O campo <strong>VAGAS</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                } else {
                    $vagas = intval($_POST["vagas"]);
                }

                //Início da validação da foto do produto
                $diretorio    = "img/"; //Define para qual diretório as imagens serão movidas
                $fotoProjeto  = $diretorio . basename($_FILES['fotoProjeto']['name']); //img/joaozinho.jpg
                $tipoDaImagem = strtolower(pathinfo($fotoProjeto, PATHINFO_EXTENSION)); //Pega o tipo do arquivo em letras minúsculas
                $erroUpload   = false; //Variável para controle do upload da foto

                //Verifica se o tamanho do arquivo é DIFERENTE DE ZERO
                if($_FILES['fotoProjeto']['size'] != 0){

                    //Verifica se o tamanho do arquivo é maior do que 5 MegaBytes (MB) - Medida em Bytes
                    if($_FILES['fotoProjeto']['size'] > 5000000){
                        echo "<div class='alert alert-warning text-center'>A <strong>FOTO</strong> deve ter tamanho máximo de 5MB!</div>";
                        $erroUpload = true;
                    }

                    //Verifica se a foto está nos formatos JPG, JPEG, PNG ou WEBP
                    if($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem != "png" && $tipoDaImagem != "webp"){
                        echo "<div class='alert alert-warning text-center'>A <strong>FOTO</strong> deve estar nos formatos JPG, JPEG, PNG ou WEBP</div>";
                        $erroUpload = true;
                    }

                    //Verifica se a imagem foi movida para o diretório IMG, utilizando a função move_uploaded_file
                    if(!move_uploaded_file($_FILES['fotoProjeto']['tmp_name'], $fotoProjeto)){
                        echo "<div class='alert alert-danger text-center'>Erro ao tentar mover a <strong>FOTO</strong> para o diretório $diretorio!</div>";
                        $erroUpload = true;
                    }

                }
                else{
                    echo "<div class='alert alert-warning text-center'>O campo <strong>FOTO</strong> é obrigatório!</div>";
                    $erroUpload = true;
                }

                //Se não houver erro de preenchimento, exibe alerta de sucesso e uma tabela com os dados informados
                if(!$erroPreenchimento && !$erroUpload){

                    //Cria uma variável para armazenar a QUERY para realizar a inserção dos dados do produto na tabela Projetos
                    $inserirProjeto = "INSERT INTO Projeto (fotoProjeto, nomeProjeto, descricao, carga_horaria, status_projeto, vagas, cnpj) VALUES ('$fotoProjeto', '$nomeProjeto', '$descricao', '$carga_horaria', 'disponivel', '$vagas', '$cnpj')";

                    //Inclui o arquivo de conexão com o Banco de Dados
                    include("conexaoBD.php");

                    //Se conseguir executar a query para inserção, exibe alerta de sucesso e a tabela com os dados informados
                    if(mysqli_query($conn, $inserirProjeto)){

                        echo "<div class='alert alert-success text-center'><strong>Produto</strong> cadastrado(a) com sucesso!</div>";
                        echo "
                            <div class='container mt-3'>
                                <div class='container mt-3 text-center'>
                                    <img src='$fotoProjeto' style='width:150px;' title='Foto de $nomeProjeto'>
                                </div>
                                <table class='table'>
                                    <tr>
                                        <th>NOME DO PROJETO</th>
                                        <td>$nomeProjeto</td>
                                    </tr>
                                    <tr>
                                        <th>DESCRIÇÃO DO PROJETO</th>
                                        <td>$descricao</td>
                                    </tr>
                                    <tr>
                                        <th>CARGA HORARIA</th>
                                        <td>$carga_horaria</td>
                                    </tr>
                                    <tr>
                                        <th>VAGAS</th>
                                        <td>$vagas</td>
                                    </tr>
                                    <tr>
                                        <th>STATUS DO PROJETO</th>
                                        <td>$status_projeto</td>
                                    </tr>
                                </table>
                            </div>
                        ";
                        mysqli_close($conn); //Essa função encerra a conexão com o Banco de Dados
                    }
                    else{
                        echo "<div class='alert alert-danger text-center'>Erro ao tentar cadastrar <strong>Produto</strong> no Banco de Dados $database!</div>" . mysqli_error($conn);
                    }
                }
            }
            else{
                //Redireciona o usuário para o formProjeto.php
                header("location:formProjeto.php");
            }

            //Função para filtrar entrada de dados
            function filtrar_entrada($dado){
                $dado = trim($dado); //Remove espaços desnecessários
                $dado = stripslashes($dado); //Remove barras invertidas
                $dado = htmlspecialchars($dado); // Converte caracteres especiais em entidades HTML

                //Retorna o dado após filtrado
                return($dado);
            }
        ?>

    </div>

<!-- Inclui o footer.php -->
<?php include "footer.php" ?>