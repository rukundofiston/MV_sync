<?php
require_once '../html2pdf/html2pdf.class.php';
require_once '../config.php';
extract($_POST);
$medicament = Doctrine_Core::getTable("Medicament")->findOneBy("id_medicament", $id_medicament);
$secteur = Doctrine_Core::getTable("Secteur")->findOneBy("id_secteur", $id_secteur);
$rslt= Doctrine_Query::create()
->select('v.date,v.qte')
->from('Vente v')
->where('v.id_secteur='. $id_secteur)
->andWhere('v.id_medicament='.$id_medicament)
->andWhere('v.date BETWEEN "'.$date_debut.'" and "'.$date_fin.'"')
->orderBy('v.date ASC')
->execute();
	//Preparation du contenu qui va etre affiché dans le fichier PDF
	ob_start();
	?>
	<page  backtop="0" backbottom="30mm" footer="date;heure;page" style="font-size: 12pt"> 
	    <table style="width: 100%; vertical-align:top;">
	    	<tr>
	    		<td style="width: 20%;">
	    			<img src="../images/logo.png"/>					
	    		</td>
	    		<td style="width: 80%;"></td>
	    	</tr>
	    	<tr>
	    		<td style="width: 30%;"></td>
	    		<td style="width: 70%; color: #444444; padding-left: 50px;"><h1>Etat des ventes</h1></td>
	    	</tr>
	    	</table>
	    		<br>
	    <table style="width: 100%; vertical-align:top;">
	    	<tr>
	    		<td style="width: 50%; padding-left:100px;">Medicament :<strong><?php echo $medicament->libelle;?></strong><br>Secteur :<strong><?php echo $secteur->libelle;?></strong></td>
	    		<td style="width: 50%; padding-left:100px;">Du :<strong><?php echo $date_debut;?></strong><br>Au :<strong><?php echo $date_fin;?></strong></td>
	    	</tr>
	    </table>
		<br>
	   	  <table cellspacing="0" style="width: 50%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt; margin-left: 200px;">
		        <tr>
		            <th style="width: 50%">Date</th>
		            <th style="width: 50%">Quantité</th>
		        </tr>
	  	  </table>
	  	  <table cellspacing="0" style="width: 50%; background: #F7F7F7; text-align: center; font-size: 10pt; margin-left: 200px;">
		       <?php
		       foreach($rslt as $elem)
				{
		        echo '<tr>
		            <td style="width: 50%; border: solid 1px black;">'.$elem['date'].'</td>
		            <td style="width: 50%; border: solid 1px black;">'.$elem['qte'].'</td>
		        </tr>';
		        }
		            ?>
		   </table>			
		 </page> 
 	<?php
	$content=ob_get_clean();//Mettre le contenu preparé avant dans la variable $content 
	try{
		 $html2pdf = new HTML2PDF('P','A4','fr');
	     $html2pdf->WriteHTML($content);
	     $content = $html2pdf->Output('AZER.pdf', 'D');
	     //$html2pdf->Output('Etat_ventes.pdf','I');
	}catch(HTMH2PDF_exception $e){
		echo "yaa";
		die($e);
	}