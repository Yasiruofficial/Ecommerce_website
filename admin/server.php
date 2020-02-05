<?php 

	session_start();

//---------------------------------------------------------------------
	$_SESSION['errors'] = array(); 
//---------------------------------------------------------------------

	include_once('conn.php');

//---------------------------------------------------------------------

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['aname']);
    header('location: index.php');
  }

//---------------------------------------------------------------------

	if (isset($_POST['asignin'])) {

		$aname = mysqli_real_escape_string($db, $_POST['aname']);
		$apass = mysqli_real_escape_string($db, $_POST['apass']);

		if (count($errors) == 0) {

			$query = "SELECT * FROM admins WHERE aname='$aname' AND apass='$apass'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['aname'] = $aname;
				header('location: dashboard.php');
			}else {
				array_push($_SESSION['errors'], "Wrong aname/apass combination");
				header('location:index.php');
			}
		}
	}

//---------------------------------------------------------------------

	if(isset($_POST["image"]))
	{

	$imageData = $_POST["image"];
	$image_array_1 = explode(";", $imageData);

	$image_array_2 = explode(",", $image_array_1[1]);
	$imageData = base64_decode($image_array_2[1]);

	$imageName = time() . $imageData;
	$imageName = md5($imageName);
	$imageName = $imageName . ".png";

	echo "Image Sucsessfully Added : " . $imageName . "<br>";
	echo "time : " . time();

	$_SESSION["imageName"] = $imageName; // yasiru.png

	$imagePath = "../images/products/". $imageName;

	$_SESSION["imagePath"] =  $imagePath; // productdp/yasiru.png
	$_SESSION["imageData"] =  $imageData;
	unset($_POST["image"]);

	}

//---------------------------------------------------------------------

if( (isset($_POST["addbtn"])))
{
	if(isset($_SESSION["imageData"]))
	{

		$name = $_SESSION['aname'];
		$q = "SELECT aid FROM admins WHERE aname = '" . $name ."'";
		$result = mysqli_query($db,$q);
		$aid = mysqli_fetch_row($result);

		$imageName = $_SESSION["imageName"];
		$imageData = $_SESSION["imageData"];
		$imagePath = $_SESSION["imagePath"];

		file_put_contents($imagePath, $imageData);

		$pname = mysqli_real_escape_string($db, $_POST['pname']);
		$pprice = mysqli_real_escape_string($db, $_POST['pprice']);
		$pcat = mysqli_real_escape_string($db, $_POST['pcat']);
		$pdes = mysqli_real_escape_string($db, $_POST['pdes']);
		$ppid = mysqli_real_escape_string($db,$imagePath);

		$query = "INSERT INTO products(pname,pprice,pcat,pdes,ppid,aid) VALUES ('$pname',$pprice,'$pcat','$pdes','$ppid',$aid[0])";

		$results = mysqli_query($db, $query);

		if ($results) 
		{
			unset($_SESSION["imageName"]);
			unset($_SESSION["imageData"]);
			unset($_SESSION["imagePath"]);
			header('location: dashboard.php');
		}
		else
		{
			unset($_SESSION["imageName"]);
			unset($_SESSION["imageData"]);
			unset($_SESSION["imagePath"]);
			echo "Item Not Uploaded !!<br>";
			echo "<a href='add.php' class'btn btn-danger'>Back To ADDItems</a>";
		}
	}
	else
	{

			unset($_SESSION["imageName"]);
			unset($_SESSION["imageData"]);
			unset($_SESSION["imagePath"]);
			array_push($_SESSION['errors'], "Please Crop The Image");
			header('location:add.php');
	}
}

?>

<?php 
  if(isset($_POST['pid']))
  {
    $pid = $_POST['pid'];
    $q = "DELETE FROM products WHERE pid = $pid";
    $q2 = "SELECT ppid FROM products WHERE pid = $pid";

    $result = mysqli_query($db,$q2);
    $row = mysqli_fetch_row($result);

    if(mysqli_query($db,$q)){

    	if (unlink($row[0])) {

    		echo "Item AND Image Deleted Sucsessfully!!";
    	}
    	else
    	{
    		echo "Item Deleted Sucsessfully!! BUT Image Delete Fail!!";
    	}

    } 
    else{
    	echo "Item Delete Fail!!";
    } 

  }
?>