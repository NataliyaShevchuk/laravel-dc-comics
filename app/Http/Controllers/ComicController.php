<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComicRequest;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Comic::all();

        return view('comics.index',[
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComicRequest $request)
    {
        $secureData = $request->validate();
        
        $moreData = $request->all();

        $moreData["price"] = (float) $moreData["price"];
        $moreData["available"] = !key_exists("available", $moreData) ? false : true;

        $data = new Comic();
        // Prende ogni chiave dell'array associativo e ne assegna il valore all'istanza del prodotto
        $data->fill($moreData);
        $data->save();

        return redirect()->route("comics.show", $data->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Comic::findOrFail($id);

        if ($data){
            echo 'mi dispiace ma abbiamo riscontrato un errore';
        }

        return view('comics.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Comic::find($id);

        return view('comics.create', [
            'data' => $data
        ]);
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
        $moreData = $request->all();

        if (!key_exists("series", $moreData)) {
            $moreData["series"] =  false;
        } else {
            $moreData["series"] = true;
        }

        $data = Comic::findOrFail($id);

        $data->update($moreData);


        return redirect()->route("products.show", $data->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Comic::findOrFail($id);

        $data->delete();

        return redirect()->route("comics.index");
    }
    
}
