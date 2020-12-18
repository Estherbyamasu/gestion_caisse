<?php

namespace App\Http\Controllers;

use App\Guichet;
use Illuminate\Http\Request;

class GuichetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guichets = Guichet::all();
        return view('guichets.index', compact('guichets'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guichets.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guichet = new Guichet();
        $guichet->numero_guichet = $request->numero_guichet;
        $guichet->save();
        return redirect('guichets');
    }
    public function show($id)
    {
        $guichet_caisses = Guichet::with(['caisses'])->find($id);
        return view('guichets.show',compact('guichet_caisses'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Guichet  $guichet
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $guichet_caisses = Guichet::with(['caisses'])->find($id);
    //     return view('guichets.show',compact('guichet_caisses'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guichet  $guichet
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $guichets = Guichet::find($id);
    //     return view('guichets.edit', compact('guichets'));
    // }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guichet  $guichet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guichet =Guichet::find($id);
        $guichet->numero_guichet = $request->get('numero_guichet');
        $guichet->save();
        return redirect('guichets');
    }
    public function edit(Guichet $guichet)
    {
        
        $guichet = Guichet::find($guichet->id);
        return view('guichets/edit', ['guichet' => $guichet]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guichet  $guichet
     * @return \Illuminate\Http\Response
     */

   
    public function destroy($id)
    {
    $guichet = Guichet::find($id);
    $guichet->delete();
    return redirect('guichets')->with("success", "Le guichet est supprimé !");
}

}
