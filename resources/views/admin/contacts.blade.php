@extends('admin.layout')
@section('admin')


<body>
    <div class="container">
      <div class="containrrrr">
        <div>
          <a href="{{ route('admin.home') }}" class="btn btn-primary">back</a>
        </div>


        <form action="{{ route('admin.contacts.search') }}" method="POST">
          @csrf
          <input type="search" placeholder="Search" name="search" required value="{{ old('search') }}" aria-label="Search" aria-describedby="search-addon" />
          <span id="search-addon">
            <button type="submit"><i class="fas fa-search"> </i></button>

          </span>
        </form>
      </div>

      <div class="row">
        <div class="col-12">
          @if($contacts->isNotEmpty())
          <table class="table table-image">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">subject</th>
                <th scope="col">message</th>
                <th scope="col">created_at</th>
                <th scope="col">delete</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($contacts as $contact)
              <tr>
                <th scope="row">{{ $contact->id }}</th>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at }}</td>
                <td>
                  <form method="POST" action="{{ route('admin.contacts.destroy',['contact'=>$contact->id]) }}">
                    @csrf
                    @method("delete")
                    <button type="submit">delete</button>
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
