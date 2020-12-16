<?php

namespace App\Http\Controllers;
use App\Guichet;
use App\Caisse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CaissesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guichets = Guichet::all();
        $caisses = DB::table('guichets')
            ->join('caisses', 'caisses.guichet_id', '=', 'guichets.id')
            ->get();
        return view('caisses/index',[
            'caisses' => $caisses,
            'guichets' => $guichets
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guichets = Guichet::all();
        return view('caisses/create',[
           'guichets' => $guichets
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
            'guichet_id' => 'required',
            'numero_caisse' => 'required',
            'solde_caisse' => 'required'
        ]);

        $caisse = new Caisse();
        $caisse->guichet_id = $request->guichet_id;
        $caisse->numero_caisse = $request->numero_caisse;
        $caisse->solde_caisse = $request->solde_caisse;
        $caisse->save();

        return redirect('caisses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function show(Caisse $caisse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function edit(Caisse $caisse)
    {
        $guichets = Guichet::all();
        $caisse = Caisse::find($caisse->id);
        return view('caisses/edit',[
            'caisse' => $caisse,
            'guichets' => $guichets
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caisse $caisse)
    {
        $request->validate([
            'guichet_id' => 'required',
            'numero_caisse' => 'required',
            'solde_caisse' => 'required'
        ]);

        $caisse = new Caisse();
        $caisse->guichet_id = $request->guichet_id;
        $caisse->numero_caisse = $request->numero_caisse;
        $caisse->solde_caisse = $request->solde_caisse;
        $caisse->save();

        return redirect('caisses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caisse $caisse)
    {
        $caisse = Caisse::find($caisse->id);
        $caisse->delete();

        return redirect('caisses');
    }
}
