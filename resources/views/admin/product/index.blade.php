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

        <table class="table">
            <a href="{{ route('product.create') }}" class="btn btn-danger">Thêm mới</a>
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
                    <th>Tên </th>
                    <th>Giá</th>
                    {{-- <th >Mô tả</th> --}}
                    {{-- <th >Thể loại</th> --}}
                    <th>Ảnh</th>
                    <th>tùy chỉnh</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Product as $key => $product)
                    <tr>
                        <th>{{ ++$key }}</th>
                        <th>{{ $product->name }}</th>
                        <th>{{ $product->price }}</th>
                        {{-- <th >{!! html_entity_decode($product->description) !!}</th> --}}
                        {{-- <th >{{ $product->category->name}}</th> --}}
                        <td>
                            <img style="width:200px ; height: 165px ; border-radius:0%"
                                src="{{ asset('public/assets/product/' . $product->image) }}" alt="">


                        <td>
                            <form action="{{ route('product.softdeletes', $product->id) }}" method="POST">
                                @method('put')
                                {{-- @if (Auth::user()->hasPermission('Product_view'))
                            <a class="btn btn-info" href="{{ route('product.show', $product->id) }}">Xem</a>
                            @endif --}}
                                @if (Auth::user()->hasPermission('Product_update'))
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Sửa</a>
                                @endif
                                @csrf
                                @method('PUT')
                                @if (Auth::user()->hasPermission('Product_delete'))
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Chuyên vào thùng rác')">Xóa</button>
                                @endif
                                {{-- <a href="{{ route('product.edit', [$product->id]) }}" class="btn btn-primary">Chỉnh sửa</a> --}}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

    </html>
@endsection
