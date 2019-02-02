<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<ul class="menu">
		<li><a href="book-list.php">Manage Books</a></li>
		<li><a href="cat-list.php">Manage Categories</a></li>
		<li><a href="orders.php">Manage orders</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>

	<?php 
	include("confs/config.php");

	$id = $_GET['id'];
	$result = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");
	$row = mysqli_fetch_assoc($result);
	?>

	<h1>Edit Book</h1>

	<form action="book-update.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $row['id']?>">

		<label for="title">Book Title</label>
		<input type="text" name="title" id="title" value="<?php echo $row['title']?>">

		<label for="author">Author</label>
		<input type="text" name="author" id="author" value="<?php echo $row['author']?>">

		<label for="sum">Summary</label>
		<textarea name="summary" id="sum"><?php echo $row['summary']?></textarea>

		<label for="price">Price</label>
		<input type="text" name="price" id="price" value="<?php echo $row['pirce']?>">

		<label for="categoties">Category</label>
		<select name="category_id" id="categoties">
			<option value="0">-- Choose --</option>
			<?php 
				$categories = mysqli_query($conn,"SELECT id, name FROM categories");
				while ($cat = mysqli_fetch_assoc($categories)) {
					# code...
				
			?>
			<option value="<?php echo $cat['id']?>"
					<?php if($cat['id'] == $row['category_id']) echo "selected"?>>
				<?php echo $cat['name']?>
			</option>
			<?php }?>
			
		</select>

		<br><br>
		<img src="covers/<?php echo $row['cover'] ?>" alt="" height="150">
		<label for="cover">Change cover</label>
		<input type="file" name="cover" id="cover">
		<br><br>
		<input type="submit" name="" value="Update Book">
		<a href="book-list.php">Back</a>
	</form>


</body>
</html>

