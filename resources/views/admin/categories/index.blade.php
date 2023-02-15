@extends('admin.layout.master')
@section('content')
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <div class="container">
        <table class="table">
            <div class="col-6">
                <form class="navbar-form navbar-left" action="{{ route('categories.search') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-default">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
                </form>
            </div>


            <table class="table">
                <a href="{{ route('categories.create') }}" class="btn btn-danger">Thêm mới</a>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('status1'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('status1') }}
                    </div>
                @endif

                <thead>
                    <tr>
                        <th>id</th>
                        <th>Tên thể loại </th>
                        <th>Tùy chỉnh </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Categories as $key => $category)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <th>{{ $category->name }}</th>
                            {{-- <th scope="row">{{$key+1}}</th>
            <td>{{ $team->name }}</td> --}}


                            <td>
                                <form action="{{ route('categories.softdeletes', [$category->id]) }}" method="POST">
                                    {{-- @method('DELETE') --}}
                                    @csrf
                                    @method('put')
                                    <button onclick="return confirm('Bạn có chắc chắn xóa không?');"
                                        class="btn btn-success">Xóa</button>
                                    <a href="{{ route('categories.edit', [$category->id]) }}"
                                        class="btn btn-primary">Chỉnh sửa</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
</body>
</html>
@endsection
