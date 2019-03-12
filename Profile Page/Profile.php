<?php
require_once("../Header - Footer/header.php");
session_start();
if($_SESSION["username"] == null)
{
	header('Location: ../index.html');
}
?>
<title>Profile</title>
<style>
body {
	padding-top: 50px;
}
body > p {
	text-align: center;
}
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
	text-align: center;
}
.col-sm-3 {
	padding-bottom: 30px;
}
.col-sm-12 h3 {
	font-size: 19px;
	text-transform: uppercase;
	color: white;
	font-weight: 400;
	padding: 0px;
	margin: 0px;
}
.col-sm-12 p {
	font-size: 19px;
	text-transform: uppercase;
	color: red;
	font-weight: 400;
	padding: 0px;
	margin: 0px;
}
.img-circle {
    border-radius: 50%;
}

</style>

<body>
<div id="top" class="container-fluid">
<!-- Title and profile icon -->
  <?php
  require_once('config.inc.php');
  $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
  $conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
   ?>

<div class="row">
<div class="col-sm-2 col-sm-offset-5">
<a href= "EditPage.php">
<img src="squareElement.png" style="width:100%" class="img-circle">
			<div class="centered"><h1 style="color: #fff; font-size: 50px;">
<?php echo $_SESSION['username']; ?>
</div>
</a>
</div>
</div>
<!-- My notes Section -->

		<!-- Admin Start---->
	<?php
			$userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;//userID query
			$adminID = -1;
			if ($userID == $adminID)
			{
	?>
		<div class="row">
				<div class="col-sm-12">
			      <h3 style="font-size: 30px; padding-top: 30px; padding-bottom: 15px; color: black;"> All notes  <p>Delete Note:</p></h3>
						<form method="post">
							<select name="note">
								<option>---</option>
	<?php
								$stat = $conn->prepare("SELECT * FROM Notes");
								$stat->execute();
								while($row = $stat->fetch())
								{
	?>
									<option><?php echo $row['TitleNote'];?></option>
	<?php
								}
	?>
				      </select>

							<input type="submit" value="Delete" name="deleteBtn">
						</form>

	<?php
				$stat = $conn->prepare("SELECT * FROM Notes");
	    	$stat->execute();

	    	while($row = $stat->fetch())
				{
					$noteID = $row['NoteID'];
					$stat2 = $conn->prepare("SELECT * FROM `Votes` WHERE NoteID = '$noteID'");
					$stat2->execute();
					$counterLikes = 0;
					$counterDislikes = 0;
					while($row2 = $stat2->fetch())
					{
						if($row2['type'] == 1)
		  					$counterLikes++;
						else
								$counterDislikes++;
					}

		?>
					<div class="col-sm-3">
						      <a <?php echo "href='../Notes Page/NotesPreview.php?id=".$row['NoteID']."'>"; ?>
									<img src="squareElement.png" style="width:100%">
							        <div class="centered"><h2 style="color: #fff;">
									<?php echo $row['TitleNote'];?>
									</br> Likes: <?php echo $counterLikes; ?>
									</br> Dislikes: <?php echo $counterDislikes; ?></h2></div>
								  </a>
				        </div>

	<?php
				}
	?>
</div>
</div>
				<div class="row">
	<?php

				        $stat = $conn->prepare("SELECT * FROM `Users`");
				        $stat->execute();
				        $numberOfUser = 0;
				        $usernameArray = array();
				        $links = array();
				        while($row = $stat->fetch())
								{
				          $username = $row['Username'];
				          array_push($usernameArray, $username);
				          $link = "profile2.php?id=" . $row['UserID'];
				          array_push($links, $link);
				          $numberOfUser++;
				         }
	?>

					<div class="col-sm-12">
				    <h3 style="font-size: 30px; padding-top: 30px; padding-bottom: 15px; color: black;">All Users (<?php echo $numberOfUser;?>)</h3>
					</div>
	<?php
				         for($counter = 0; $counter < $numberOfUser; $counter++)
				         {
	?>
										<div class="col-sm-3">
						         	<a href= "<?php echo $links[$counter]; ?>">
						        	<img src="squareElement.png" style="width:100%" class="img-circle">
														<div class="centered"><h2 style="color: #fff;">
						         				<?php echo $usernameArray[$counter]; ?>
									 						</div>
									 		</a>
								 		</div>

	<?php
									}
	?>
					</div>
			</div>
<?php

			}
			else
			{
	?>
	<!-- Admin End---->
	<div id="top" class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
						<h3 style="font-size: 30px; padding-top: 30px; padding-bottom: 15px; color: black;">My notes <p>Delete Notes</p></h3>
						<form method="post">
							<select name="note">
								<option>---</option>
	<?php
								$stat = $conn->prepare("SELECT * FROM Notes WHERE UserID = ?");
								$stat->bindParam(1, $userID);
								$stat->execute();
								while($row = $stat->fetch())
								{
	?>
									<option><?php echo $row['TitleNote'];?></option>
	<?php
								}
	?>
							</select>

							<input type="submit" value="Delete" name="deleteBtn">
						</form>
				</div>
	<?php
				$stat = $conn->prepare("SELECT * FROM Notes WHERE UserID = ?");
	    	$stat->bindParam(1, $userID);
	    	$stat->execute();

	    	while($row = $stat->fetch())
				{
					$noteID = $row['NoteID'];
					$stat2 = $conn->prepare("SELECT * FROM `Votes` WHERE NoteID = '$noteID'");
					$stat2->execute();
					$counterLikes = 0;
					$counterDislikes = 0;
					while($row2 = $stat2->fetch())
					{
						if($row2['type'] == 1)
		  					$counterLikes++;
						else
								$counterDislikes++;
					}

	?>
					<div class="col-sm-3">
						      <a <?php echo "href='../Notes Page/NotesPreview.php?id=".$row['NoteID']."'>"; ?>
									<img src="squareElement.png" style="width:100%">
							        <div class="centered"><h2 style="color: #fff;">
									<?php echo $row['TitleNote'];?>
									</br> Likes: <?php echo $counterLikes; ?>
									</br> Dislikes: <?php echo $counterDislikes; ?></h2></div>
								  </a>
				        </div>
	<?php
					}
	?>

</div>
<!-- My notes Section End -->

<!-- Following Section -->
<div class="row">
<?php
				$userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;//userID query
        $stat = $conn->prepare("SELECT  * FROM `Followers` WHERE FollowerUserID = '$userID'");
        $stat->execute();
        $count = 0;
        $usernameArray = array();
        $links = array();
        while($row = $stat->fetch())
				{

          $FollowedUserID = $row['FollowedUserID'];
          $syn = "SELECT Username FROM Users WHERE UserID =" . $row['FollowedUserID'];
          $username = $conn2->query($syn)->fetch_object()->Username;
          array_push($usernameArray, $username);
          $link = "profile2.php?id=" . $FollowedUserID;
          array_push($links, $link);
          $count = $count + 1;
         }
?>

	<div class="col-sm-12">
    <h3 style="font-size: 30px; padding-top: 30px; padding-bottom: 15px; color: black;"> <?php echo $count;?> Followings</h3>
	</div>
<?php
         for($counter = 0; $counter < $count; $counter++)
         {
?>
						<div class="col-sm-3">
		         	<a href= "<?php echo $links[$counter]; ?>">
		        	<img src="squareElement.png" style="width:100%" class="img-circle">
										<div class="centered"><h2 style="color: #fff;">
		         				<?php echo $usernameArray[$counter]; ?>
					 						</div>
					 		</a>
				 		</div>
<?php
					}
?>
</div>
<!-- Following Section End -->

<!-- Followers Section -->
<div class="row">
<?php
				$userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;//userID query
        $stat = $conn->prepare("SELECT  * FROM `Followers` WHERE FollowedUserID = '$userID'");
        $stat->execute();
        $count = 0;
        $usernameArray = array();
        $links = array();
        while($row = $stat->fetch())
				{
          $FollowerUserID = $row['FollowerUserID'];
          $syn = "SELECT Username FROM Users WHERE UserID =" . $row['FollowerUserID'];
          $username = $conn2->query($syn)->fetch_object()->Username;
          array_push($usernameArray, $username);
          $link = "profile2.php?id=" . $FollowerUserID;
          array_push($links, $link);
          $count = $count + 1;
        }
?>
		<div class="col-sm-12">
			<h3 style="font-size: 30px; padding-top: 30px; padding-bottom: 15px; color: black;"> <?php echo $count;?> Followers</h3>
		</div>
<?php
         for($counter = 0; $counter < $count; $counter++)
         {
?>
						<div class="col-sm-3">
				 			<a href= "<?php echo $links[$counter]; ?>">
									<img src="squareElement.png" style="width:100%" class="img-circle">
								<div class="centered"><h2 style="color: #fff;">
				 				<?php echo $usernameArray[$counter]; ?>
			 					</div>
			 				</a>
		 				</div>
<?php
					}
		}

		if(isset($_POST['deleteBtn']))
		{
			$note = $_POST["note"];
			if ($note != "---")
			{
				$stat = $conn2->prepare("DELETE FROM `Notes` WHERE `TitleNote` = '$note'");
				$stat->execute();
				echo "DELETED";
				header('Location: '.$_SERVER['REQUEST_URI']);
			}
		}
?>
  </div>
<!-- Followers Section End -->
</div>
</body>
<?php
require_once("../Header - Footer/footer.html");
?>
</html>
