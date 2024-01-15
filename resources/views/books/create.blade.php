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
	<form method="POST" autocomplete="on" action="{{route('books.store')}}">
	@csrf
	<div class="form-group">
    <label for="isbn">ISBN:</label>
    <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn" value="{{ old('isbn') }}">
		@error('isbn')
			<div class="invalid-feedback">{{ $message }}</div>
		@enderror
		<small>Format: 1-123-12345-1</small>
	</div>
	<div class="form-group">
		<label for="author">Author:</label>
		<input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') }}">
		@error('author')
			<div class="invalid-feedback">{{ $message }}</div>
		@enderror
	</div>
	<div class="form-group">
		<label for="title">Title:</label>
		<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
		@error('title')
			<div class="invalid-feedback">{{ $message }}</div>
		@enderror
	</div>
	<div class="form-group">
		<label for="price">Price:</label>
		<input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
		@error('price')
			<div class="invalid-feedback">{{ $message }}</div>
		@enderror
	</div>
	<div class="form-group">
		<label for="categoryid">Category:</label>
		<select name="categoryid" id="categoryid" class="form-control @error('categoryid') is-invalid @enderror" required>
			<option value="" {{ old('categoryid') == '' ? 'selected' : '' }} disabled>--Select a category--</option>
			<option value="1" {{ old('categoryid') == '1' ? 'selected' : '' }}>Encyclopedia</option>
			<option value="2" {{ old('categoryid') == '2' ? 'selected' : '' }}>Novel</option>
			<option value="3" {{ old('categoryid') == '3' ? 'selected' : '' }}>Comic</option>
			<option value="4" {{ old('categoryid') == '4' ? 'selected' : '' }}>Scientific Books</option>
		</select>
		@error('categoryid')
			<div class="invalid-feedback">{{ $message }}</div>
		@enderror
	</div>
	<br>
	<button type="submit" class="btn btn-primary" name="submit" value="submit">Add</button>&nbsp;
	<a href="{{route('books.index')}}" class="btn btn-secondary">Cancel</a>
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