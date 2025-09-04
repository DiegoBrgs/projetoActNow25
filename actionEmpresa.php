<!-- Inclui o header.php -->
<?php include "header.php" ?>

    <div class="container mt-3 mb-3">

        <?php
            

            //Verifica o método de requisição do servidor
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //Bloco para declaração de variáveis
                $fotoEmpresa = $nome_empresa = $area_atuacao = $senhaEmpresa = $confirmarSenhaEmpresa = $cnpj = $localizacao = "";

                //Variável booleana para controle de erros de preenchimento 
                $erroPreenchimento = false;

                  //Validação do campo nome_empresa
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["cnpj"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>CNPJ</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $cnpj = filtrar_entrada($_POST["cnpj"]);
                }

                //Validação do campo nome_empresa
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["nome_empresa"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>NOME</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $nome_empresa = filtrar_entrada($_POST["nome_empresa"]);
                    
                    //Utiliza a função preg_match() para verificar se há apenas letras no nome
                    if(!preg_match('/^[\p{L} ]+$/u', $nome_empresa)){
                        echo "<div class='alert alert-warning text-center'>O campo <strong>NOME</strong> deve conter apenas letras!</div>";
                        $erroPreenchimento = true;
                    }

                }
                //Validação do campo localizacao
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["localizacao"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>Endereço</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $localizacao = filtrar_entrada($_POST["localizacao"]);
                }

                //Validação do campo area_atuacao
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["area_atuacao"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>EMAIL</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $area_atuacao = filtrar_entrada($_POST["area_atuacao"]);
                }

                //Validação do campo senhaEmpresa
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["senhaEmpresa"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>SENHA</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $senhaEmpresa = md5(filtrar_entrada($_POST["senhaEmpresa"]));
                }

                //Validação do campo confirmarSenhaEmpresa
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["confirmarSenhaEmpresa"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>CONFIRMAR SENHA</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $confirmarSenhaEmpresa = md5(filtrar_entrada($_POST["confirmarSenhaEmpresa"]));
                    //Compara se as senhas são diferentes
                    if($senhaEmpresa != $confirmarSenhaEmpresa){
                        echo "<div class='alert alert-warning text-center'>As <strong>SENHAS</strong> informadas são diferentes!</div>";
                        $erroPreenchimento = true;
                    }
                }
                //Início da validação da foto do produto
                $diretorio    = "img/"; //Define para qual diretório as imagens serão movidas
                $fotoEmpresa  = $diretorio . basename($_FILES['fotoEmpresa']['name']); //img/joaozinho.jpg
                $tipoDaImagem = strtolower(pathinfo($fotoEmpresa, PATHINFO_EXTENSION)); //Pega o tipo do arquivo em letras minúsculas
                $erroUpload   = false; //Variável para controle do upload da foto

                //Verifica se o tamanho do arquivo é DIFERENTE DE ZERO
                if($_FILES['fotoEmpresa']['size'] != 0){

                    //Verifica se o tamanho do arquivo é maior do que 5 MegaBytes (MB) - Medida em Bytes
                    if($_FILES['fotoEmpresa']['size'] > 5000000){
                        echo "<div class='alert alert-warning text-center'>A <strong>FOTO</strong> deve ter tamanho máximo de 5MB!</div>";
                        $erroUpload = true;
                    }

                    //Verifica se a foto está nos formatos JPG, JPEG, PNG ou WEBP
                    if($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem != "png" && $tipoDaImagem != "webp"){
                        echo "<div class='alert alert-warning text-center'>A <strong>FOTO</strong> deve estar nos formatos JPG, JPEG, PNG ou WEBP</div>";
                        $erroUpload = true;
                    }

                    //Verifica se a imagem foi movida para o diretório IMG, utilizando a função move_uploaded_file
                    if(!move_uploaded_file($_FILES['fotoEmpresa']['tmp_name'], $fotoEmpresa)){
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

                    //Cria uma variável para armazenar a QUERY para realizar a inserção dos dados do Usuário na tabela Usuarios
                    $inserirEmpresa = "INSERT INTO Empresa (fotoEmpresa, nome_empresa, localizacao, senhaEmpresa, cnpj, area_atuacao) VALUES ('$fotoEmpresa', '$nome_empresa', '$localizacao', '$senhaEmpresa', '$cnpj', '$area_atuacao')";

                    //Inclui o arquivo de conexão com o Banco de Dados
                    include("conexaoBD.php");

                    //Se conseguir executar a query para inserção, exibe alerta de sucesso e a tabela com os dados informados
                    if(mysqli_query($conn, $inserirEmpresa)){

                        echo "<div class='alert alert-success text-center'><strong>Empresa</strong> cadastrado(a) com sucesso!</div>";
                        echo "
                            <div class='container mt-3'>
                                <div class='container mt-3 text-center'>
                                    <img src='$fotoEmpresa' style='width:150px;' title='Foto de $nome_empresa'>
                                </div>
                                <table class='table'>
                                    <tr>
                                        <th>NOME DA EMPRESA</th>
                                        <td>$nome_empresa</td>
                                    </tr>
                                    <tr>
                                        <th>ÁREA DE ATUAÇÃO</th>
                                        <td>$area_atuacao</td>
                                    </tr>
                                    <tr>
                                        <th>CNPJ</th>
                                        <td>$cnpj</td>
                                    </tr>
                                    <tr>
                                        <th>ENDEREÇO</th>
                                        <td>$localizacao</td>
                                    </tr>
                                </table>
                            </div>
                        ";
                        mysqli_close($conn); //Essa função encerra a conexão com o Banco de Dados
                    }
                    else{
                        echo "<div class='alert alert-danger text-center'>Erro ao tentar cadastrar <strong>Usuário</strong> no Banco de Dados $database!</div>" . mysqli_error($conn);
                    }
                }
            }
            else{
                //Redireciona o usuário para o formUsuario.php
                header("location:formUsuario.php");
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