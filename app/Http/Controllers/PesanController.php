<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = \App\Pesan::all();

        foreach($items as $item){
            $tema = \App\Tema::find($item->id_tema);
            $kategori = \App\Kategori::find($tema->id_Kategori);
            $item['tema'] = $tema;
            $item['kategori'] = $kategori;
        }

        return $items;
    }

    public function loadVerifieds()
    {
        $items = \App\Pesan::where([
            ['is_checked','=',true],
            ['is_archived','=',false]
        ])->get();

        foreach($items as $item){
            $tema = \App\Tema::find($item->id_tema);
            $kategori = \App\Kategori::find($tema->id_Kategori);
            $item['tema'] = $tema;
            $item['kategori'] = $kategori;
        }

        return $items;
    }

    public function loadUnverifieds()
    {
        $items = \App\Pesan::where([
            ['is_checked','=',false],
            ['is_archived','=',false]
        ])->get();

        foreach($items as $item){
            $tema = \App\Tema::find($item->id_tema);
            $kategori = \App\Kategori::find($tema->id_Kategori);
            $item['tema'] = $tema;
            $item['kategori'] = $kategori;
        }

        return $items;
    }

    public function loadArchiveds()
    {
        $items = \App\Pesan::where([
            ['is_archived','=',true]
        ])->get();

        foreach($items as $item){
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
        if($request->inisial == null){
            $request->inisial = 'anonim';
        }

        \App\Pesan::create([
            'konten' => $request->konten,
            'id_tema' => $request->id_tema,
            'inisial' => $request->inisial,
        ]);

        return 'new pesan saved';
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
    public function update(Request $request)
    {

        $target = \App\Pesan::find($request->id);

        $target->inisial = $request->inisial;
        $target->id_tema = $request->tema['id'];
        $target->is_archived = $request->is_archived;
        $target->konten = $request->konten;
        $target->is_checked = $request->is_checked;
        $target->save();

        // $target = \App\Pesan::find($request->id)->update([
        //     'inisial' => $request->inisial,
        //     'is_checked' => $request->is_checked,
        //     'id_tema' => $request->tema['id'],
        //     'konten' => $request->konten,
        //     'is_archived' => $request->is_archived,
        // ]);

        return 'edited';
    }

    public function verify($id)
    {
        $target = \App\Pesan::find($id);
        $target->is_checked = true;
        $target->save();

        return 'verified';
    }

    public function archive($id)
    {
        $target = \App\Pesan::find($id);
        $target->is_archived = true;
        $target->save();

        return 'archived';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target = \App\Pesan::find($id)->delete();
        return true;
    }
}
