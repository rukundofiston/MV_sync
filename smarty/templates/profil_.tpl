{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page">
    {assign var='backUrl' value='doctors.php'}
    {assign var='headerName' value='Profil du medecin'}
    {assign var='home' value=true}
    {include file="header.tpl"}
	<div data-role="content">
        <div class="ui-grid-a">
            <div class="ui-block-a">
                <img class="profil-pic" src="../upload/{$doctor->photo}" alt="photo">
            </div>
            <div class="ui-block-b">
                <h4>{$doctor->civilite}. {$doctor->nom} {$doctor->prenom}<br/> 
                    {foreach $types as $type}
                        <span>{$type->Type->libelle}</span><br>
                    {/foreach}
                </h4>
            </div>
        </div>
        <div data-role="collapsible" data-collapsed="false" >
            <h3>Info Personnel</h3>
            <div class="ui-grid-b my-breakpoint" >
                <div class="ui-block-a">
                    <p>Adresse : </p>
                </div>
                <div class="ui-block-b">
                    <p>{$doctor->adresse}</p>                          
                </div>
            </div>
            <div class="ui-grid-b my-breakpoint" >
                <div class="ui-block-a">
                    <p>Sexe</p>
                </div>
                <div class="ui-block-b">
                    <p> {if $doctor->sexe =="h"}Homme {else} Femme{/if}</p>
                </div>
            </div>
        </div>
        <div data-role="collapsible" data-collapsed="false">
            <h3>Coordonnées</h3>
            <div class="ui-grid-b my-breakpoint" >
                <div class="ui-block-a">
                    <p>Mobile</p>
                </div>
                <div class="ui-block-b">
                    <p> {$doctor->tel}</p>                          
                </div>
            </div>
            {if !empty($doctor->adresse)}
            <div class="ui-grid-b my-breakpoint" >
                <div class="ui-block-a">
                    <p>Adresse</p>
                </div>
                <div class="ui-block-b">
                    <p> {$doctor->adresse} </p>                      
                </div>
            </div>
            {/if}
            {if !empty($doctor->email)}
            <div class="ui-grid-b my-breakpoint" >
                <div class="ui-block-a">
                    <p>E-email : </p>
                </div>
                <div class="ui-block-b">
                    <p> {$doctor->email} </p>                      
                </div>
            </div>
            {/if}
        </div>
        <div data-role="footer" data-theme="A" data-position="fixed">
            <h3>Copyright</h3>
        </div>
    </div>
</div>
    <div data-role="page" id="confirmBox">
        <div data-role="header">
            <h1>Supprimer le medecin </h1>
        </div>
        <div data-role="content">
            <p>Etes vous sure de vouloir supprimer ce medecin</p>
        </div>
        <div data-role="footer">
            <div data-role="navbar">
                <ul>
                    <li><a href="doctors.php?action=delete&id={$doctor->id_medecin}" data-role="button">Oui</a></li>
                    <li><a data-rel="back">Non</a></li>
                </ul>
            </div>
        </div>
    </div>
{/block}