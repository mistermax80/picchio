<?php

include 'include/pagina_apertura.php';
include_once 'function/function_client.php';
include_once 'function/function_visitor.php';
include_once 'function/function_room.php';
include_once 'function/function_booking.php';
include_once 'include/costant_generic.php';

$date_stamp_in = $_REQUEST['date_stamp_in'];
$id_room = $_REQUEST['id_room'];
$id_client = $_REQUEST['id_client'];
$rooms = getRooms();

?><div id="titoloContenuti">PRENOTAZIONE</div>

<?php 
$booking = getBooking($date_stamp_in,$id_room);

//Se il cliente è settato allora mostra info cliente e procedi con la form della stanza
if(isset($_POST['id_client']) || isset($_REQUEST['id_client'])){
	if(isset($_POST['id_client'])){
		$id_client = $_POST['id_client'];
	}else if(isset($_REQUEST['id_client'])){
		$id_client = $_REQUEST['id_client'];
	}
	//Visualizza Info Cliente e visitatore
	$client = getClient($id_client);
	?>
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
		mygrid.setHeader("Cognome,Nome,Tipo Doc.,Num Doc.,Data Nascita,Luogo Nascita,Indirizzo,Citt&agrave;,Telefono,Email,Modifica,Elimina");
		mygrid.setInitWidths("70,70,70,70,70,70,70,70,70,70,80,80,80");
		mygrid.setColAlign("right,right,right,right,right,right,right,right,right,right,right,right,right");
		mygrid.setColTypes("ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str,str,str,str,str,str,str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black"); 
	
	<?php 
		$button_modify = '<button onclick=\"window.location.href=\'option.php?id_report='.$r['id'].'\'\">Modifica</button>';
		$button_delete = '<button onclick=\"window.location.href=\'option.php?id_report='.$r['id'].'\'\">Elimina</button>';	
		$str = "mygrid.addRow(".$client['id'].", [\"".$client['name']."\",\"".$client['surname']."\", \"".
									$client['type_document']."\", \"".$client['number_document']."\", \"".
									$client['date_birth']."\", \"".$client['city_birt']."\", \"".
									$client['address']."\", \"".$client['city']."\", \"".
									$client['telephone']."\", \"".$client['email']."\", \"".
									$button_modify."\",\"".$button_delete."\"]);";
															
			echo $str;						
									
		if(count($booking)>0)  //Esiste la prenotazione
			$id_booking = $booking['id'];
		$visitors = getVisitor($id_booking);
		foreach ($visitors as $v) {
			$button_modify = '<button onclick=\"window.location.href=\'option.php?id_report='.$r['id'].'\'\">Modifica</button>';
			$button_delete = '<button onclick=\"window.location.href=\'option.php?id_report='.$r['id'].'\'\">Elimina</button>';	
			$str = "mygrid.addRow(".$v['id'].", [\"".$v['name']."\",\"".$v['surname']."\", \"".
									$v['type_document']."\", \"".$v['number_document']."\", \"".
									$v['date_birth']."\", \"".$v['city_birt']."\", \"".
									$v['address']."\", \"".$v['city']."\", \"".
									$v['telephone']."\", \"".$v['email']."\", \"".
									$button_modify."\",\"".$button_delete."\"]);";
			echo $str;	
		
		}
	?></script><?php 
	
	//Mostra form di prenotazione
	if(isset($_POST['id_room'])){
		$id_room = $_POST['id_room'];
		$date_in = $_POST['date_in'];
		$date_out = $_POST['date_out'];
		$number_client = $_POST['number_client'];
		$note = $_POST['note'];
		//Controllo che disponibilità della stanza nell'intervallo dei giorni
		if(checkFreeBooking($date_in,$date_out,$id_room)){
			//Salvo i dati della prenotazione
			insertBooking($id_client,$id_room,$date_in,$date_out,$number_client,$note);
			//Ritorno al calendario
			echo "Inserimento avvenuto con successo";
			echo "<br><a href=\"".page_calendar."\">Ritorna al calendario</a>";
			include 'include/pagina_chiusura_booking.php';
		}else{
			echo "Stanza Occupata nei giorni richiesti!";
			echo "<br><a href=\"".page_calendar."\">Ritorna al calendario</a>";
			include 'include/pagina_chiusura_booking.php';
		}
		
	}else if(count($booking)>0){  //Esiste la prenotazione
		echo "<br><br><br>";
		echo "<b>Informazioni prenotazione</b>";
		echo "<br>Stanza: ".$booking['room'];
		echo "<br>Data ingresso: ".substr($booking['date_in'],0,10);
		echo "<br>Data uscita: ".substr($booking['date_out'],0,10);
		echo "<br>Numero clienti: ".$booking['number_client'];
		echo "<br>Note: ".$booking['note'];
		?>	
	
    <?php include 'include/pagina_chiusura_booking.php';?>
    <?php		
	}else{
		//Mostro form di compilazione prenotazione della stanza
		?>
		<br><br><br>
		<link type="text/css" href="include_js/jquery-ui-1.7.2.custom/css/ui-darkness/jquery-ui-1.7.2.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="include_js/jquery-ui-1.7.2.custom//js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="include_js/jquery-ui-1.7.2.custom//js/jquery-ui-1.7.2.custom.min.js"></script>
		<script type="text/javascript" src="include_js/jquery-ui-1.7.2.custom/development-bundle/ui/i18n/ui.datepicker-it.js"></script>
	
		<script type="text/javascript">
			$(function() {
				$("#datepicker").datepicker($.datepicker.regional['it']);
				$("#date_out").datepicker({dateFormat: 'yy-mm-dd'}); 
			});
		</script>

		<form id="add_booking" name="add_booking" method="post">
		<input type="hidden" name="id_room" value="<?php echo $id_room;?>" />
		<input type="hidden" name="id_client" value="<?php echo $id_client;?>" />
		<table align="center" bordercolor="FFFFFF">
			<tr>
				<td>Camera</td>
				<td>
					<?php echo "".$id_room;?>
					<!--<input type="text" name="id_room" value="<?php echo "".$id_room;?>"/>-->
				</td>
			</tr>
			<tr>
				<td>Data Arrivo</td>
				<td>
					<?php //echo date(format_date,$_REQUEST['date_stamp_in']);?>
					<input type="text" id="date_in" name="date_in" value="<?php echo date(format_date,$_REQUEST['date_stamp_in']);?>"/>
				</td>
			</tr>
			<tr>
				<td>Data Uscita</td>
				<td><input type="text" id="date_out" name="date_out" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Numero clienti</td>
				<td><input type="text" id="number_client" name="number_client" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Note</td>
				<td><input type="text" name="note" autocomplete="off"/></td>
			</tr>
			<tr>
				<td></td>
				<td><button value="submit">Salva</button></td>
			</tr>
		</table>
		</form>
				<?php
				include 'include/pagina_chiusura.php';
	}
		}else{ ?>
				<form id="search_client" name="search_client" method="post">
					<input type="hidden" name="date_in" value="<?php echo $date_in;?>"/>
					<input type="hidden" name="id_room" value="<?php echo $id_room;?>"/>
					<input id="text_search" name="text_search" type="text" value=""/>
					<input id="search" name="search" type="submit" value="Cerca"></input>
				</form>
			<?php
			if(isset($_POST['search']) && $_POST['search']!="" ){
			?>	
				<form id="select_client" name="select_client" method="post">
				<table border="1px;">
					<tr>
						<th></th>
						<th>Nome</th>
						<th>Cognome</th>
						<th>Documento</th>
						<th>Data Nascita</th>
					</tr>
				<?php
				$text_search = $_POST['text_search'];
				$clients = searchClients($text_search);
				
				foreach ($clients as $c) {
					$id = $c['id'];
					$name = $c['name'];
					$surname = $c['surname'];
					$number_document = $c['number_document'];
					$date_birth = $c['date_birth'];
					echo "<tr>";
					echo "<td><input type=\"radio\" name=\"id_client\" value=\"".$id."\"/></td>";
					echo "<td>".$name."</td>";
					echo "<td>".$surname."</td>";
					echo "<td>".$number_document."</td>";
					echo "<td>".$date_birth."</td>";
					echo "</tr>";
				}
				?>
				<tr>
					<td></td>
					<td><button id="picchio" value="submit">Invia</button></td>
				</tr>
				</table>
				</form>
				<?php }?>
				<form id="add_client" name="add_client" action="add_client.php" method="post">
					<input type="hidden" name="return_page" value="booking"/>
					<input type="hidden" name="date_in" value="<?php echo $date_in;?>"/>
					<input type="hidden" name="id_room" value="<?php echo $id_room;?>"/>
					<button id="add_client" value="submit">Aggiungi Cliente</button>
				</form>
		
		
<?php 
		include 'include/pagina_chiusura.php';
		}?>