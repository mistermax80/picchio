<?php
include 'include/pagina_apertura.php';
include_once 'function/function_visitor.php';
include_once 'function/function_client.php';
include_once 'function/function_booking.php';

$id = $_REQUEST['id_booking'];
if(!(isset($_POST['return_page'])&& $_POST['return_page']=='visitor')
								&& (!(isset($_POST['operation']) && $_POST['operation']=='save'))){
?>
	<div id="titoloContenuti">AGGIUNGI  NUOVO VISITATORE</div>
	<link rel="STYLESHEET" type="text/css" href="include_js/dhtmlxGrid/codebase/dhtmlxgrid.css">
	<link rel="stylesheet" type="text/css" href="include_js/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_black.css">
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>        
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
	
		<table width="805px">
		    <tr>
		        <td>
		            <div id="gridbox" style="width:110%;height:250px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Cognome,Nome,Tipo Doc.,Num Doc.,Data Nascita,Luogo Nascita,Indirizzo,Citt&agrave;,Telefono,Email,Aggiungi,Modifica");
		mygrid.setInitWidths("70,70,70,70,70,70,70,70,70,70,80,80,80");
		mygrid.setColAlign("right,right,right,right,right,right,right,right,right,right,right,right,right");
		mygrid.setColTypes("ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str,str,str,str,str,str,str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black");
	
	<?php
		$clients = getClients();
		foreach ($clients as $c) {
			$button_modify = '<button onclick=\"window.location.href=\'modific_client.php?id_client='.$c['id'].'\'\">Modifica</button>';
			$button_add = '<button onclick=\"window.location.href=\'add_visitor.php?id_report='.$id_booking['id_booking'].'\'\">Aggiungi</button>';
			$str = "mygrid.addRow(".$c['id'].", [\"".$c['surname']."\", \"".$c['name']."\", \"".
									$c['type_document']."\", \"".$c['number_document']."\", \"".
									$c['date_birth']."\", \"".$c['city_birth']."\", \"".
									$c['address']."\", \"".$c['city']."\", \"".
									$c['telephone']."\", \"".$c['email']."\", \"".
									$button_add."\",\"".$button_modify."\"]);";
			echo $str;
		}
		$visitors = getVisitors();
		foreach ($visitors as $v) {
			$button_modify = '<button onclick=\"window.location.href=\'option.php?id_report='.$v['id'].'\'\">Modifica</button>';
			$button_add = '<button onclick=\"window.location.href=\'add_visitor.php?id ='.$v['id'].'\'\">Aggiungi</button>';	
			$str = "mygrid.addRow(".$v['id'].", [\"".$v['name']."\",\"".$v['surname']."\", \"".
									$v['type_document']."\", \"".$v['number_document']."\", \"".
									$v['date_birth']."\", \"".$v['city_birt']."\", \"".
									$v['address']."\", \"".$v['city']."\", \"".
									$v['telephone']."\", \"".$v['email']."\", \"".
									$button_add."\",\"".$button_modify."\"]);";
			echo $str;		
		}
	?>
	</script>
	<br><br>
	<form id="add_visitor" name="add_visitor" action="add_visitor.php" method="post">
					<input type="hidden" name="return_page" value="visitor"/>
					<input type="hidden" name="id_booking" value="<?php echo $id ?>"/>
					<button id="add_visitor" value="submit">Aggiungi Visitatore</button>
	</form>

<?php
}else if((isset($_POST['operation']) && $_POST['operation']=='save')){
		//Aggiungi nel db
		$id_booking = $_POST['id_booking'];
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$type_document = $_POST['type_document'];
		$number_document = $_POST['number_document'];
		$date_birth = $_POST['date_birth'];
		$city_birth = $_POST['city_birth'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$telephone = $_POST['telephone'];
		$email = $_POST['email'];
		$id_visitor = addVisitor($id_booking,$name,$surname,$type_document,$number_document,$date_birth,$city_birth,$address,$city,$telephone,$email);
		if($id_visitor==""){
			echo "Visitatore aggiunto con successo.";
			echo "<a href=\"index.php\">Ritorna</a>";
			}else{
				echo "<a href=\"add_visitor.php\">ERRORE</a>";
	}
}else{

	?>
<div id="titoloContenuti">AGGIUNGI  NUOVO VISITATORE</div>
	<form id="add_visitor" name="add_visitor" method="post">
		<input type="hidden" name="operation" value="save" />
		<input type="hidden" name="id_booking" value="<?php echo $id ?>"/>
		<table align="center">
			<tr>
				<td>Nome</td>
				<td><input type="text" name="name" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Cognome</td>
				<td><input type="text" name="surname" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Tipo Documento</td>
				<td><input type="text" name="type_document" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Num. Documento</td>
				<td><input type="text" name="number_document" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Data Nascita</td>
				<td><input type="text" name="date_birth" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Luogo Nascita</td>
				<td><input type="text" name="city_birth" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Indirizzo</td>
				<td><input type="text" name="address" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Citt&agrave;</td>
				<td><input type="text" name="city" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Telefono</td>
				<td><input type="text" name="telephone" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" autocomplete="off"/></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td><button value="submit">Salva</button></td>
			</tr>
		</table>
	</form>

<?php }
include 'include/pagina_chiusura_booking.php';
?>