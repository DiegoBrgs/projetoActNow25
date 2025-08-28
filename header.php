<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema INF3</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JQuery e máscaras -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet" />

            <!-- Script JQuery para a máscara do telefone -->
        <script>
            $(document).ready(function(){
                $("#telefoneUsuario").mask("(00) 00000-0000");
                $("#cnpj").mask("00.000.000/0000-00");
                $("#cpfUsuario").mask("000.000.000-00");
                //$("#cepUsuario").mask("00000-000");
                //$("#cpfUsuario").mask("000.000.000-00");
            });
        </script>
</head>

<body>

<!-- Logo -->
<div class="container-fluid text-center my-3">
    <a href="index.php" title="Página inicial">
        <img src="img/ActNow.png" style="width:220px;" alt="Logo do Sistema" />
    </a>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004aad;">
    <div class="container px-5">
        <a class="navbar-brand" href="index.php"><i class="bi bi-house"></i> Início</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <?php if (isset($_SESSION["emailUsuario"])): ?>
                    <?php 
                        include "conexaoBD.php";

                        // Verifica se usuário está logado
                        if (!isset($_SESSION['emailUsuario'])) {
                            header("Location: formLogin.php");
                            exit();
                        }

                        $email = $_SESSION['emailUsuario'];

                        // Busca dados do usuário
                        $query = "SELECT nomeUsuario, emailUsuario, cpfUsuario, descUsuario, fotoUsuario FROM usuarios WHERE emailUsuario = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($usuario = $result->fetch_assoc()) {
                            // Dados carregados com sucesso
                        } else {
                            echo "<div class='alert alert-danger text-center'>Usuário não encontrado.</div>";
                            exit();
                        }

                        $stmt->close();
                        $conn->close();
                    ?>
                    <!-- Usuário logado -->
                    <li class="nav-item"><a class="nav-link" href="formLoginEmpresas.php">Empresas</a></li>
                    <li class="nav-item"><a class="nav-link" href="formProjeto.php">Projeto</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Sair</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="perfilUsuario.php">
                            <img class="rounded-circle img-fluid" style='width: 30px ' src="<?php echo htmlspecialchars($usuario['fotoUsuario']); ?>"></img>
                        </a>


                <?php else: ?>
                    <!-- Usuário não logado -->
                    <li class="nav-item"><a class="nav-link" href="formLogin.php">Login</a></li> <br>
                    <li class="nav-item"><a class="nav-link" href="formUsuario.php">Cadastrar</a></li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

