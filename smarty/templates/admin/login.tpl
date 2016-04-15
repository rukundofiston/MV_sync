        <!DOCTYPE HTML> 
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="css/images/favicon.png">
    <link href="../css/jquery-ui.css" rel="stylesheet">
    <link href="css/base.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <script type="text/javascript" src="../scripts/jquery.js"></script>
    <script type="text/javascript" src="../scripts/jquery-ui.js"></script>
  </head>
  <body>

             <div class="box gradient" style="width:50%; margin-left:25%; margin-right:25%; margin-top:10%;">
          <div class="title">
            <h3>
            <span>Connexion</span>
            </h3>
          </div>
          <div class="content ">
            <form class="bs-docs-example form-horizontal" action="login.php" method="post">
              <div class="control-group row-fluid">
                <label class="control-label span4" for="loginInput">Login</label>
                <div class="controls span5 input-append">
                  <input type="text" id="loginInput" placeholder="Nom d'utilisateur" name="login">
                </div>
              </div>
              <div class="control-group row-fluid">
                <label class="control-label span4" for="inputPassword">Password</label>
                <div class="controls span5 input-append">
                  <input type="password" id="inputPassword" placeholder="Mot de passe" name="passwd">
                </div>
              </div>
              <div class="control-group row-fluid">
                <div class="controls span5 offset4">
                  <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
              </div>
              <div class="error" style="display:{$msg}">Vous avez une erreur</div>
            </form>
          </div>
        </div>
        <!-- End .box -->
      
  </body>
</html>


       