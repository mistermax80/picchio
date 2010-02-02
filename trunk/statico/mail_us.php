<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Hotel - La Villa</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	
	<link type="text/css" href="jquery-ui/css/sunny/jquery-ui-1.7.2.custom.css" rel="stylesheet" />	
	<script type="text/javascript" src="jquery-ui/js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="jquery-ui/js/jquery-ui-1.7.2.custom.min.js"></script>
	<script type="text/javascript">
				$(function() {
					$("#in").datepicker({dateFormat: 'dd-mm-yy'});
					$("#out").datepicker({dateFormat: 'dd-mm-yy'});
				});
	</script>	
</head>

<body>
<div id="main_container_price">
	<div class="center_content">
	<div id="header">
    	<!--<div id="logo"><a href="index.html"><img src="images/logo.png" alt="" title="" border="0" /></a></div>-->
        
        <div id="menu">
            <ul>                                              
                <li><a href="index_us.html" title="">Home</a></li>
                <li><a href="gallery_us.html" title="">Gallery</a></li>
                <li><a href="restorant_us.html" title="">Restaurant</a></li>
                <li><a class="current" href="price_us.html" title="">Rates</a></li>
                <li><a href="about_us.html" title="">Directions</a></li>
                <li><a href="index_us.html" title=""><img src="images/ita.png"/></a></li>
            </ul>
        </div>
        
        <div class="top_text">
        <p></p>
        <a href="#" class="testimonial"></a>
        </div>
    
  </div>
  
  
  <div class="main_content">
  <div class="main_content_top"></div>
  	
    
<?php
//Funzioni di supporto
function ControlloEmail($email){
	$result = eregi("^[_a-z0-9+-]+(\.[_a-z0-9+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+$",$email);
	if($result == false){
		return false;
	}else{
		return true;
	}
}
//**************************
//Costanti mail
$mail_from = "MailWeb <no-replay@lavillahotel.com>";
$mail_to = "La Villa Hotel <info@lavillahotel.com>";
//**************************

if(isset($_POST['send']) && $_POST['send']!=""){
	if(isset($_POST['surname']) && $_POST['surname']!="" && 
		isset($_POST['email']) && $_POST['email']!="" &&
		isset($_POST['message']) && $_POST['message']!=""){
			if(!ControlloEmail($_POST['email'])){
				?>
				<script type="text/javascript">
					alert("ERROR Mail is not valid!");
					history.back();
				</script>
				<?php
			}else{
				//Setup mail
				$surname = stripslashes($_POST['surname']);
				$name = stripslashes($_POST['name']);
				$mail_reply = stripslashes($_POST['email']);
				$phone = stripslashes($_POST['phone']);
				$cell = stripslashes($_POST['cell']);
				$in = stripslashes($_POST['in']);
				$out = stripslashes($_POST['out']);
				$message = stripslashes($_POST['message']);
				//Send mail
				$header = "Content-Type: text/plain; "
				."charset=UTF-8; format=flowed\n"
				."MIME-Version: 1.0\n"
				."Content-Transfer-Encoding: 8bit\n";
				//$header .= "To: ".$mail_to."\n";
				$header .= "From: ".$mail_from."\n"; //Inviante <mail@mail.mail>
				$header .= "Reply-To: ".$surname." ".$name."<".$mail_reply.">\n";
				//$header .= "CC: Altro Ricevente <mail@mail.mail>\n";
				//$header .= "Bcc: Ricevente Nascosto <mail@mail.mail>\n";
				$header .= "X-Mailer: Modulo online per invio mail\n\n";
				
				$oggetto = "Richiesta informazione online Hotel La Villa";
				
				$messaggio .= "Richiesta informazioni da: ".$surname." ".$name."\n\n";
				$messaggio .= "Data Arrivo:   ".$in."\n";
				$messaggio .= "Data Partenza: ".$out."\n";
				$messaggio .= "Telefono:      ".$phone."\n";
				$messaggio .= "Cellulare:     ".$cell."\n";
				$messaggio .= "----------MESSAGGIO-----------\n";
				$messaggio .= $message."\n";
				$messaggio .= "------------------------------\n";
				$messaggio .= "\n";
				
				$messaggio = wordwrap($messaggio,70);
	
				$sended = mail($mail_to,$oggetto,$messaggio,$header);
				if($sended){
				?>
					<script type="text/javascript">
						alert("Successfully send Mail, thank you!");
						window.location.href="index_us.html";
					</script>
				<?php
				}else{
				?>
					<script type="text/javascript">
						alert("ERROR, mail not sent!\n Try again or use your Mail!");
						window.location.href="index_us.html";
					</script>
				<?php
				}
			}	
		}else{
			?>
			<script type="text/javascript">
				alert("Please fill in all the required fields!");
				history.back();
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
			<td><input type="text" id="in" name="in"/></td>
		</tr>
		<tr>
			<td>Date check-out</td>
			<td><input type="text" id="out" name="out"/></td>
		</tr>
		<tr>
			<td>Message *</td>
			<td><textarea name="message" rows="10" cols="40"></textarea></td>
		</tr>
		<tr>
			<td>* Please fill in all the required fields</td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td><button value="submit">Enter</button></td>
		</tr>
	</table>
</form>
	 
<?php
}
?>
  </div>    
</div>
                
  <div id="footer">
     	<div class="copyright">
			<a href="http://csstemplatesmarket.com"><img src="images/csstemplatesmarket.gif" border="0" alt="" title="" /></a>
        </div>
        <div class="footer_links"> 
      		© Copyright 2002 - 2010 La Villa Hotel ekto sas - All rights reserved P. Iva 07029801003        
        </div>
    
    
</div>
</body>
</html>	
