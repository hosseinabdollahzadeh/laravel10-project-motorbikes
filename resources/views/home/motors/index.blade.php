@extends('home.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($motors as $motor)
                <div class="col-md-4">
                    <div class="card" style="direction: rtl;">
                        <img src="{{url(env('MOTORS_IMAGES_UPLOAD_PATH').$motor->image)}}" class="card-img-top"
                             alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$motor->model}}</h5>
                            <p class="card-text">قیمت: {{$motor->price}} تومان</p>
                            <a href="{{route('home.motors.show', $motor->id)}}" class="btn btn-primary">مشاهده
                                جزئیات</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center mt-5">
                {{$motors->links()}}
            </div>
        </div>

    </div>
@endsection
