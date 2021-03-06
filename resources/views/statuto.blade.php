@extends('templates.page')
@section('content')
@foreach($banners as $banner)
<div class="row info__tab">
    <div class="col-1-of-2 u-center-text">
        <div class="heading-secondary u-margin-bottom-medium u-color-black">
            {{$banner->title}}
        </div>
        <div class="paragraph">
            <pre>{{$banner->description}}</pre>
            @foreach($datas as $data)
                @include('includes.link',
                [
                    'link' => $data->link,
                    'text' => 'Scarica lo statuto'
                ])
            @endforeach
        </div>
    </div>
        <div class="col-1-of-2">
            <div class="info__img__container">
                <img class="info__img img_svg" src={{asset($banner->img)}}>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection