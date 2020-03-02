<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Bilanci;

class PageController extends Controller
{
    public function home(){
        return view('home',
            [
                'title' => 'Home',
                'banners' => DB::table('banners')->where('page_id', 'home')->get(),
                'views' => DB::table('views')->where('page_id', 'home')->get(),
                'data' => DB::table('documents')->where('page_id', 'home')->get(),
                'users_cd' => DB::table('team')->where('team_id', 'consiglio direttivo')->get(),
                'users_cs' => DB::table('team')->where('team_id', 'comitato scientifico')->get(),
                'users_ss' => DB::table('team')->where('team_id', 'segreteria scientifica')->get(),
                'users_sa' => DB::table('team')->where('team_id', 'segreteria amministrativa')->get()
            ]
        );
    }

    public function donazioni(){
        return view('donazioni',
            [
                'title' => 'Donazioni',
                'banners' => DB::table('banners')->where('page_id', 'donazioni')->get(),
                'datas' => DB::table('views')->where('page_id', 'donazioni')->get(),
                'msgs' => DB::table('msgs')->where('scope_id', 'donation__info')->get()
            ]
        );
    }

    public function associarsi(){
        return view('associarsi',
            [
                'title' => 'Associarsi',
                'banners' => DB::table('banners')->where('page_id', 'associarsi')->get(),
                'datas' => DB::table('views')->where('page_id', 'associarsi')->get(),
                'msgs' => DB::table('msgs')->where('scope_id', 'iscrizione__info')->get()
            ]
        );
    }

    public function biobanca(){
        return view('biobanca',
            [
                'title' => 'Biobanca',
                'banners' => DB::table('banners')->where('page_id', 'biobanca')->get()
            ]
        );
    }

    public function parlanodinoi(){
        return view('biobanca',
            [
                'title' => 'Parlano di noi',
                'banners' => DB::table('banners')->where('page_id', 'parlanodinoi')->get()
            ]
        );
    }

    public function articoli(){
        return view('biobanca',
            [
                'title' => 'Articoli',
                'banners' => DB::table('banners')->where('page_id', 'articoli')->get()
            ]
        );
    }

    public function contatti(){
        return view('contatti',
            [
                'title' => 'Contatti',
                'banners' => DB::table('banners')->where('page_id', 'contatti')->get()
            ]
        );
    }

    public function statuto(){
        return view('statuto',
            [
                'title' => 'Statuto',
                'banners' => DB::table('banners')->where('page_id', 'statuto')->get(),
                'datas' => DB::table('documents')->where('page_id', 'statuto')->get()
            ]
        );
    }

    public function bilanci(){
        return view('bilanci',
            [
                'title' => 'Bilanci',
                'banners' => DB::table('banners')->where('page_id', 'bilanci')->get(),
                'posts' => Bilanci::orderBy('id', 'desc')->get()
            ]
        );
    }
}
