<!DOCTYPE html>
<html lang="en">
<?php 
$login = null;
$senha = null;
//    if ((isset($_POST['login']) and $_POST['login']) or
//     (isset($_POST['senha']) and $_POST['senha'])) {
//        $login = $_POST['login'];
//        $senha = $_POST['senha'];
//        if ($login == 'Alex' and $senha == '123789') {
//            echo "<b>Sucesso ao Logar!</b>";
//        } else {
//            echo "<b>Erro ao Logar!</b>";
//        }
//    }


    if (isset($_POST['login']) and $_POST['login']) {
        $login = $_POST['login'];
    }
    if (isset($_POST['senha']) and $_POST['senha']) {
        $senha = $_POST['senha'];
    }
    if ($login and $senha) {
        if ($login == 'Alex' and $senha == '123789') {
            echo "<b>Sucesso ao Logar!</b>";
        } else {
            echo "<b>Erro ao Logar!</b>";
        }
    }
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Starter Template - Materialize</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>
    <nav class="light-blue lighten-1" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Login</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Login</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    <div class="container">
        <form method="post" name="form_novo">
            <div class="section">
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card horizontal">
                            <div class="card-stacked">
                                    <h5 class="center">Login</h5>
                                <div class="card-content">
                                    <b>Login:</b> <input type="text" value="" name="login" id="login" /><br>
                                    <b>Senha:</b> <input type="password" value="" name="senha" id="login" />
                                </div>
                                <div class="card-action  light-blue">
                                    <div class="col s12 m4">
                <input type="submit" class="waves-effect green white-text accent-3 btn" name="btnEntrar" value="Entrar" style="color:white !important;"/>
               
            </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </form>
    </div>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

</body>

</html>