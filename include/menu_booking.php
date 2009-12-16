<div id="menu">
	<div id="item_menu" onclick="window.location.href='index.php'">
		Mese Corrente
	</div>
	<div id="item_menu" onclick="window.location.href='add_visitor.php?id_booking=<?php echo $booking['id'];?>'">
		Aggiungi Clienti
	</div>
	<div id="item_menu" onclick="window.location.href='modific_booking.php?id_booking=<?php echo $booking['id'];?>'">
		Modifica Prenotazione
	</div>
	<div id="item_menu" onclick="window.location.href='option_booking.php?id_booking=<?php echo $booking['id'];?>'">
		Servizi Stanza
	</div>
	<div id="item_menu" onclick="window.location.href='report.php?id_booking=<?php echo $booking['id'];?>'">
		Crea notificato
	</div>
	<div id="item_menu" onclick="window.location.href='delete_booking.php?id_booking=<?php echo $booking['id'];?>'">
		Elimina prenotazione
	</div>
	
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



</div><!-- Chisura div pagina -->