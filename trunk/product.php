<?php

include_once 'function/function_page.php';
include_once 'function/function_product.php';

?>
	<script LANGUAGE="JavaScript">
		function confirmSubmit()
		{
			var agree=confirm("Eliminare prodotto?");
			if (agree)
				return true ;
			else
				return false ;
		}
	</script> 
<?php
drawOpenPage();

if(isset($_REQUEST['delete']) && ($_REQUEST['delete']!="")){
	
	
	deleteProduct($_REQUEST['id']);
	
	if($_REQUEST['id_booking']){
	?>
		<script type="text/javascript">
			alert("Prodotto eliminato con successo!");
			window.location.href="product.php?id_booking=<?php echo $_REQUEST['id_booking']?>";
		</script>
		<?php 
	}
	else{
		?>
		<script type="text/javascript">
			alert("Prodotto eliminato con successo!");
			window.location.href="product.php?add_product=true";
		</script>
		<?php 
	}
}

if(isset($_REQUEST['modify']) && ($_REQUEST['modify']!="")){

	updateProduct($_REQUEST['id'],$_REQUEST['name'],$_REQUEST['desc'],$_REQUEST['price']);
	
	if($_REQUEST['id_booking']){
	?>
		<script type="text/javascript">
			alert("Prodotto modificato con successo!");
			window.location.href="product.php?id_booking=<?php echo $_REQUEST['id_booking']?>";
		</script>
		<?php 
	}
	else{
		?>
		<script type="text/javascript">
			alert("Prodotto modificato con successo!");
			window.location.href="product.php?add_product=true";
		</script>
		<?php 
	}
}

if(isset($_REQUEST['add']) && ($_REQUEST['add']!="")){
	?><div id="titoloContenuti">AGGIUNGI PRODOTTO</div><?php 
	?>
	<form id="add" name="add" action="" method="request">
	<input type="hidden" id="salva" name="salva" value="true"/>
	<table align="center" bordercolor="FFFFFF">
	<tr>
		<td>Nome</td>
		<td><input type="text" id="name" name="name" autocomplete="off"/></td>
	</tr>
	<tr>
		<td>Descrizione</td>
		<td><input type="text" id="desc" name="desc" autocomplete="off"/></td>
	</tr>
	<tr>
		<td>Prezzo</td>
		<td><input type="text" id="price" name="price" autocomplete="off"/></td>
	</tr>
	<tr>
		<td></td>
		<td><button value="submit">Salva</button></td>
	</tr>
</table>
</form>
	<?php 
	drawClosePage();
}if(isset($_REQUEST['product']) && ($_REQUEST['product']!="")){

	if(isset($_REQUEST['id_booking'])){
		$id_booking = $_REQUEST['id_booking'];
	}
	$product = getProduct($_REQUEST['product']);
	?><div id="titoloContenuti">MODIFICA PRODOTTO</div><?php 
	?>
	<form id="add" name="add" action="" method="request">
	<input type="hidden" id="modify" name="modify" value="true"/>
	<input type="hidden" id="id_booking" name="id_booking" value="<?php echo $id_booking ?>"/>
	<input type="hidden" id="id" name="id" value="<?php echo $product['id'] ?>"/>
	<table align="center" bordercolor="FFFFFF">
	<tr>
		<td>Nome</td>
		<td><input type="text" id="name" name="name" autocomplete="off" value="<?php echo $product['name'];?>"/></td>
	</tr>
	<tr>
		<td>Descrizione</td>
		<td><input type="text" id="desc" name="desc" autocomplete="off" value="<?php echo $product['description'];?>"/></td>
	</tr>
	<tr>
		<td>Prezzo</td>
		<td><input type="text" id="price" name="price" autocomplete="off" value="<?php echo $product['price'];?>"/></td>
	</tr>
	<tr>
		<td><input id="delete" name="delete" type="submit" onClick="return confirmSubmit();" value="Elimina"/></td>
		<td><button value="submit">Salva</button></td>
	</tr>
</table>
</form>
<?php 
	if(isset($_REQUEST['id_booking'])&& ($_REQUEST['id_booking']!="")){
		drawClosePage("id_booking",$_REQUEST['id_booking']);
	}
	else{
		drawClosePage();
	}
			
	
}if(isset($_REQUEST['salva']) && ($_REQUEST['salva']!="")){

	insertProduct($_REQUEST['name'],$_REQUEST['desc'],$_REQUEST['price']);
	
	if($_REQUEST['id_booking']){
	$booking = getBookingById($_REQUEST['id_booking'])	
	?>
		<script type="text/javascript">
			alert("Prodotto aggiunto con successo!");
			window.location.href="option_booking.php?id_booking=<?php echo $booking['id']?>";
		</script>
		<?php 
	}
	else{
		?>
		<script type="text/javascript">
			alert("Prodotto aggiunto con successo!");
			window.location.href="product.php?add_product=true";
		</script>
		<?php 
	}
}

if(isset($_REQUEST['add_product']) && ($_REQUEST['add_product']!="")){
	?>
	<div id="titoloContenuti">AGGIUNGI SERVIZIO</div>
	<form id="search_product" name="search_product" action="" method="request" >
	<input id="text_search" name="text_search" type="text" value=""/>
	<input id="search" name="search" type="submit" value="Cerca"/>
	</form>
	<form id="add" name="add" action="" method="request">
	<input type="hidden" name="add" value="add"/>
	<button id="add_product" value="add">Aggiungi Prodotto</button>
	</form>
	<?php drawClosePage();
	}
if(isset($_REQUEST['search']) && $_REQUEST['search']!="" ){?>
	
	<div id="titoloContenuti">AGGIUNGI SERVIZIO</div>
	<form id="search_product" name="search_product" action="" method="request" >
	<input id="text_search" name="text_search" type="text" value=""/>
	<input id="search" name="search" type="submit" value="Cerca"/>
	</form>
	<form id="add" name="add" action="" method="request">
	<input type="hidden" name="add" value="add"/>
	<button id="add_product" value="add">Aggiungi Prodotto</button>
	</form>
	
	<link rel="STYLESHEET" type="text/css" href="include_js/dhtmlxGrid/codebase/dhtmlxgrid.css">
	<link rel="stylesheet" type="text/css" href="include_js/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_black.css">
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>        
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>

	<table width="805px">
		    <tr>
		        <td>
		            <div id="gridbox1" style="width:64%;height:400px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox1');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Articolo,Prezzo (Euro),Descrizione,Modifica");
		mygrid.setInitWidths("130,150,120,90");
		mygrid.setColAlign("left,left,left,left");
		mygrid.setColTypes("ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black");

		<?php 
		$text_search = $_REQUEST['text_search'];
		$products = searchProducts($text_search);
		foreach ($products as $p) {
		
		$button_modify = '<button onclick=\"window.location.href=\'product.php?product='.$p['id'].'\'\">Modifica</button>';
			
		$str = "mygrid.addRow(".$p['id'].", [\"".$p['name']."\",\"".$p['price']."\", \"".
									$p['description']."\", \"".
									$button_modify."\"]);";
									
			echo $str;
		}
?>
	</script>
	<?php drawClosePage();
//}else 
}if (isset($_REQUEST['id_booking']) && (!(isset($_REQUEST['product'])))){

$id_booking = $_REQUEST['id_booking'];
?><div id="titoloContenuti">SERVIZI IN STANZA</div>


	<link rel="STYLESHEET" type="text/css" href="include_js/dhtmlxGrid/codebase/dhtmlxgrid.css">
	<link rel="stylesheet" type="text/css" href="include_js/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_black.css">
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>        
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>

	<table width="805px">
		    <tr>
		        <td>
		            <div id="gridbox" style="width:85%;height:400px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Articolo,Prezzo (Euro),Descrizione,Aggiungi,Modifica");
		mygrid.setInitWidths("200,150,120,100,100");
		mygrid.setColAlign("left,left,left,left,left");
		mygrid.setColTypes("ro,ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black");

		<?php 
		$products = getProducts();
		foreach ($products as $p) {
			
		$button_add = '<button onclick=\"window.location.href=\'option_booking.php?add_product='.$p['id'].'\
									&id_booking='.$id_booking.'\'\">Aggiungi</button>';
		
		$button_modify = '<button onclick=\"window.location.href=\'product.php?product='.$p['id'].'\
									&id_booking='.$id_booking.'\'\">Modifica</button>';
			
		$str = "mygrid.addRow(".$p['id'].", [\"".$p['name']."\",\"".$p['price']."\", \"".
									$p['description']."\", \"".
									$button_add."\",\"".$button_modify."\"]);";
									
			echo $str;
		}
?>
	</script>
<?php drawClosePage("id_booking",$id_booking);
	}
?>