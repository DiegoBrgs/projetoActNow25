    <?php

    session_start(); //função para inciar uma sessão
    include("conexaoBD.php");

    $cnpj = mysqli_real_escape_string($conn, $_POST["cnpj"]);
    $senhaEmpresa = mysqli_real_escape_string($conn, $_POST["senhaEmpresa"]);


    $buscarLogin ="SELECT *
                   FROM empresa
                    WHERE cnpj = '$cnpj'
                    AND senhaEmpresa = md5('$senhaEmpresa')
                    ";

    
    $efetuarLogin = mysqli_query($conn, $buscarLogin);
    
    if($registro = mysqli_fetch_assoc($efetuarLogin)){
        $quantidadeLogin = mysqli_num_rows($efetuarLogin);
  
        $cnpj = $registro["cnpj"];
        $nomeEmpresa = $registro["nome"];


        $_SESSION["cnpj"] = $cnpj;
        $_SESSION["nomeEmpresa"] = $nomeEmpresa;

        header("location:index.php"); //Funçao que rediereciona para uma determinada pagina


        //echo "<h1>Foram encontrados $quantidadeLogin com os dados informados!</h1>";

    }
    else{
        echo"<h1>Não existe login para os dados informados! </h1>";
        header("location:FormLogin.php?erroLogin='dadosInvalidos'");
    }
?>