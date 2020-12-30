<?php

namespace App\Http\Controllers;
use App\Compte;
use App\Caisse;
use App\Caisse_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Caisse_detailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caisses = Caisse::all();
        $comptes = Compte::all();
        $caisse_details = DB::table('caisse_details')
            ->join('caisses', 'caisse_details.caisse_id', '=', 'caisses.id')
            
            ->join('comptes', 'caisse_details.compte_id', '=', 'comptes.id')
         
            ->select('caisses.*','comptes.*','caisse_details.*')
            ->get();

            return view('caisse_details/index',[
                'caisse_details' => $caisse_details,
                'caisses' => $caisses,
                
                'comptes' => $comptes,
                
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comptes = Compte::all();
 $caisses = Caisse::all();
 

    # code...
    return view('caisse_details/create',
   ['comptes'=>$comptes,'caisses'=>$caisses]);
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
            'compte_id' =>'required',
            'caisse_id' =>'required',
            'type_action' =>'required',
            'somme' =>'required',
            'libelle' =>'required']);
        $caisse_detail= new Caisse_detail();
        $caisse_detail->compte_id= $request->compte_id;
       
        $caisse_detail->caisse_id= $request->caisse_id;
        $caisse_detail->type_action= $request->type_action;
        $caisse_detail->somme= $request->somme;
        $caisse_detail->libelle= $request->libelle;
        
        $caisse_detail->save();

         if($caisse_detail->type_action === 'encaissement'){

        $caisse = Caisse::find($caisse_detail->caisse_id);
        // $caisse->solde_caisse=0;
        $caisse->solde_caisse=$caisse->solde_caisse + $caisse_detail->somme;
        $caisse->save();

        

        $compte = Compte::find($caisse_detail->compte_id);
        // $compte->solde=0;
        $compte->solde=$compte->solde + $caisse_detail->somme;
        $compte->save();

         }
        
         elseif($caisse_detail->type_action==='decaissement'){
            $caisse = Caisse::find($caisse_detail->caisse_id);
            $caisse->solde_caisse=$caisse->solde_caisse - $caisse_detail->somme;
            $caisse->save();
    
          
    
            $compte = Compte::find($caisse_detail->compte_id);
            $compte->solde=$compte->solde - $caisse_detail->somme;
            $compte->save();
        
    }
 
        return redirect('caisse_details');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Caisse_detail  $caisse_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Caisse_detail $caisse_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caisse_detail  $caisse_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Caisse_detail $caisse_detail)
    {
        $comptes= Compte::all();
        $caisses= Caisse::all();
         
        $caisse_detail= Caisse_detail::find($caisse_detail->id);
        return view('caisse_details/edit', [
         'caisse_detail'=>$caisse_detail,
            'comptes'=>$comptes,
            'caisses'=>$caisses,
           
    
        ]);
    }

   
    public function update(Request $request, Caisse_detail $caisse_detail)
    {
        $request->validate([
            'compte_id' =>'required',
            'caisse_id' =>'required',
            'type_action' =>'required',
            'somme' =>'required',
            'libelle' =>'required'
            
           
        ]);
        $caisse_detail= new Caisse_detail();
        $caisse_detail->compte_id= $request->compte_id;
       
        $caisse_detail->caisse_id= $request->caisse_id;
        $caisse_detail->type_action= $request->type_action;
        $caisse_detail->somme= $request->somme;
        $caisse_detail->libelle= $request->libelle;
        
        $caisse_detail->save();
        return redirect('caisse_details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caisse_detail  $caisse_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caisse_detail $caisse_detail)
    {
        $caisse_detail = Caisse_detail::find($caisse_detail->id);
        $caisse_detail->delete();

        return redirect('caisse_details');
    }
}