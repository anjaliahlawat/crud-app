<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="ajax_demo.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("form").submit(function(event){
                event.preventDefault();
                var name = $("#mail-name").val();
                var email = $("#mail-email").val();
                var gender = $("#mail-gender").val();
                var message = $("#mail-message").val();
                var submit = $("#mail-submit").val();
                $("#form-message").load("mail.php", {
                	 name:name,
                	 email:email,
                	 gender:gender,
                	 message:message,
                	 submit:submit
                });
			});
		});
	</script>

</head>
<body>

   <form action="mail.php" method="POST">
   	  <input id="mail-name" type="text" name="name" placeholder="name"><br/>
   	  <input id="mail-email" type="text" name="email" placeholder="E-mail"><br/>
   	  <select id="mail-gender" class="gender" name="gender">
   	  	 <option value="male">Male</option>
   	  	 <option value="female">Female</option>
   	  </select><br/>
   	  <textarea id="mail-message" name="message" placeholder="Message"></textarea><br/> 
   	  <button id="mail-submit" type="submit" name="submit">Send e-mail</button><br/>
   	  <p id="form-message"></p>
   </form>

</body>
</html>