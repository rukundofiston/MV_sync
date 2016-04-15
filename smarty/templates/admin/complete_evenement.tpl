{foreach from=$tab item=delegue}
<div class="display_box" align="left">
<img src="../images/profils/3.jpg"/><strong id="{$delegue->id_delegue}">{$delegue->nom}&nbsp;{$delegue->prenom}</strong>
</div>
{/foreach}  