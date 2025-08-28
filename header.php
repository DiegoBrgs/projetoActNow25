<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema INF3</title>
        
        <!-- CDNs (Content Delivery Network) do Bootstrap 5 -->
        <!-- Última versão compilada e minimizada do CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Última versão compilada de JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- CDNs para Máscaras JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <!-- CDN para Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

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
        
        <!-- Container para abrigar o Logotipo -->
        <div class="container-fluid text-center">
            <a href="index.php" title="Retornar para a página inicial">
                <img src="img/ActNow.png" style="width:220px;">
            </a>
        </div>

        <!-- Barra de Navegação do Sistema -->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004aad">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.php"><i class="bi bi-house"></i> Início</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="formLogin.php">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="formUsuario.php">Cadastrar </a></li>
                            <li class="nav-item"><a class="nav-link" href="formProjeto.php">Produto </a></li>
                            <!-- 
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="blog-home.html">Blog Home</a></li>
                                    <li><a class="dropdown-item" href="blog-post.html">Blog Post</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Portfolio</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                    <li><a class="dropdown-item" href="portfolio-overview.html">Portfolio Overview</a></li>
                                    <li><a class="dropdown-item" href="portfolio-item.html">Portfolio Item</a></li>
                                </ul>
                            </li>
                            -->
                        </ul>
                    </div>
                </div>
            </nav>

        <!-- Início do Container para abrigar os conteúdos das páginas do sistema -->