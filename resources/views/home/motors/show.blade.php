@extends('home.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-8">
                                <div class="card-body" style="direction: rtl;">
                                    <h5 class="card-title"><b>مدل:</b> {{$motor->model}}</h5>
                                    <p class="card-text"><b>سال ساخت:</b> {{$motor->make}}</p>
                                    <p class="card-text"><b>رنگ:</b> {{$motor->color}}</p>
                                    <p class="card-text"><b>وزن (کیلوگرم):</b> {{$motor->weight}}</p>
                                    <p class="card-text"><b>قیمت (تومان):</b> {{$motor->price}}</p>
                                    <p class="card-text"><b>توضیحات:</b> {{$motor->description ?? ''}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{url(env('MOTORS_IMAGES_UPLOAD_PATH').$motor->image)}}" class="img-fluid rounded-start" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
