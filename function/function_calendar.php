<?php
include_once 'include/costant.php';

function isBusy($day,$room) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT count(*) FROM booking WHERE date_in=".$day."&& room=".$room ;
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	mysql_close($link);
	if ($row = mysql_fetch_assoc($result)) {
		if ($row['count(*)']>0)
			$busy = true;
		else 
			$busy = false;	
	}
	return $busy;
}

function drawHeaderCalendar($link,$prev,$prev_yr,$first_day,$temp_yr,$next,$next_yr){
	?>
	
	<DIV ALIGN='center'>
	<TABLE>
		<TR ALIGN='center'>
			<TD BGCOLOR='white'>
	    		<A HREF='<?php echo $link."?month=".$prev."&year=".$prev_yr;?>' STYLE="text-decoration: none"><B>prima</B></A>
	    	</TD>
            <TD COLSPAN=5 BGCOLOR='#99CCFF'><B><?php echo date("F",$first_day)." ".$temp_yr;?></B></TD>
            <TD BGCOLOR='white'>
            	<A HREF='<?php echo $link."?month=".$next."&year=".$next_yr;?>' STYLE="text-decoration: none"><B>dopo</B></A> 
            </TD>
		</TR>
	
	<TR ALIGN='center'>
		<TD><B>Domenica</B></TD>
		<TD><B>Luned&igrave;</B></TD>
		<TD><B>Marted&igrave;</B></TD>
		<TD><B>Mercoled&igrave;</B></TD>
		<TD><B>Gioved&igrave;</B></TD>
		<TD><B>Venerd&igrave;</B></TD>
		<TD><B>Sabato</B></TD></TR>
	<TR>
		<TD COLSPAN=7></TD>
	</TR>
	
	<TR ALIGN='center'>
	<?php
}

function drawFooterCalendar($link){
	echo "\n</TABLE><BR><BR><A HREF=\"$link\">Mostra Mese Corrente</A></DIV>";
}

function drawCellRoom($num_room,$link_booking,$date){
	?>
	<tr>
	    	<td class="cellaStanza"><?php echo $num_room;?></td>
	<td 
		bgcolor="white" 
		onmouseout="this.bgColor='white';" 
		onmouseover="this.bgColor='gold';" 
		onclick="window.location.href='<?php echo $link_booking."?id_room=".$num_room."&date_in=".$date ?>'">
		<img alt="" src="images/empty.gif"/>CLIENTE</td>
  	</tr>
	<?php 
}

function drawDay($day,$link_booking,$date) {
?>
<TD>
<table class="cellaCalendario">
  <tr>
  	<th></th>
    <th class="cellaCalendario"><?php echo $day;?></th>
  </tr>
  
  <?php 
  for ($i=1;$i<=9;$i++){
  	drawCellRoom($i,$link_booking,$date);
  }
  ?>
</table>
</TD>
<?php
}
?>