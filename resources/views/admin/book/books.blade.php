@extends('admin.layout')
@section('admin')

<body>
  <div class="container">
    <div class="containrrrr">
      <div>
        <a href="{{ route('admin.home') }}" class="btn btn-primary">back</a>
        <a href="{{ route('admin.books.create') }}" class="btn btn-primary">cteate</a>
      </div>

      <form action="{{ route('admin.books.search') }}" method="POST">
        @csrf
        <input type="search" placeholder="Search" name="search" required value="{{ old('search') }}" aria-label="Search" aria-describedby="search-addon" />
        <span id="search-addon">
          <button type="submit"><i class="fas fa-search"> </i></button>

        </span>
      </form>
    </div>



    <div class="row">
      <div class="col-12">
        @if($books->isNotEmpty())
        <table class="table table-image">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col"> Name</th>
              <th scope="col">image</th>
              <th scope="col"> text</th>
              <th scope="col">{{ __('author_id') }}</th>
              <th scope="col">update</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($books as $book)
            <tr>
              <th scope="row">{{ $book->id }}</th>
              <td>{{ $book->name }}</td>
              <td class="w-25">
                <img src="{{ asset('images/books/'.$book->image) }}" class="img-fluid img-thumbnail w-50" alt="Sheep">
              </td>
              <td>{{ $book->text }}</td>
              <td>{{ $book->author_id }}</td>
              <td><a href="{{ route('admin.books.edit',['book'=>$book->id]) }}">update</a></td>
              <td>
                <form method="POST" action="{{ route('admin.books.destroy',['book'=>$book->id]) }}">
                  @csrf
                  <button type="submit">delete</button>
                  @method("delete")
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        @else
        <div>
          <h2>No posts found</h2>
        </div>
        @endif
      </div>
    </div>
  </div>
</body>

@endsection
