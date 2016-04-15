{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page" id="logpage">
    
    <div class="vertical-align-center" id="logbox" >
        <h2 data-role="title" data-theme="b">Login</h2>
        <div id="logfrm" data-role="fieldcontain" >
            
	    <input type="text" name="user" id="user" placeholder="Utilisateur"   />
            <input type="password" name="mdp" id="mdp" placeholder="Mot de Pass"  />
             <br> <br>
            <input type="submit"  value="Login"  id="sub" data-theme="B" />
           
           
        </div>
   
    </div>    
</div>
{/block}