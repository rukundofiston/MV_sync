{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page">
    {assign var='backUrl' value='index.php'}
    {assign var='headerName' value='Rapports'}
    {assign var='home' value=false}
    {include file="header.tpl"}
    <div data-role="content">
        <div>
            {block name=reports}{/block}
        </div>
    </div>
    <div data-role="footer">
        <div data-role="navbar">
            <ul>
                {if $smarty.session.rights|strpos:"delegue"!==false}
                    <li><a href="reports.php?action=viewAll">Rapports de mon equipe</a></li>
                {/if}
                <li><a href="reports.php?action=myReports">Mes Rapports</a></li>
                <li><a href="reports.php?action=generate">Creer</a></li>
            </ul>
        </div>
    </div>
</div>
{/block}