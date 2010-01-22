<?php
//**************************
//Costanti mail
$mail_from = "info@lavillahotel.com";
$mail_to = "stmontori@libero.it";
//**************************

if(isset($_POST['send']) && $_POST['send']!=""){
	if(isset($_POST['surname']) && $_POST['surname']!="" && 
		isset($_POST['email']) && $_POST['email']!="" &&
		isset($_POST['message']) && $_POST['message']!=""){
			//Setup mail
			$surname = $_POST['surname'];
			$name = $_POST['name'];
			$mail_reply = $_POST['email'];
			$phone = $_POST['phone'];
			$cell = $_POST['cell'];
			$in = $_POST['in'];
			$out = $_POST['out'];
			$message = $_POST['message'];
			//Send mail
			$header = "Content-Type: text/plain; "
			."charset=UTF-8; format=flowed\n"
			."MIME-Version: 1.0\n"
			."Content-Transfer-Encoding: 8bit\n";
			$header .= "To: ".$mail_to."\n";
			$header .= "From: ".$mail_from."\n"; //Inviante <mail@mail.mail>
			$header .= "Reply-To: ".$surname." ".$name."<".$mail_reply.">\n";
			//$header .= "CC: Altro Ricevente <mail@mail.mail>\n";
			//$header .= "Bcc: Ricevente Nascosto <mail@mail.mail>\n";
			$header .= "X-Mailer: Modulo online per invio mail\n\n";
			
			$oggetto = "Richiesta informazione online Hotel La Villa";
			
			$messaggio .= "Richiesta info da:".$surname." ".$name."\n";
			$messaggio .= "in:".$in."\n";
			$messaggio .= "out:".$out."\n";
			$messaggio .= "phone:".$phone."\n";
			$messaggio .= "cell:".$cell."\n";
			$messaggio .= "-----------------------------\n";
			$messaggio .= $message."\n";
			$messaggio .= "-----------------------------\n";
			$messaggio .= "\n";
			
			$messaggio = wordwrap($messaggio,70);

			$sended = mail($mail_to,$oggetto,$messaggio,$header);
			if($sended){
				echo "Successfully send Mail!";
			}else{
				echo "ERROR, mail not sent!";
			}	
		}else{
			?>
			<script type="text/javascript">
				alert("Please fill in all the required fields!");
			</script>
			<?php
		}
}else{
?>
<form id="mail" name="mail" method="post">
	<input type="hidden" name="send" value="true"/>	
	<table align="center">
		<tr>
			<td>Surname *</td>
			<td><input type="text" name="surname"/></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name"/></td>
		</tr>
		<tr>
			<td>Email *</td>
			<td><input type="text" name="email"/></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><input type="text" name="phone"/></td>
		</tr>
		<tr>
			<td>Mobile</td>
			<td><input type="text" name="cell"/></td>
		</tr>
		<tr>
			<td>Date check-in</td>
			<td><input type="text" name="in"/></td>
		</tr>
		<tr>
			<td>Date check-out</td>
			<td><input type="text" name="out"/></td>
		</tr>
		<tr>
			<td>Message *</td>
			<td><textarea name="message" rows="5"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><button value="submit">Enter</button></td>
		</tr>
	</table>
</form>
	 * Please fill in all the required fields
<?php
}
?>
	
