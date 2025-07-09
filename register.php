<?php
session_start();
include "db.php";
if($_POST)
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);
$q="insert into users(`id`,`username`,`password`) values(null,'$username','$password')";
$s=$dbpdo->prepare($q);
$s->execute();
header("location: login.php");
}
?>


<?php include "sections/header.php"; ?>

<style> 

.card {
	width:400px !important;
	margin:50px auto;
	padding:30px;
	border:1px solid #ddd;
	box-shadow: 10px 10px 10px rgba(0,0,0,0.2);
}

.form-control {
	margin-bottom: 20px !important;
	
}

.w-100 {
	width:100% !important;
}

.card-header {
	
	color:black;
	font-size: 14px;
	font-weight: bold;
	padding:10px;
	margin-bottom: 10px;
}

</style>

<div class="container mt-5">
	
		<div class="card">
			<div class="card-header bg-bar">Register</div>
			<div class="card-body">
				<form method=post>
					<div class="mb-3">
			<input type=text name=username class="form-control" placeholder="username">			
					</div>

					<div class="mb-3">
			<input type=password name=password class="form-control" placeholder="password">			
					</div>

					<button type=submit class="btn btn-primary w-100">Register</button>

				</form>
			</div>
		</div>
	
</div>



<?php include "sections/footer.php"; ?>