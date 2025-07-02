<!DOCTYPE html>
<html lang="en">

<head>
	<title>The Providers</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="USER/css/stylesheet.css">
	<style>
		body {
			background-image: url('ADMIN/assets/trpl.png');
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
		}

		.cob {
			background-color: white;
			padding: 20px;
		}
		.title{
			color: black;
		}
	</style>
</head>

<body>

	<div class="main">
		<div class="logo"></div>
		<div class="cob">
			<div class="title">Login</div>
			<form method="post" action="login.php">
				<div class="credentials">
					<div class="username">
						<span class="glyphicon glyphicon-user"></span>
						<input type="text" name="username" placeholder="Username" required="">
					</div>
					<div class="password">
						<span class="glyphicon glyphicon-lock"></span>
						<input type="password" name="password" placeholder="Password" required="">
					</div>
				</div>
				<button class="submit">Submit</button>
			</form>
		</div>
	</div>

</body>

</html>