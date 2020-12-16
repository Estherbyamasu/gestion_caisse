<?php

namespace App\Http\Controllers;
use App\Caisse;
use App\User;
use App\Caisse_Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class Caisse_utilisateursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $caisses = Caisse::all();
        $users = User::all();
        $caisse_utilisateurs = DB::table('caisse_utilisateurs')
            ->join('caisses', 'caisse_utilisateurs.caisse_id', '=', 'caisses.id')
            
            ->join('users', 'factures.user_id', '=', 'users.id')
         
            ->select('caisses.*','users.*','caisse_utilisateurs.*')
            ->get();

            return view('caisse_utilisateurs/index',[
                'caisse_utilisateurs' => $caisse_utilisateurs,
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
        return view('caisse_utilisateurs/create',[
            
           
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
            'caisse_id' => 'required',
            
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'date' => 'required'
        ]);

        $caisse_utilisateur = new Facture();
        $caisse_utilisateur->caisse_id = $request->caisse_id;
        $caisse_utilisateur->user_id = Auth::id();
        $caisse_utilisateur->heure_debut = $request->heure_debut;
        $caisse_utilisateur->heure_fin = $request->heure_fin;
        $caisse_utilisateur->date = $request->date;
        $caisse_utilisateur->save();

        return redirect('caisse_utilisateurs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Caisse_Utilisateur  $caisse_Utilisateur
     * @return \Illuminate\Http\Response
     */
    public function show(Caisse_Utilisateur $caisse_Utilisateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caisse_Utilisateur  $caisse_Utilisateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Caisse_Utilisateur $caisse_Utilisateur)
    {
      
        $caisses = Caisse::all();
        
        $users = User::all();
        $caisse_utilisateur = Caisse_utilisateur::find($caisse_utilisateur->id);
        return view('caisse_utilisateurs/edit',[
            'caisse_utilisateur' => $caisse_utilisateur,
            'caisses' => $caisses,
            
          
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caisse_Utilisateur  $caisse_Utilisateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caisse_Utilisateur $caisse_Utilisateur)
    {
        $request->validate([
            'caisse_id' => 'required',
            
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'date' => 'required'
        ]);

        $caisse_utilisateur = new Facture();
        $caisse_utilisateur->caisse_id = $request->caisse_id;
        $caisse_utilisateur->user_id = Auth::id();
        $caisse_utilisateur->heure_debut = $request->heure_debut;
        $caisse_utilisateur->heure_fin = $request->heure_fin;
        $caisse_utilisateur->date = $request->date;
        $caisse_utilisateur->save();

        return redirect('caisse_utilisateurs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caisse_Utilisateur  $caisse_Utilisateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caisse_Utilisateur $caisse_Utilisateur)
    {
        $caisse_utilisateur = Caisse_utilisateur::find($caisse_utilisateur->id);
        $caisse_utilisateur->delete();

        return redirect('factures');
    }
}
