<?php

include_once '_base.inc.php';

include_once 'function_booking.php';

/*
 Please keep the following lines if you will use this script. Thanks!
 ---------------------------------------------------------------------------
 CALENDAR SCRIPT
 Developed by : Steven Rebello (stevenrebello@indiatimes.com)
 Developed on : 15 September 2001
 Description : Prints a calendar for specified month and year in HTML

 ---------------------------------------------------------------------------
 */

//----------------- This function prints calendar---------------------
function  drawCalendar($link,$link_booking,$mon,$year)
{
	global $dates, $first_day, $start_day;

	$first_day = mktime(0,0,0,$mon,1,$year);
	$start_day = date("w",$first_day);
	$res = getdate($first_day);
	$month_name = $res["month"];
	$no_days_in_month = date("t",$first_day);

	//If month's first day does not start with first Sunday, fill table cell with a space
	for ($i = 1; $i <= $start_day;$i++)
	$dates[1][$i] = " ";

	$row = 1;
	$col = $start_day+1;
	$num = 1;
	while($num<=31)
	{
		if ($num > $no_days_in_month)
		break;
		else
		{
			$dates[$row][$col] = $num;
			if (($col + 1) > 7)
			{
				$row++;
				$col = 1;
			}
			else
			$col++;
			$num++;
		}//if-else
	}//while
	$mon_num = date("n",$first_day);
	$temp_yr = $next_yr = $prev_yr = $year;

	$prev = $mon_num - 1;
	$next = $mon_num + 1;

	//If January is currently displayed, month previous is December of previous year
	if ($mon_num == 1)
	{
		$prev_yr = $year - 1;
		$prev = 12;
	}

	//If December is currently displayed, month next is January of next year
	if ($mon_num == 12)
	{
		$next_yr = $year + 1;
		$next = 1;
	}

	//Disegna l'intestazione della tabella principale
	drawHeaderCalendar($link,$prev,$prev_yr,$first_day,$temp_yr,$next,$next_yr);

	$end = ($start_day > 4)? 6:5;

	for ($row=1;$row<=$end;$row++)
	{
		for ($col=1;$col<=7;$col++)
		{
			if ($dates[$row][$col] == "")
			$dates[$row][$col] = " ";

			if (!strcmp($dates[$row][$col]," "))
			$count++;

			$t = $dates[$row][$col];

			//Se giorno corrente evidenzialo
			if (($t == date("j")) && ($mon == date("n")) && ($year == date("Y"))){
				//echo "\n<TD BGCOLOR='aqua'><a href=\"$link_booking?date_in=$day\">".$t."</a></TD>";
				$date = mktime(0,0,0,$mon,$t,$year);
				drawDay($date,$link_booking,true);
			}else{
				//Se data fuori dal mese metti uno spazio, altrimenti scrivi il giorno
				//echo "\n<TD>".(($t == " " )? " " :"<a href=\"$link_booking?date_in=$day\">".$t."</a>")."</TD>";
				//echo ($t == " " )? " " : drawDay($t);
				if($t == " "){
					echo "<TD></TD>";
				}else{
					$date = mktime(0,0,0,$mon,$t,$year);
					drawDay($date,$link_booking);
				}
			}
		}// for -col

		if (($row + 1) != ($end+1)){
			echo "</TR>";
			echo "<!-- Fine Riga Cella -->";
			echo "<!-- Inizio Riga Cella -->";
			echo "<TR>";
		}else{
			echo "</TR>";
			echo "<!-- Fine Riga Cella Totale-->";
		}
	}// for - row
	drawFooterCalendar($link);
}

function drawSelectHeaderCalendar($link,$m_corr,$y_corr){
	$months = array("Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno",
				"Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre");

	?>
	<select id="month" name="month" class="headerCalendar"
		onchange="window.location.href='<?php echo $link."?month='+this.options[this.selectedIndex].value+'&year=".$y_corr;?>'">
	<?php
	
	$m = 1;
	foreach($months as $month){
		if($m == $m_corr){
			echo "<option value=\"".$m."\" selected=\"selected\">".$month."</option>";
		}else{
			echo "<option value=\"".$m."\">".$month."</option>";
		}
		$m++;
	}
	?>
	</select>
	
	<select id="year" name="year" class="headerCalendar"
		onchange="window.location.href='<?php echo $link."?year='+this.options[this.selectedIndex].value+'&month=".$m_corr;?>'">
	<?php
	//$mon == date("n")
	for($year=2005;$year<=2030;$year++){
		if($year == $y_corr){
			echo "<option value=\"".$year."\" selected=\"selected\">".$year."</option>";
		}else{
			echo "<option value=\"".$year."\">".$year."</option>";
		}
	}
	?>
	</select>
	<?php
}

function drawHeaderCalendar($link,$prev,$prev_yr,$first_day,$temp_yr,$next,$next_yr){
?>
<!-- Apertura div header -->
<div align="center">
	<div class="mese" align="center">
		<div class="meseNext">
			<img onclick="window.location.href='<?php echo $link."?month=".$next."&year=".$next_yr;?>';" 
				src="images/next.png" alt="Mese Successivo" title="Mese Successivo"  style="cursor: pointer;">
		</div>

		<div class="mesePrev">
			<img onclick="window.location.href='<?php echo $link."?month=".$prev."&year=".$prev_yr;?>';" 
				src="images/prev.png"  alt="Mese Precedente" title="Mese Precedente" style="cursor: pointer;">
		</div>

		<div  class="meseSelect">
				<?php drawSelectHeaderCalendar($link,date("m",$first_day),$temp_yr);?>
		</div>
	</div>
</div>
<!-- Chisura div header -->
<!-- Apertura div pagina -->
<div class="pagina">
	<div id="calendario">
	<div id="calendario_tabella_intestazione">
		<table align="center">
		<TR ALIGN='center'>
			<TD><B>Domenica</B></TD>
			<TD><B>Luned&igrave;</B></TD>
			<TD><B>Marted&igrave;</B></TD>
			<TD><B>Mercoled&igrave;</B></TD>
			<TD><B>Gioved&igrave;</B></TD>
			<TD><B>Venerd&igrave;</B></TD>
			<TD><B>Sabato</B></TD>
		</TR>
		<TR>
			<TD COLSPAN=7></TD>
		</TR>
		</table>
	</div>
	<div id="calendario_tabella_giorni">
		<table align="center" >
		<TR ALIGN='center'>
<?php
}

function drawFooterCalendar($link){
	echo "</table>";
	echo "</div> <!-- Chiusura div Tabella Giorni -->";
	//Viene chiusa direttamente in drawClosePage che è un div comune a calendario o a contenuti
	//echo "</div> <!-- Chiusura div Calendario -->";
}

function drawCellRoom($num_room,$link_booking,$date_stamp){
	?>
	<tr>
		<td><?php echo $num_room;?></td>
		<?php
		$booking = getBooking($date_stamp,$num_room);
		$id_client = $booking['id_client'];
		if($booking){
			//Stanza Occupata
			?>
		<td class="cellaStanza" align="left" bgcolor="#ffa09a" onmouseout="this.bgColor='#ffa09a';"
			onmouseover="this.bgColor='fdff8f';"
			onclick="window.location.href='<?php echo $link_booking."?id_room=".$num_room."&date_stamp_in=".$date_stamp."&id_client=".$id_client."&mode=update"; ?>'">
			<?php echo $booking['surname'];?>
		</td>
			<?php
		}else{
			//Stanza Libera
			?>
		<td class="cellaStanza" bgcolor="#b6ffb6" onmouseout="this.bgColor='#b6ffb6';"
			onmouseover="this.bgColor='fdff8f';"
			onclick="window.location.href='<?php echo $link_booking."?id_room=".$num_room."&date_stamp_in=".$date_stamp."&mode=insert" ?>'">
			<img alt="" src="images/empty.gif" />
		</td>
	</tr>
		<?php
	}

}

function drawDay($date_stamp, $link_booking, $today=false) {
	?>
	<?php if($today) echo "<td><table class=\"cellaCalendarioOggi\">"; else echo "<td><table class=\"cellaCalendario\">";?>
	<tr>
		<th></th>
		<th class="cellaCalendario"><?php echo date("j",$date_stamp);?></th>
	</tr>

	<?php
	for ($i=1;$i<=9;$i++){
		drawCellRoom($i,$link_booking,$date_stamp);
	}
	echo "</table></td>";
}
?>