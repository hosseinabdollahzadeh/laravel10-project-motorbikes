@extends('admin.layouts.master')

@section('title')
    index motors
@endsection

@section('content')
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 d-flex flex-column text-center flex-md-row justify-content-md-between">
                <h5 class="font-weight-bold mb-3 mb-md-0">لیست موتورها ({{ $motors->total() }})</h5>
                <div>
                    <a class="btn btn-sm btn-outline-primary" href="{{route('admin.motors.create')}}">
                        <i class="fa fa-plus"></i>
                        ایجاد موتور
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>تصویر</th>
                        <th>نام</th>
                        <th>مدل</th>
                        <th>ساخت</th>
                        <th>رنگ</th>
                        <th>وزن</th>
                        <th>قیمت</th>
                        <th>عملیات</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($motors as $key=>$motor)
                        <tr>
                            <th>{{$motors->firstItem() + $key}}</th>
                            <th style="max-width: 80px;">
                                <a href="{{url(env('MOTORS_IMAGES_UPLOAD_PATH').$motor->image)}}" target="_blank">
                                    <img src="{{url(env('MOTORS_IMAGES_UPLOAD_PATH').$motor->image)}}" alt="" style="max-width: 100%; height: auto;"/>
                                </a>
                            </th>
                            <th>
                                {{$motor->name}}
                            </th>
                            <th>
                                {{$motor->model}}
                            </th>
                            <th>
                                {{$motor->make}}
                            </th>
                            <th>
                                {{$motor->color}}
                            </th>
                            <th>
                                {{$motor->weight}} کیلوگرم
                            </th>
                            <th>
                                {{number_format($motor->price)}} تومان
                            </th>
                            <th>
                                <form action="{{route('admin.motors.destroy', $motor->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-outline-danger">حذف</button>
                                </form>
                                <a class="btn btn-sm btn-outline-info mr-3 mt-3" href="{{route('admin.motors.edit', $motor->id)}}">ویرایش</a>
                            </th>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-5">
                {{$motors->render()}}
            </div>
        </div>
    </div>
@endsection
