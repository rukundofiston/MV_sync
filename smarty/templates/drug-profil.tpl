{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page">
    {assign var='backUrl' value='drugs.php'}
    {assign var='headerName' value=$medicament->libelle}
    {assign var='home' value=true}
    {include file="header.tpl"}
	<div data-role="content">
        <div data-role="collapsible" data-collapsed="false" >
            <h3>Prix</h3>
            <div class="ui-grid-a my-breakpoint center" >
                <p>{$medicament->prix}</p>
            </div>
        </div>
        <div data-role="collapsible" data-collapsed="false">
            <h3>Descriptions</h3>
            <div class="ui-block-a my-breakpoint center" >  
            {if !empty($medicament->desctiption)}
                <div>
                    <p> {$medicament->desctiption} </p>                      
                </div>
            {/if}
           
        </div>
        <div data-role="footer" data-theme="a" data-position="fixed">
            <h3>Copyright</h3>
        </div>
    </div>
</div>
{/block}