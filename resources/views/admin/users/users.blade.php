@extends('admin.layout')
@section('admin')

<body>
  <div class="container">
    <div class="containrrrr">
      <div>
        <a href="{{ route('admin.home') }}" class="btn btn-primary">back</a>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">create</a>
      </div>

      <form action="{{ route('admin.users.search') }}" method="POST">
        @csrf
        <input type="search" placeholder="Search" name="search" required value="{{ old('search') }}" aria-label="Search" aria-describedby="search-addon" />
        <span id="search-addon">
          <button type="submit"><i class="fas fa-search"> </i></button>

        </span>
      </form>
    </div>
    <div class="row">
      <div class="col-12">
        @if($users->isNotEmpty())
        <table class="table table-image">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col"> Name</th>
              <th scope="col">email</th>
              <th scope="col">update</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <th scope="row">{{ $user->id }}</th>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td><a href="{{ route('admin.users.edit',['user'=>$user->id]) }}">update</a></td>
              <td>
                <form method="POST" action="{{ route('admin.users.destroy',['user'=>$user->id]) }}">
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
