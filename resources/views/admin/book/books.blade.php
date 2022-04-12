<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>


  <!-- CSS only -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">


  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <style>
    .containrrrr {

      display: flex;
      justify-content: space-between;
    }
  </style>

</head>

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

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

</html>