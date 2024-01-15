<!DOCTYPE HTML> 
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  	<div class="container">
	<br>
	<div class="card">
	<div class="card-header"><p class="h1 text-center">📖 Add Book</p></div>
	<div class="card-body">
	<br>
	<form method="POST" autocomplete="on" action="{{route('buku.store')}}">
	@csrf
	<div class="form-group">
		<label for="isbn">ISBN:</label>
		<input type="text" class="form-control" id="isbn" name="isbn" value="">
		<div class="error" style="color: red;"><?php if(isset($error_isbn)) echo $error_isbn;?></div>
	</div>
	<div class="form-group">
		<label for="author">Author:</label>
		<input type="text" class="form-control" id="author" name="author" value="">
		<div class="error" style="color: red;"><?php if(isset($error_author)) echo $error_author;?></div>
	</div>
	<div class="form-group">
		<label for="title">Title:</label>
		<input type="text" class="form-control" id="title" name="title" value="">
		<div class="error" style="color: red;"><?php if(isset($error_title)) echo $error_title;?></div>
	</div>
	<div class="form-group">
		<label for="price">Price:</label>
		<input type="text" class="form-control" id="price" name="price" value="">
		<div class="error" style="color: red;"><?php if(isset($error_price)) echo $error_price;?></div>
	</div>
	<br>
	<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>&nbsp;
	<a href="view_books.php" class="btn btn-secondary">Cancel</a>
	</form>
	</div>
	</div>
	</div>
    <br>
    <br>
    <p class="text-center mb-3">Created with <span style="color: #ff0000">&#9829;</span> by Kelompok 4</p>
    <br>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>