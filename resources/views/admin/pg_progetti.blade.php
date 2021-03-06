@extends('templates.admin')
@section('content')
    @include('includes.admincard', 
        [
            'title' => 'Pagina Progetti di ricerca',
            'description' => 'Di seguito la lista di cosa si può modificare'
        ]
    )
    <div class="container">
        @include('includes.adminpages', 
        [
            'views' => $views,
            'banners' => $banners
        ]
    )
    </div>
@endsection