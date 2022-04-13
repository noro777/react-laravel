@extends('admin.layout')
@section('admin')

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('book_update') }}</div>

                    <div class="card-body">

                        @if(Session::get('sucses'))
                        {{ Session::get('sucses') }}

                        @endif
                        <form method="POST" action="{{ route('admin.books.update',['book'=>$book->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">image</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="text" class="col-md-4 col-form-label text-md-end">{{ __('text') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="text" class="form-control @error('text') is-invalid @enderror" name="text" autocomplete="new-password">

                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="file" class="col-md-4 col-form-label text-md-end">{{ __('file') }}</label>

                                <div class="col-md-6">
                                    <input id="file" type="file" class="form-control" name="file" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="author_id" class="col-md-4 col-form-label text-md-end">{{ __('author_id') }}</label>

                                <div class="col-md-6">
                                    <select name="author_id" class="form-control @error('type') is-invalid @enderror">
                                        @foreach ($authors as $author)
                                        <option value="{{ $author->id }}" selected>{{ $author->name }}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
@endsection
