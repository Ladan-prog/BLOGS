<?php 
session_start();
$msg="";
include "db.php";
if($_POST)
{
$username=$_POST['username'];
$password=md5($_POST['password']);
$user=$dbpdo->query("select * from users where username='$username' and password='$password'")->fetch(PDO::FETCH_OBJ);
if($user)
{
	$_SESSION['articleuser']='$username';
	$_SESSION['articleuserid']='$user->id';
	header("location: postarticle.php");
}
else 
{
	$msg="invalid Login";
}

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

<div class="container " >
	
		
		<div class="card">
			<div class="card-header">Login</div>
			<div class="card-body">
				
				<form method=post>
					<div class="mb-3">
			<input type=text name=username class="form-control" placeholder="username">			
					</div>

					<div class="mb-3">
			<input type=number name=password class="form-control" placeholder="password">			
					</div>

					<button type=submit class="btn btn-primary w-100">Login</button>

					<div class="h4 text-danger  mt-3 text-center"><?php echo $msg ?></div>

				</form>


			<div class="register">Don't Have an Account ? <a href="register.php">Click Here</a>	</div>
			</div>
		
	</div>
</div>



<?php include "sections/footer.php"; ?>