<?php

namespace App\Http\Controllers;
use App\Caisse;
use App\User;
use App\Caisse_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class Caisse_usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caisses = Caisse::all();
        $users = User::all();
        $caisse_users = DB::table('caisse_users')
            ->join('caisses', 'caisse_users.caisse_id', '=', 'caisses.id')
            
            ->join('users', 'caisse_users.user_id', '=', 'users.id')
         
            ->select('caisses.*','users.*','caisse_users.*')
            ->get();

            return view('caisse_users/index',[
                'caisse_users' => $caisse_users,
                'caisses' => $caisses,
                
                'users' => $users,
                
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $caisses = Caisse::all();
        $users = User::all();
        return view('caisse_users/create',[
            
           
            'caisses' => $caisses,
            'users' => $users,
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'date' => 'required',
            'caisse_id' => 'required',
            
            
        ]);

        $caisse_user = new Caisse_user();
        $caisse_user->heure_debut = $request->heure_debut;
        $caisse_user->heure_fin = $request->heure_fin;
        $caisse_user->date = $request->date;
        $caisse_user->user_id = Auth::id();
        $caisse_user->caisse_id = $request->caisse_id;
       
       
        $caisse_user->save();

        return redirect('caisse_users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Caisse_user  $caisse_user
     * @return \Illuminate\Http\Response
     */
    public function show(Caisse_user $caisse_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caisse_user  $caisse_user
     * @return \Illuminate\Http\Response
     */
    public function edit(Caisse_user $caisse_user)
    {
        $users= User::all();
        $caisses= Caisse::all();
        $caisse_user = Caisse_user::find($caisse_user->id);
        
        return view('caisse_users/edit', [
         'caisse_user'=>$caisse_user,
            'users'=>$users,
            'caisses'=>$caisses,
           
    
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caisse_user  $caisse_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caisse_user $caisse_user)
    {
        $request->validate([
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'date' => 'required',
            'caisse_id' => 'required',
            
            
        ]);

        $caisse_user = new Caisse_user();
        $caisse_user->heure_debut = $request->heure_debut;
        $caisse_user->heure_fin = $request->heure_fin;
        $caisse_user->date = $request->date;
        $caisse_user->user_id = Auth::id();
        $caisse_user->caisse_id = $request->caisse_id;
       
       
        $caisse_user->save();

        return redirect('caisse_users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caisse_user  $caisse_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caisse_user $caisse_user)
    {
        $caisse_user = Caisse_user::find($caisse_user->id);
        $caisse_user->delete();

        return redirect('caisse_users');
    }
}
