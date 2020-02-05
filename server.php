<?php 
	session_start();

	include_once('conn.php');

	$_SESSION['errors']  = array(); 	  

//---------------------------------------------------------------------------------------------

	if (isset($_GET['logout'])) {
		unset($_SESSION['uemail']);
		unset($_GET['logout']);
		header('location:index.php');

	}

//---------------------------------------------------------------------------------------------

	if (isset($_POST['usignup'])) {

		$uname = mysqli_real_escape_string($db, $_POST['uname']);
		$uemail = mysqli_real_escape_string($db, $_POST['uemail']);
		$upass = mysqli_real_escape_string($db, $_POST['upass']);
		$upass2 = mysqli_real_escape_string($db, $_POST['upass2']);

		if ($upass != $upass2) {

			array_push($_SESSION['errors'] , "The two upasss do not match");
		}

			$query = "SELECT * FROM users WHERE uemail='" . $uemail . "'";

			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) > 0) {

                    array_push($_SESSION['errors'], "Email already used!!");

			}

		    if (count($_SESSION['errors']) == 0) 
		    {
			    $upass = md5($upass);

			    $query = "INSERT INTO users (uname, uemail, upass) 
					  VALUES('$uname', '$uemail', '$upass')";
			    mysqli_query($db, $query);

		    	header('location:index.php');
		    }
		    else
		    {
		        header('location: register.php');
		    }

	}

	//--------------------------------------------------------------------------------------------

	if (isset($_POST['usignin'])) 
	{
		$uemail = mysqli_real_escape_string($db, $_POST['uemail']);
		$upass = mysqli_real_escape_string($db, $_POST['upass']);

		$upass = md5($upass);
		$query = "SELECT * FROM users WHERE uemail='$uemail' AND upass='$upass'";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) 
		{
			$_SESSION['uemail'] = $uemail;
			header('location:index.php');
		}
		else 
		{
			array_push($_SESSION['errors'], "Wrong uname/upass combination");
			header('location: login.php');
		}
	}

	if (isset($_POST['addtocart'])) 
	{
		$pid = $_POST['addtocart'];

		if(isset($_SESSION['uemail']))
		{

			$uemail = $_SESSION['uemail']; 
            $getid = "SELECT uid FROM users WHERE uemail = '" . $uemail . "'"; 
            $result = mysqli_query($db,$getid);
            $uid = mysqli_fetch_row($result);

			$q = "INSERT INTO orders(pid,uid) VALUES($pid,$uid[0])";
			$result = mysqli_query($db,$q);
			if($result)
			{

				echo "Successfully added to cart";
			}

		}
		else
		{
			echo "Log IN First!!";
		}

	}

//---------------------------------------------------------------------------------------------
?>

<?php 
  if(isset($_POST['oid']))
  {
    $oid = $_POST['oid'];
    $q = "DELETE FROM orders WHERE oid = $oid";

    if (mysqli_query($db,$q)) {

        	echo "Item Deleted Sucsessfully!!";
        }    

  }

  if(isset($_POST['pay']))
  {
  	$uid = $_POST['pay'];

    $q = "SELECT * FROM products JOIN orders ON  products.pid = orders.pid AND orders.uid = $uid ";

   $result =  mysqli_query($db,$q);

   while ($row = mysqli_fetch_row($result)) {

   	$oid = $row[8];
   	$pid = $row[0];
   	$pdown = $row[6];
   	$pdown = $pdown + 1;

   	$q = "UPDATE products SET pdown = $pdown WHERE pid = $pid";
   	mysqli_query($db,$q);

   	$q = "DELETE FROM orders WHERE oid = $oid";
   	mysqli_query($db,$q);

   	$q = "SELECT * FROM products JOIN orders ON  products.pid = orders.pid AND orders.uid = $uid ";
   	$result =  mysqli_query($db,$q);

   }

   echo "Bill Payed Successfully!!";

  }
?>