@extends('admin.layout.master')
@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
    <main class="page-content">
        <h1>Danh sách sản phẩm</h1>
        <div class="container">
            <table class="table">
                <div class="col-6">
                </div>
                <thead>
                    <tr>
                        <th scope="col">Số thứ tự</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col"></th>
                        <th adta-breakpoints="xs">Quản lí</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($products as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->category->name }}</td>
                            <td>{{ $team->price }}</td>
                            <td>
                                <img style="width:200px ; height: 165px ; border-radius:0%" src="{{ asset('public/assets/product/'. $team->image) }}" alt=""
                                >
                            </td>
                            <td>
                                {{-- <img src="{{ asset('public/uploads/product/' . $team->image) }}" alt=""
                                    style="width: 50px"> --}}
                            </td>
                            <td>
                                <form action="{{ route('product.restoredelete', $team->id) }}" method="POST">
                                    @csrf
                                    @method('put')

                                        <button type="submit" class="btn btn-success">Khôi Phục</button>

                                        <a  href="{{ route('product.destroy', $team->id) }}"
                                            id="{{ $team->id }}" class="btn btn-danger deleteIcon">Xóa</a>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-6">
                <div class="pagination float-right">
                </div>
            </div>
    </main>
@endsection
