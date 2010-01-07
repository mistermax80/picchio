<?php 
function drawOpenPage() {
	include 'include/header.php';
	?>
		<div align="center" style="height: 30px;">
		</div>
	<!-- Apertura div pagina -->
		<div class="pagina">
		<!-- Apertura div contenuti -->
			<div id="contenuti">
	<?php
}


function drawClosePage($type=NULL,$id=NULL) {
	?>
	</div>
	</div>
	<!-- Chiusura div contenuti -->
	<div id="menu">
	<?php
	if($type=="id_booking"){
		include_once 'function/function_booking.php';
		include_once 'function/function_date.php';
		$booking = getBookingById($id);
		$date_stamp_in = date2dateStamp($booking['date_in']);
		$id_room = $booking['room'];
		$id_client = $booking['client'];
		?>
			<div id="item_menu" onclick="window.location.href='index.php'">
				Mese Corrente
			</div>
			<div id="item_menu" onclick="window.location.href='booking.php?id_room=<?php echo $id_room;?>
									&date_stamp_in=<?php echo $date_stamp_in;?>&id_client=<?php echo $id_client;?>'">
				Torna a prenotazione
			</div>
			<div id="item_menu" onclick="window.location.href='add_visitor.php?id_booking=<?php echo $id;?>'">
				Aggiungi Visitatore
			</div>
			<div id="item_menu" onclick="window.location.href='modific_booking.php?id_booking=<?php echo $id;?>'">
				Modifica Prenotazione
			</div>
			<div id="item_menu" onclick="window.location.href='delete_booking.php?id_booking=<?php echo $id;?>'">
				Elimina prenotazione
			</div>
			<div id="item_menu" onclick="window.location.href='option_booking.php?id_booking=<?php echo $id;?>'">
				Servizi Stanza
			</div>
			<div id="item_menu" onclick="window.location.href='report.php?id_booking=<?php echo $id;?>'">
				Crea notificato
			</div>
	<?php
	}else{
		?>
			<div id="item_menu" onclick="window.location.href='index.php'">
				Mese Corrente
			</div>
			<div id="item_menu" onclick="window.location.href='modific_client.php'">
				Clienti
			</div>
			<div id="item_menu" onclick="window.location.href='room.php'">
				Stanze
			</div>
			<div id="item_menu" onclick="window.location.href='option.php'">
				Invio notificazione
			</div>
		<?php
	}
	?>
		<div id="little_calendar">
			<table>
				<thead>
					<tr>
						<th abbr="Monday" scope="col" title="Monday">M</th>
						<th abbr="Tuesday" scope="col" title="Tuesday">T</th>
						<th abbr="Wednesday" scope="col" title="Wednesday">W</th>
						<th abbr="Thursday" scope="col" title="Thursday">T</th>
						<th abbr="Friday" scope="col" title="Friday">F</th>
						<th abbr="Saturday" scope="col" title="Saturday">S</th>
						<th abbr="Sunday" scope="col" title="Sunday">S</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td abbr="September" colspan="3" id="prev"><a href="#" title="View posts for September 2009">&laquo; Sep</a></td>
						<td class="pad">&nbsp;</td>
						<td colspan="3" id="next">&nbsp;</td>
					</tr>
				</tfoot>
				<tbody>
					<tr>
						<td>1</td>
						<td>2</td>
						<td>3</td>
						<td id="today">4</td>
						<td>5</td>
						<td>6</td>
						<td>7</td>
					</tr>
					<tr>
						<td>8</td>
						<td>9</td>
						<td>10</td>
						<td>11</td>
						<td>12</td>
						<td>13</td>
						<td>14</td>
					</tr>
					<tr>
						<td>15</td>
						<td>16</td>
						<td>17</td>
						<td>18</td>
						<td>19</td>
						<td>20</td>
						<td>21</td>
					</tr>
					<tr>
						<td>22</td>
						<td>23</td>
						<td>24</td>
						<td>25</td>
						<td>26</td>
						<td>27</td>
						<td>28</td>
					</tr>
					<tr>
						<td>29</td>
						<td>30</td>
						<td>31</td>
						<td class="pad" colspan="4">&nbsp;</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	
	<?php
	include 'include/footer.php';
}
?>