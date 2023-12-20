<?php
session_start();
require '../Controller/connection.php';
if (isSession("type") && isSession("uid") && isSession("pass"))
	header("Location: ../Controller/login.php");
?>
<!DOCTYPE html>
<html>
<title>Login | <?php echo $project_name; ?></title>
<meta charset="UTF-8">
<meta name="author" content="Manav Akela">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w4.css">
<script src="../js/script.js"></script>

<!---favicon start--->
<link rel="apple-touch-icon-precomposed" href="../img/logo.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../img/logo.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../img/logo.png" />
<link rel="shortcut icon" href="../img/logo.png">
<!---favicon stop--->

<style>
	body,
	h1,
	h2,
	h3,
	h4,
	h5,
	h6 {
		font-family: "Lato", sans-serif;
	}

	body,
	html {
		height: 100%;
		color: #777;
		line-height: 1.8;
	}

	.bgimg-1 {
		background-attachment: fixed;
		background-position: top;
		background-repeat: no-repeat;
		background-size: cover;
		background-image: url('../img/bg.jpg');
		min-height: 100%;
	}
</style>
<?php
//background-color: #003769;//#ff9800;//
?>

<body class="bgimg-1">

	<div class="w3-bar w3-top w3-large w3-card-4" style="z-index:4;background-color: #003769;color:#003769;">
		<span class="w3-bar-item" style="background-color:#ff9800;">&#9788; <b><?php echo $project_name; ?></b></span>
		<img src="../img/line.png" style="height:48px;">
		<span class="w3-bar-item0 w3-right w3-hide-small"><img src="../img/logo2.png" style="height:48px;"></span>
		<span class="w3-text-white w3-hide-small w3-right w3-xlarge w3-margin-right">मुख्यमंत्री ग्रामीण सोलर स्ट्रीट लाइट योजना</span>
	</div>

	<div class="w3-display-container" style="height:600px;margin-top:50px;">
		<div class="w3-display-middle w3-padding">
			<div class="w3-panel w3-card w3-round w3-text-white w3-center" style="background-color:rgba(0,0,0,0.3);">
				<img src="../img/logo3.png" alt="Avatar" style="min-width:100px;width:15%;" class="w3-margin-top w3-circle">
				<form class="" action="../Controller/login.php" method="POST">
					<div class="w3-section">
						<label><b>Login Type</b></label>
						<select class="w3-select w3-input w3-border w3-margin-bottom w3-round-xxlarge" name="type" required autofocus>
							<option value="" disabled selected>Choose Login Type</option>
							<option value="1">Master</option>
							<option value="2">Admin</option>
							<option value="4">User</option>
						</select>
						<label><b>User ID</b></label>
						<input class="w3-input w3-border w3-margin-bottom w3-round-xxlarge" type="text" placeholder="Enter User ID" name="uid" required>
						<label><b>Password</b></label>
						<input class="w3-input w3-border w3-margin-bottom w3-round-xxlarge" type="password" placeholder="Enter Password" name="pass" required>
						<button class="w3-btn w3-border w3-round-xxlarge w3-margin-top w3-center" style="width:300px;" type="submit">Login</button>
					</div>
				</form>
				<span class="w3-right w3-padding">
					<!-- <a href="javascript:void(0)" class="w3-padding	" onclick="">Need Help?</a> -->
					<span style="cursor: pointer;" onclick="document.getElementById('modelOpen').style.display='block'">Forgot password?</span>
				</span>
			</div>
		</div>
	</div>

	<div id="modelOpen" class="w3-modal">
		<div class="w3-modal-content w3-animate-top w3-card-4" style="width:300px;">
			<header class="w3-container w3-color" style="background-color: #003769;">
				<span onclick="document.getElementById('modelOpen').style.display='none'" class="w3-button w3-display-topright">X</span>
				<h2>Admin or User</h2>
			</header>
			<div style="padding: 10px;">
				<h5>forgot your password? Please contact your Master</h5>
				<!-- <button class="w3-color w3-button w3-col s12 m12 l12" onclick="newTab()">Open Image In New tag</button> -->
			</div>
		</div>
	</div>

	<?php require "./hiddenElements.php"; ?>

	<script>
		<?php if (isGet("err")) echo 'msg("Username or password missmatch");' ?>
	</script>

</body>

</html>