<?php 

	$name=$comment='';
	$errors=array('name'=>'','comment'=>'');
	include('database.php');

	if(isset($_POST['submit'])){
		
		if(empty($_POST['name'])){
			$errors['name']='A name is required';
		} else{
			$name = $_POST['name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
				$errors['name']= 'Name must contain only letters and spaces ';
			}
		}

		
		if(empty($_POST['comment'])){
			$errors['comment']= 'comment is required ';
		} else{
			$comment = $_POST['comment'];
			
		}
		if(array_filter($errors)){

		}
		else{

			$name = mysqli_real_escape_string($conn, $_POST['name']);
			$comment = mysqli_real_escape_string($conn, $_POST['comment']);
			

			// create sql
			$sql = "INSERT INTO comments(name,comment) VALUES('$name','$comment')";
			if(mysqli_query($conn,$sql)){
				header('Location:homepage.php');

			}
			else{
				echo 'query error'. mysqli_error($conn);
			}
		}
	}

?>

<!DOCTYPE html>
<html>
	
	<?php include('header.php'); ?>

	<section class="container black-text">
		<h4 class="center">Add a comment</h4>
		<form class="white" action="add.php" method="POST">
			<label>Name</label>
			<input type="text" name="name">
			<div class="red-text"><?php echo $errors['name']; ?></div>
			<label>Comment</label>
			<input type="text" name="comment">
			<div class="red-text"><?php echo $errors['comment']; ?></div>
			
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-1">
			</div>
		</form>
	</section>

	

</html>