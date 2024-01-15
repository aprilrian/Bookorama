<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Books Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <h1 class="text-center">📚 Books Catalog</h1>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{route('books.create')}}" class="btn btn-success btn-m mb-3">+ Add Book</a>
                </div>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th class="text-center">ISBN</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Action (Edit/ Delete)</th>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->price }}</td>
                                <td>{{ $book->category_name }}</td>
                                <td>
                                   <form action="{{ route('books.destroy', $book->isbn) }}" method="POST" class="d-flex justify-content-center">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('books.edit', $book->isbn) }}" class="btn btn-warning btn-sm" style="margin-right: 1rem;">Edit</a>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                   </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </body>
            @php
                $booksCount = \App\Models\books::count();
            @endphp
            <p class="d-flex justify-content-end">Total Books: {{$booksCount}}</p>
        </div>
    </div>
    <br>
    <br>
    <p class="text-center mb-3">Created with <span style="color: #ff0000">&#9829;</span> by Kelompok 4</p>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>