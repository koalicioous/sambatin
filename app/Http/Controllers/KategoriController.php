<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = \App\Kategori::all();
        foreach($items as $item){
            $tema = \App\Tema::where([
                ['id_Kategori', '=', $item->id]
            ])->get();
            $item['temas'] = $tema;
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
            'nama' => ['required','unique:kategoris']
        ]);
        \App\Kategori::create([
            'nama' => $request->nama,
        ]);
        return $request;
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
        $target = \App\Kategori::find($id);
        $temas = \App\Tema::where([
            ['id_kategori', '=', $id],
        ])->get();

        if($temas->count()<1){
            $target->delete();
            return 'deleted itself';
        }else{
            foreach($temas as $tema){
                $tema->delete();
            }
            $target->delete();
            return  'deleted it and its temas';
        }
    }
}
