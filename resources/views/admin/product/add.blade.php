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
    @extends('admin.layout.master')
    @section('content')
        <form action="{{ route('product.store') }}" method='post' enctype="multipart/form-data">
            @csrf
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-header py-3 bg-transparent">
                            <h5 class="mb-0">THÊM MỚI SẢN PHẨM </h5>
                        </div>
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <form class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Tên</label>
                                        <input type="name" class="form-control" name="name">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Giá </label>
                                        <input type="name" class="form-control" name="price">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Mô tả </label>
                                        <textarea type="name" class="form-control" id="ckeditor1" name="description"></textarea>
                                        <small id="" class="form-text text-muted"></small>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Thể loại </label>
                                        <select name="category_id" id="" class="form-control">
                                            <option value="">--Vui lòng chọn--</option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group has-warning">
                                        <div class="col-12">
                                            <label class="form-label"> Ảnh </label>
                                            <input type="file" class="form-control" value="" name="image">
                                        </div>
                                    </div>
                                    <div class="col-12">

                                </form>
                                <div class="col-12">
                                    <button class="btn btn-primary px-4">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

        <script>
            jQuery(document).ready(function() {
                if ($('#blah').hide()) {
                    $('#blah').hide();
                }
                jQuery('#inputFile').change(function() {
                    $('#blah').show();
                    const file = jQuery(this)[0].files;
                    if (file[0]) {
                        jQuery('#blah').attr('src', URL.createObjectURL(file[0]));
                        jQuery('#blah1').attr('src', URL.createObjectURL(file[0]));
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.file').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                        console.log(e);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
    @endsection
