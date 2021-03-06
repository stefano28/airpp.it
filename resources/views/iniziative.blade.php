@extends('templates.page')
@section('content')
    @foreach($banners as $banner)
        @include('includes.banner', 
        [
            'title' => $banner->title,
            'description' => $banner->description,
            'img' => $banner->img
        ])
    @endforeach
    <div class="u-padding-normal-unique">
        <hr>
    </div>
    <div class="u-center-text u-margin-bottom-big">
        @foreach($posts as $post)
            @include('includes.newstab', 
            [
                'newstab__title' => $post->title,
                'newstab__text' => $post->description,
                'newstab__place' => $post->place,
                'newstab__date' => $post->date,
                'newstab__state' => $post->active,
                'newstab__link' => $post->link
            ])
        @endforeach
        <div class="u-margin-top-medium small">
            <?php echo $posts->links(); ?>
        </div>
    </div>
@endsection