<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<meta http-equiv='Content-Type' content='text/html' charset='utf-8 ' />
	<meta name='viewport' content='width=device-width, initial-scale=1' />
	<meta name='author' content='Jagmeet Sigh and Navdeep Singh' />
	<link rel='stylesheet' type='text/css' href='css/demo.css' />
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/animate-custom.css' />
	<link rel='stylesheet' href='css/bootstrap.min.css' />
	<script type='text/javascript'>
		function _validate() {
		var emVal, nmVal, MessVal;
		var _email = document.getElementById('email').value;
		var _name = document.getElementById('name').value;
		var _message = document.getElementById('message').value;
		var _lblError = document.getElementById('lblError');

		if (_email != '' || _email != null) {
		var b = _emailValidator(_email);
		if (b == false) {
		_lblError.innerHTML = 'Invalid Email';
		emVal = false;
		}
		else {
		emVal = true;
		if (_name == '' || _name == null) {
		_lblError.innerHTML = 'Enter Your Name';
		nmVal = false;
		}
		else {
		nmVal = true;
		if (_message == '' || _message == null) {
		_lblError.innerHTML = 'Enter your message';
		MessVal = false;
		}
		else {
		MessVal = true;
		if (emVal == true && nmVal == true && MessVal == true) {
		alert('Message Submitted Successfuly We will Contact You Soon.');
		postIt();

		}

		}
		}
		}
		}

		else {
		_lblError.innerHTML = 'Enter Email ID';
		emVal = false;
		}


		}
		function _emailValidator(_email) {
		var a;
		var lastAtPos = _email.lastIndexOf('@');
		var lastDotPos = _email.lastIndexOf('.');
		if (lastAtPos < lastDotPos && lastAtPos > 0 && lastDotPos > 2 && (_email.length - lastDotPos) > 2) {
		a = true;
		}
		else {
		a = false;
		}
		return a;
		}
		function hideIt() {
		document.getElementById('lblError').innerHTML = '';
		}
		function postIt() {
		document.forms['_form'].submit();
		}
	</script>
</head>
<body>

<?php
	require 'navigation.php';
?>
	<div class='container'>
		<header>
				<h1 class='center white'>Contact Us</h1> 
        </header>
    <section>
       	 <div id='container_demo' >      
            <div id='wrapper'>
                <div id='login' class='animate form'>
						<form id='contact_form' action='feedback.php' method='POST'>
						<?php
						if ($_SESSION['id']=="") {
						echo "<p> 
								<label for='name' class='uname' data-icon='u'>Your Name:</label>
								<input id='name' class='input' name='name' required='required' type='text' value='' size='30' placeholder='Name' /><br />
							</p> 
							<p> 
								<label for='email' class='youmail' data-icon='e'>Your Email:</label>
								<input id='email' class='input' name='email' type='text' required='required' size='30' placeholder='Email'/><br />
							</p>"; 
						}
						?>
							<p> 
								<label for='message'>Your Message:</label>
								<textarea id='message' class='input' name='message' required='required' rows='5' cols='30' style='width:386px;' placeholder='Message'></textarea><br />
							</p> 
							<p> 
								<label id='lblError'>&nbsp;</label>
							<p> 
							<p class='login button'><input type='submit' class='btn btn-lg btn-success' id='_submit' value='Submit'></p>
						</form>						
				</div>
			</div>
		</div>
	</div>		
	</section>
	<div id='footer'>
		Copyright © WeatherPredictor.com
	</div>
</body>
</html>
