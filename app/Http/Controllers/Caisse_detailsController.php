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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caisse_detail  $caisse_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caisse_detail $caisse_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caisse_detail  $caisse_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caisse_detail $caisse_detail)
    {
        //
    }
}