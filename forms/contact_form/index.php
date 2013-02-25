<?php
	if (!empty($_POST)) {
		require_once('email.php');

		$email = new HQ_Email('jasondmaurer@gmail.com', '[SUBJECT]');
		$email->set($_POST['fullname'], $_POST['email'], $_POST['message']);
		$email->send();
	}
?>

<html>
<head>

	<title>Sample Contact Form</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />

</head>
<body>

	<form method="post" class="form-horizontal well">
		<div class="control-group">
			<label class="control-label" for="fullname">Full Name:</label>
			<div class="controls">
				<input type="text" name="fullname" id="fullname" placeholder="Full Name" />
				<span class="help-block"></span>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="email">Email:</label>
			<div class="controls">
				<input type="text" name="email" id="email" placeholder="Email" />
				<span class="help-block"></span>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="message">Message:</label>
			<div class="controls">
				<textarea name="message" id="message" placeholder="Message"></textarea>
				<span class="help-block"></span>
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<input type="submit" id="submit" class="btn btn-primary" />
			</div>
		</div>
	</form>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="validate.js"></script>

</body>
</html>