@extends('templates.admin')
@section('content')
    @include('includes.admincard', 
        [
            'title' => 'Pagina Cookie',
            'description' => 'Di seguito la lista di cosa si può modificare'
        ]
    )
    <div class="container">
    @include('includes.adminpages', 
        [
            'banners' => $banners
        ]
    )
    </div>
@endsection