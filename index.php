

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--        CSS-->
        <link rel="stylesheet" href="../SISDO/css/bootstrap.min.css">
        <link rel="stylesheet" href="../SISDO/css/main.css">

        <!--        JAVA SCRIPT-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </head>
    <body class="fundo-base">
        <!--        NAVEBAR SUPERIOR -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">SISDO - Sistema de Documento Oficiais</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#">Login</a></li>
                        <li ><a href="#">Sobre</a></li>
                        <li ><a href="#">Contato</a></li>
                        <li ><a href="#">Suporte</a></li>
                        <li ><a href="logout.php">Sair</a></li>

                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <!--        FORMULÁRIO DE LOGIN-->
        <div class=" col-xs-4 div-centro well well-lg">
            <blockquote>
                <p>Faça seu login.</p>
            </blockquote>
            <form class="form-horizontal" role="form" action="../SISDO/visao/verificaLogin.php" method="POST">
                <div class="form-group">
                    <label for="inputUsuario" class="col-sm-2 control-label">Usuário</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputUsuario" name="usuario" placeholder="Usuário" value="danielsc">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" name="senha" placeholder="Senha">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Entrar</button>
                    </div>
                </div>
            </form>
            
        </div>






    </body>
</html>
