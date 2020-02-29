<!DOCTYPE html>
<html>
	<head>
		<title>LOGIN</title>
	</head>
	<body>
		<?php
		$sername="localhost";
		$username="root";
		$password="";
		$dbname="reboot";

		$conn=mysqli_connect($sername,$username,$password,$dbname);
		if(!$conn)
		{
			die("Connection Failed:".mysqli_connect_error());
		}

		$sql="SELECT username,pass,typeof,firstname,lastname,email,pno,ano,place from signup";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				if(strcmp($row["username"],$_POST["username"])==0&&strcmp($row["pass"],$_POST["pass"])==0&&strcmp($row["typeof"],$_POST["typeof"])==0)
				{
					if(strcmp($row["typeof"],"farmer"))
					{
						include("farmer.html");
						break;
					}
					else if(strcmp($row["typeof"],"collectionpoint"))
					{
						include("collection.html");
						break;
					}
					else if(strcmp($row["typeof"],"checkpoint"))
					{
						include("checkpoint.html");
						break;
					}
					else if(strcmp($row["typeof"],"merchant"))
					{
						include("merchant.html");
						break;
					}
				}
			}
		}
		else
		{
			echo "no data";
		}
		mysqli_close($conn);
		?>
	</body>
</html>
