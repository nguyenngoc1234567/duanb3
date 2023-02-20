@extends('admin.layout.master')
@section('content')
    <main class="page-content">
        <h1 class="offset-4">Thể loại</h1>


        <div class="container">
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">Số thứ tự</th>
                        <th scope="col">Tên</th>
                        <th adta-breakpoints="xs">Quản lí</th>
                    </tr>
                </thead>
                <tbody id="myTable">

                    @foreach ($categories as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>
                            <td>
                                <form action="{{ route('categories.restoredelete', $team->id) }}" method="POST">
                                            @csrf
                                            @method('put')
                                                <button type="submit" class="btn btn-success">Khôi Phục</button>
                                                <a  href="{{ route('categories.destroy', $team->id) }}"
                                                    id="{{ $team->id }}" class="btn btn-danger deleteIcon">Xóa</a>
                                        </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

@endsection
