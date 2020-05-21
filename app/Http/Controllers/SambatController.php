<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SambatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = \App\Sambat::all();

        foreach($items as $item)
        {
            $tema = \App\Tema::find($item->id_tema);
            $kategori = \App\Kategori::find($tema->id_Kategori);
            $item['tema'] = $tema;
            $item['kategori'] = $kategori;
        }

        return $items;
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
        $validateData = $request->validate([
            'konten' => 'required',
            'id_tema' => 'required',
        ]);

        $storeData = \App\Sambat::create([
            'id_tema' => $request->id_tema,
            'konten' => $request->konten,
            'inisial' => $request->inisial,
        ]);

        return $storeData;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
