{literal}
<script>
        $("#Quitter").click(function(){
          $("#dialog2").dialog("close");
        });
    $("#client").autocomplete({
      source: "comptes.php?action=getCompte",
      minLength: 2,
      select: function(event, ui) {
        alert(ui);
          }
      });
</script>
{/literal}
<form id="_superviseur" class="form-horizontal row-fluid" method="post" enctype="multipart/form-data">
    <fieldset id="second_div" style="display:none">
      <legend>Mes délégues </legend>
        <table id="data_demandes" class="responsive table table-striped table-bordered dataTable">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            {foreach $delegues as $delegue}
            <tr>
              <td>{$delegue->nom}</td>
              <td>{$delegue->prenom}</td>
              <td>
                <a href="index.php?action=delete&id={$compte->id_compte}">
                  <div class="delete"></div>
                </a>
              </td>
            </tr>
          {/foreach}
        </tbody>
      </table> 
    </fieldset>
</form>
