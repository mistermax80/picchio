<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hotel - La Villa</title>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />	
</head>

<body>
<div id="main_container_price">
	<div class="center_content">
	<div id="header">
    	<!--<div id="logo"><a href="index.html"><img src="images/logo.png" alt="" title="" border="0" /></a></div>-->
        
        <div id="menu">
            <ul>                                              
                <li><a href="index.html" title="">home</a></li>
                <li><a href="gallery.html" title="">galleria</a></li>
                <li><a href="restorant.html" title="">ristorante</a></li>
                <li><a class="current" href="price.html" title="">listino</a></li>
                <li><a href="about.html" title="">dove siamo</a></li>
                <li><a href="index_us.html" title=""><img src="images/usa.png"/></a></li>
            </ul>
        </div>
        
        <div class="top_text">
        <p></p>
        <a href="#" class="testimonial"></a>
        </div>
    
  </div>
  
  
  <div class="main_content_mail">
  <div class="main_content_top"></div>
  	
           
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
				echo "Mail Inviata!";
			}else{
				echo "ERRORE, Mail non Inviata!";
			}	
		}else{
			?>
			<script type="text/javascript">
				alert("Attenzione compila tutti i campi obbligatori!");
			</script>
			<?php
		}
}else{
?>
<form id="mail" name="mail" method="post">
	<input type="hidden" name="send" value="true"/>	
	<table align="center">
		<tr>
			<td>Cognome *</td>
			<td><input type="text" name="surname"/></td>
		</tr>
		<tr>
			<td>Nome</td>
			<td><input type="text" name="name"/></td>
		</tr>
		<tr>
			<td>Email *</td>
			<td><input type="text" name="email"/></td>
		</tr>
		<tr>
			<td>Telefono</td>
			<td><input type="text" name="phone"/></td>
		</tr>
		<tr>
			<td>Cellulare</td>
			<td><input type="text" name="cell"/></td>
		</tr>
		<tr>
			<td>Data check-in</td>
			<td><input type="text" name="in"/></td>
		</tr>
		<tr>
			<td>Data check-out</td>
			<td><input type="text" name="out"/></td>
		</tr>
		<tr>
			<td>Messaggio *</td>
			<td><textarea name="message" rows="5"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><button value="submit">Invia</button></td>
		</tr>
	</table>
</form>
<?php
}
?>
	<div class="left_content">
       * Compilare i campi obbligatori
     </div>           
   </div>    
</div>
                
  <div id="footer">
     	<div class="copyright">
<a href="http://csstemplatesmarket.com"><img src="images/csstemplatesmarket.gif" border="0" alt="" title="" /></a>
        </div>
    	<div class="footer_links"> 
        <a href="#">About us</a>
         <a href="#">Privacy policy</a> 
        <a href="#">Contact us </a>
        
        </div>
    
    
</div>
</body>
</html>
	
