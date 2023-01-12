<?php include'inc/header.php';?>
<?php
$login = Session::get("custlogin");
if($login == false){
	header("location:login.php");
}
?>
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="notfound">
				<h2><span>404</span> Not Found</h2>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php include'inc/footer.php';?>