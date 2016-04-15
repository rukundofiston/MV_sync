{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page" id="login-page">
	<div data-role="content">
		<div class="vertical-align-center" id="logbox">
			<div id="logo"></div>
			<div class="form">
				<form id="logfrm" data-role="fieldcontain" action="login.php" method="post">
					<input type="text" name="login" id="user" required="required" placeholder="Utilisateur"/>
					<input type="password" name="passwd" id="mdp" required="required" placeholder="Mot de Passe"/>
					<input type="submit"  value="Se connecter" id="submitBtn" data-theme="d" />
					<br><span class="error" style="display:{$msg}">Votre nom d'utilisateur ou mot de passe est inccorect</span>
				</form>
			</div>
		</div>
	</div>
</div>
{/block}