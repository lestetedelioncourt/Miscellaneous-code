<?php
/* PROCEDURES
CREATE TABLE `*********`.`songs` ( `song_id` INT(9) NOT NULL AUTO_INCREMENT , `song_name` VARCHAR(200) NOT NULL , PRIMARY KEY (`country_id`)) ENGINE = InnoDB;

CREATE PROCEDURE selectSongs() BEGIN SELECT * FROM songs ORDER BY song_id; END

CREATE PROCEDURE insertSong(IN songName varchar(200)) BEGIN INSERT INTO songs(song_name) VALUES (songName); END

CREATE PROCEDURE selectSong(IN songId INT(9)) BEGIN SELECT * FROM songs WHERE song_id = songId; END

CREATE PROCEDURE updateSong(IN songId INT(9), csongName VARCHAR(200)) BEGIN UPDATE songs SET song_name = songName WHERE song_id = songId; END
*/

	include 'advanced/includes1/db.php';
	$result = ''; $result1 = '';
	if(isset($_POST['submit_song'])){
		$insertSQL = "CALL insertSong('$_POST[song_name]')";
		if(mysqli_query($connect, $insertSQL)){
			header("Location:employees.php?inserted='$_POST[song_name]'");
		}
	}
	if(isset($_POST['update_song'])){
		$updateSQL = "CALL updateSong('$_POST[song_name]', '$_POST[song_id]')";
		if(mysqli_query($connect, $updateSQL)){
			header("Location:employees.php?updated='$_POST[song_name]'&prev='$_POST[prev_name]'");
		}
	}
	if(isset($_GET['delete'])){
		$delSong = "CALL deleteSong('$_GET[song_id]')";
		if(mysqli_query($connect, $delSong)){
			header("Location:employees.php");
		}
	}
?>
<html>
	<head>
		<title>Insert Update Delete using Store Procedure in PHP MYSQL</title>
		<script src="js/jquery.js"></script>
		<script src="bootstrap-3.3.5-dist/js/bootstrap.js"></script> 
		<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.css">
		<style>
		body
		{
			margin:0;
			padding:0;
			background-color:#f1f1f1;
		}
		.my-style
		{
			width:750px;
			border:1px solid #ccc;
			background-color:#fff;
			border-radius:5px;
		}
		</style>
	</head>
	<body>
		<div class="container my-style">
		<?php
		if (isset($_GET['inserted'])){
			echo '<div class="alert alert-success">'.$_GET['inserted'].' was added to the database</div>';
		}
		if (isset($_GET['updated'])){
			echo '<div class="alert alert-warning">'.$_GET['prev'].' was changed to '.$_GET['updated'].'</div>';
		}
		if(isset($_GET['edit_id'])){
			$selSong = "CALL selectSong('$_GET[edit_id]')";
			$songquery = mysqli_query($connect, $selSong);
			if (mysqli_num_rows($songquery) > 0){
				while ($erow = mysqli_fetch_assoc($songquery)){
					echo ' 
		<form name="Edit_song" method="post">
		<h3 align="center">Edit song</h3>
		<div class="form group">
			<label for="song_name">Enter song name:</label>
			<input type="text" class="form-control" name="song_name" style="margin-top:5px; margin-bottom:15px;" value="'.$erow['song_name'].'"/>
		</div>
		<div class="form-group">
			<input type="hidden" name="prev_name" value="'.$erow['song_name'].'" />
			<input type="hidden" name="song_id" value="'.$erow['song_id'].'" />
			<input type="submit" class="btn btn-success" value="Update song" name="update_song" />
		</div>
		</form>				
					';
				}
				mysqli_next_result($connect);
			} 			
		} 
		else{
			echo '
		<form name="Add_song" method="post">
		<h3 align="center">Add song</h3>
		<div class="form group">
			<label for="song_name">Enter song name:</label>
			<input type="text" class="form-control" name="song_name" style="margin-top:5px; margin-bottom:15px;" />
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-success" value="Add song" name="submit_song" />
		</div>
		</form>
		< ';
		} ?>		
		<table class="table table-striped">
			<tr>
				<th>Song Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php
				$selSQL = "CALL selectSongs()";
				$selresult = mysqli_query($connect, $selSQL);
				if (mysqli_num_rows($selresult) > 0){
					while($row = mysqli_fetch_assoc($selresult)){
						echo '
			<tr>
				<td>'.$row['song_name'].'</td>
				<td><a href="employees.php?edit_id='.$row['song_id'].'" class="btn btn-primary">Edit</a></td>
				<td><a href="#" class="btn btn-danger my-delete" id="'.$row['song_id'].'">Delete</a></td>
			</tr>				
						';
					}
					mysqli_next_result($connect);
				}
				else {?>
			<tr>
				<td colspan="3">No data</td>
			</tr>			
			<?php		}
				
			?>
		</table>
		</div>
	</body>
</html>
<!-- equivalent to Javascript onClick command-->
<script>
	$(document).ready(function(){
		$('.my-delete').click(function(){
			var song_id = $(this).attr("id");
			if (confirm("Please confirm whether you want to delete this")){
				if(confirm("Are you sure?")){
					window.location = "employees.php?delete=1&song_id=" + song_id;
				} else{
				return false;
				}
			} else{
				return false;
			}
		});
	});
</script>