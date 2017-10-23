<?php
    include("includes/connection.php");
    session_start();
	
	$image=$_GET['image'];
    $admin_result = 0;
    if(isset($_SESSION['uid']))
    {
        $id = $_SESSION['uid'];
        $admin_query = "SELECT admin FROM `users` WHERE id = $id";
        $admin_result = mysqli_query($conn,$admin_query);
        $admin_result = mysqli_fetch_array($admin_result);
    }
?>
<?php include("includes/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<div class="sidebar"></div>
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
  <h3 class="w3-bar-item">Steps:</h3>
  <a href="captionorupload.php" class="w3-bar-item w3-button">1. Caption or Upload image.</a>
  <a href="addtext.php" class="w3-bar-item w3-button">2. Add text.</a>
  <a href="Sendshare.php" class="w3-bar-item w3-button">3. Send and Share</a>
</div>


<style >
.main{
    margin-left: 25%;
}
  input[type=text] {
    width: 200px;
    height: 60px;
    margin-left: 40%;
    margin-top: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 10px;
    font-size: 16px;
    background-color: white;
    align-self: center;
    transition: width 0.4s ease-in-out;
}
.button
{
  background-color: #0275d8;
  width: 200px;
  height: 60px;
  margin-top: 10px;
  border-radius: 10px;
  margin-left: 40%;
}

</style>
<div class="main">

<img src="<?php echo $image;?>">
<form>

<input type="text" name="Enter Top Text" placeholder="Top Text">
<input type="text" name="Enter Middle Text" placeholder="Middle Text">
<input type="text" name="Enter Bottom Text" placeholder="Bottom Text">
<button class="button" onclick="">Generate</button>
</form>
</div>
<?php include('includes/footer.php');?>