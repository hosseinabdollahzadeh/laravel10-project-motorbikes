@extends('admin.layouts.master')

@section('title')
create motorbike
@endsection

@section('content')
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ایجاد موتورسیکلت</h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{route('admin.motors.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-3">
                        <label for="image">انتخاب تصویر</label>
                        <div class="custom-file">
                            <input type="file" name="image" id="image" class="custom-file-input" required/>
                            <label class="custom-file-label" for="image"> انتخاب فایل </label>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="model">مدل (نام موتور سیکلت)</label>
                        <input class="form-control" id="model" name="model" type="txt" value="{{old('model')}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="make">ساخت (سال ساخت)</label>
                        <input class="form-control" id="make" name="make" type="number" value="{{old('make')}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="color">رنگ</label>
                        <input class="form-control" id="color" name="color" type="text" value="{{old('color')}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="weight">وزن (کیلوگرم)</label>
                        <input class="form-control" id="weight" name="weight" type="number" value="{{old('weight')}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="price">قیمت (تومان)</label>
                        <input class="form-control" id="price" name="price" type="number" value="{{old('price')}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="description">توضیحات</label>
                        <textarea class="form-control" id="description" name="description">{!! old('description') !!}</textarea>
                    </div>
                </div>
                <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                <a href="{{route('admin.motors.index')}}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // show file name
        $('#image').change(function () {
            // get the file name
            var filename = $(this).val();
            // replace the "Choose s file" label
            $(this).next('.custom-file-label').html(filename)
        });
    </script>
@endsection
