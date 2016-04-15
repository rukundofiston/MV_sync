{extends file="admin/skeleton.tpl"}{/extends}
{block name="content"}
       
          <div class="box gradient">
            <div class="title">
              <h3><strong>Ajouter un evenement</strong></h3>
            </div>
          <div class="content top">
          <form class="form-horizontal row-fluid">
          <div class="form-horizontal row-fluid">
          <label class="control-label span3" for="normal-field">Description</label>
          <div class="controls span7">
            <input id="normal-field" class="row-fluid" type="text" name="desc">
          </div>
          </div>
           <div class="form-horizontal row-fluid">
          <label class="control-label span3" for="normal-field">Lieu</label>
          <div class="controls span7">
            <input id="normal-field" class="row-fluid" type="text" name="lieu">
          </div>
          </div>
           <div class="form-horizontal row-fluid">
          <label class="control-label span3" for="normal-field"/>Date</label>
          <div class="controls span7">
            <input id="date" class="row-fluid" type="text" name="date">
          </div>
          </div>
           <div class="form-horizontal row-fluid">
          <label class="control-label span3" for="normal-field">Heure</label>
          <div class="controls span7">
            <input id="normal-field" class="row-fluid" type="text" name="horraire">
          </div>
          </div>
           <div class="form-horizontal row-fluid">
          <label class="control-label span3" for="normal-field">Organisateur</label>
          <div class="controls span7">
            <input id="normal-field" class="row-fluid" type="text" name="organisateur">
          </div>
          </div>
          <div class="form-actions row-fluid">
          <div class="span7 offset3">
          <button class="btn btn-primary" type="submit">Enregistrer</button>
          <button class="btn btn-secondary" type="button">Annuler</button>
          </div>
          </div>
          </form>
          </div>
      </div> 




	  <script src="js/jquery.js"></script>
    <script src="js/jquery-ui-1.8.23.custom.min.js"></script>
    <script src="js/jquery.touchdown.js"></script>
    <script type="text/javascript" language="javascript" src="js/plugins/datatables/js/jquery.dataTables.js"></script>
    <script src="js/scripts.js"></script>




    <script type="text/javascript" charset="utf-8">
     $(function() {
        $( "#date" ).datepicker({ duration: "fast" });
    });
    </script>
{/block}