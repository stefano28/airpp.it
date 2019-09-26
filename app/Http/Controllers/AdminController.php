<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function profilo()
    {
        return view('admin.profilo',
            [

                'user' => Auth::user()
            ]
        );
    }

    public function edit_profilo(Request $request){
        DB::table('users')
            ->where('id', $request->id)
            ->update(
                [
                    'name' => $request->name,
                    'email' => $request->email
                ]
            );
            \Session::put('success', 'Modifica effettuata con successo');
            return Redirect::to('admin/profilo');
    }

    public function edit_pssw(Request $request){
        $request->validate(
            [
                'password' => 'required|min:6|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
            ],
            [
                'password.required' => 'Devi inserire la password',
                'password.confirmed' => 'Le due password non corrispondono',
                'password.min' => 'La password deve essere di almeno 6 caratteri',
                'password.regex' => 'Devi rispettare i criteri della password'
            ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->password);
        $user->save();
        \Session::put('success', 'Modifica effettuata con successo');
        return Redirect::to('admin/profilo');
    }

    public function donazioni()
    {
        return view('admin.donazioni',
            [

                'datas' => DB::table('donations')->where('success', '1')->get()
            ]
        );
    }

    public function iscrizioni()
    {
        return view('admin.iscrizioni');
    }

    public function galleria()
    {
        return view('admin.galleria');
    }

    public function team()
    {
        return view('admin.team',
            [

                'datas' => DB::table('team')->get()
            ]
        );
    }

    public function email()
    {
        return view('admin.email',
            [

                'datas' => DB::table('views')->where('page_id', 'email_iscrizioni')->orWhere('page_id', 'email_donazioni')->get()
            ]
        );
    }

    public function edit_team(Request $request)
    {
        if(!isset($request->file)){
            $request->file = 0;
        }else{
            $request->file->storeAs('team', $request->surname."_".$request->name.".".request()->file->getClientOriginalExtension());
            $request->file = 1;
        }
        DB::table($request->db)
            ->where('id', $request->id)
            ->update(
                [
                    'name' => $request->name,
                    'surname' => $request->surname,
                    'description' => $request->description,
                    'role' => $request->role,
                    'img'=> $request->file
                ]
            );
            \Session::put('success', 'Modifica effettuata con successo');
            return Redirect::to('admin/'.$request->db);
    }

    public function premi()
    {
        return view('admin.premi',
            [
        
                'datas' => DB::table('premi')->orderBy('id', 'DESC')->get()
            ]
        );
    }

    public function convegni()
    {
        return view('admin.convegni',
            [
        
                'datas' => DB::table('convegni')->orderBy('id', 'DESC')->get()
            ]
        );
    }

    public function iniziative()
    {
        return view('admin.iniziative',
            [
        
                'datas' => DB::table('iniziative')->orderBy('id', 'DESC')->get()
            ]
        );
    }

    public function edit_news(Request $request)
    {
        if(!isset($request->active)){
            $request->active = 0;
        }else{
            $request->active = 1;
        }
        if(!isset($request->file)){
            $request->file = "0";
        }else{
            $data = DB::table($request->db)->where('id', $request->id)->get('link');
            $trimmed = str_replace('/storage', '', $data[0]->link) ;
            Storage::delete($trimmed);
            $request->file->storeAs('locandine', request()->file->getClientOriginalName());
            $request->file = '/storage/locandine/'.request()->file->getClientOriginalName();
        }
        DB::table($request->db)
            ->where('id', $request->id)
            ->update(
                [
                    'title' => $request->title,
                    'description' => $request->description,
                    'place' => $request->place,
                    'date' => $request->date,
                    'active'=> $request->active,
                    'link' => $request->file
                ]
            );
            \Session::put('success', 'Modifica effettuata con successo');
            return Redirect::to('admin/'.$request->db);
    }

    public function add_news(Request $request){
        if(!isset($request->active)){
            $request->active = 0;
        }else{
            $request->active = 1;
        }
        if (isset($request->file) && Input::file('file')->isValid())
        {
            $request->file->storeAs('locandine', request()->file->getClientOriginalName());
            $request->file = '/storage/locandine/'.request()->file->getClientOriginalName();
        }else{
            $request->file = "0";
        }
        DB::table($request->db)->insert([
            'title' => $request->title,
            'description' => $request->description,
            'place' => $request->place,
            'date' => $request->date,
            'active' => $request->active,
            'link' => $request->file
        ]);
        \Session::put('success', 'Elemento aggiunto con successo');
        return Redirect::to('admin/'.$request->db);
    }

    public function delete_news(Request $request){
        DB::table($request->db)->where('id', $request->id)->delete();
        \Session::put('success', 'Elemento eliminato con successo');
        return Redirect::to('admin/'.$request->db);
    }
}
