<?php
    include("includes/connection.php");
    session_start();
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
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
<body>
<div class="sidebar"></div>
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
  <h3 class="w3-bar-item">Steps:</h3>
  <a href="captionorupload.php" class="w3-bar-item w3-button">1. Caption or Upload image.</a>
  <a href="addtext.php" class="w3-bar-item w3-button">2. Add text.</a>
  <a href="Sendshare.php" class="w3-bar-item w3-button">3. Send and Share</a>
</div>
<style>

#output_image
	{
	 max-width:300px;
	}
	
body {font-family: "Lato", sans-serif;}

.tablink {
    background-color: #555;
    color: white;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 17px;
    width: 50%;
}

.tablink:hover {
    background-color: #777;
}

/* Style the tab content */
.tabcontent {
    color: white;
    display: none;
    border: 1px solid #ccc;
    border-top: none;
    text-align: center;
}

.main{
    margin-left: 25%;
}
#Caption {background-color:#0275d8;}
#Upload {background-color:grey;}
</style>
<div class="main">
<button class="tablink" onclick="openCity('Caption', this, '#0275d8')" id="defaultOpen"><centre>Caption</centre></button>
<button class="tablink" onclick="openCity('Upload', this, 'grey')">Upload</button>

<div id="Caption" class="tabcontent">
 <style> 
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    /*background-position: 10px 10px; */
    background-repeat: no-repeat;
    
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
</style>

<?php
	
	
	include("includes/connection.php");
	
	
	$sql= "select * from raw_images order by img_id desc";
	$result=mysqli_query($conn, $sql);
	$result=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_array($result))
	{ ?>
		<div onclick="location.href='addtext.php?image=<?php echo $row['image']?>';">
		
		<img src="<?php echo $row['image']?>" width="20%" height="auto">
		<?php
		echo "<br>";
		echo $row["description"];
		?>
		</div>

		<?php
		
		}	
		?>
	
	
	
	
	

</div>

<div id="Upload" class="tabcontent">
<style> 
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
   
    background-repeat: no-repeat;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
</style>

<form role="form" class="form-horizontal" id="file-form" action="insert_rawimage.php" method="post" enctype="multipart/form-data" style="padding:50px;">
	   
  
	 
	  <div class="form-group">
	  <label for="description" class="control-label col-md-3">Description for the image</label>
	  <div class="col-md-6">
	  <textarea  type="text" name="description" id="description" class="form-control" rows="5"></textarea>
	  </div>
	  </div>

	  <div class="form-group">
	  <label for="image" class="control-label col-md-3">Upload Image: </label>
	  <div class="col-md-6">
	  <input type="file" name="pic" id="pic" accept=" image/*" onchange="preview_image(event)" class="form-control ">
	  <img id="output_image"/ style="padding: 10px;">
	  <br>
	  
	
	  </div>
	  </div>
	  <div class="form-group">
	  <input type="submit" name="submit" id="submit" value="Post" class="btn btn-success" style="background-color: #333333; color: white;">
	  </div>
	
	</form>
	
</div>
</div>


<script>
function openCity(cityName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(cityName).style.display = "block";
    elmnt.style.backgroundColor = color;
    evt.currentTarget.className += "active";

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script type='text/javascript'>
	function preview_image(event) 
	{
	 var reader = new FileReader();
	 reader.onload = function()
	 {
	  var output = document.getElementById('output_image');
	  output.src = reader.result;
	 }
	 reader.readAsDataURL(event.target.files[0]);
	}
	</script>
 
