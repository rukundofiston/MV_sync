<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 12:58:21
         compiled from "..\Smarty\templates\admin\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2290650daf46d453837-69618103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a00d5e3f3c4879b29e1735e10d0e2d6709cc2715' => 
    array (
      0 => '..\\Smarty\\templates\\admin\\login.tpl',
      1 => 1356504983,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2290650daf46d453837-69618103',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50daf46d4d67f8_02552400',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50daf46d4d67f8_02552400')) {function content_50daf46d4d67f8_02552400($_smarty_tpl) {?>        <!DOCTYPE HTML> 
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
              <div class="error" style="display:<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
">Vous avez une erreur</div>
            </form>
          </div>
        </div>
        <!-- End .box -->
      
  </body>
</html>


       <?php }} ?>