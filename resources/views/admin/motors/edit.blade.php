@extends('admin.layouts.master')

@section('title')
    edit motor
@endsection

@section('content')
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ویرایش موتورسیکلت: {{$motor->model}}</h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{route('admin.motors.update', $motor->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row justify-content-center mb-3">
                    <div class="col-md-4">
                        <div class="card" style="max-width: 200px;">
                            <img src="{{url(env('MOTORS_IMAGES_UPLOAD_PATH').$motor->image)}}" style="max-width: 100%; height: auto;">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="primary_image">انتخاب تصویر</label>
                        <div class="custom-file">
                            <input type="file" name="image" id="motor_image" class="custom-file-input"/>
                            <label class="custom-file-label" for="motor_image"> انتخاب فایل </label>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="model">مدل (نام موتور سیکلت)</label>
                        <input class="form-control" id="model" name="model" type="text" value="{{$motor->model}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="make">ساخت (سال ساخت)</label>
                        <input class="form-control" id="make" name="make" type="number" value="{{$motor->make}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="color">رنگ</label>
                        <input class="form-control" id="color" name="color" type="text" value="{{$motor->color}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="weight">وزن (کیلوگرم)</label>
                        <input class="form-control" id="weight" name="weight" type="number" value="{{$motor->weight}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="price">قیمت (تومان)</label>
                        <input class="form-control" id="price" name="price" type="number"
                               value="{{$motor->price}}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="description">توضیحات</label>
                        <textarea class="form-control" id="description" name="description"
                                  cols="10" rows="5">{!! $motor->description !!}</textarea>
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
        $('#motor_image').change(function () {
            // get the file name
            var filename = $(this).val();
            // replace the "Choose s file" label
            $(this).next('.custom-file-label').html(filename)
        });
    </script>
@endsection
