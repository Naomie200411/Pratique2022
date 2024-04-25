<?php

namespace App\Http\Controllers;

use App\Http\Requests\OeuvreRequest;
use App\Models\Artiste;
use App\Models\Categorie;
use App\Models\Oeuvre;
use Illuminate\Http\Request;

class OeuvreController extends Controller
{
    public function index(){
        $oeuvres=Oeuvre::all();
        return view('show',Compact('oeuvres'));
    }

    public function create(){
        $artistes=Artiste::all();
        $categories=Categorie::all();
        return view('create' ,compact('artistes','categories'));
    }

    public function store(OeuvreRequest $request)
    {
     
       $validatedData = $request->validated();

        
        if($request->validated())
        {
            $oeuvre=new Oeuvre;
            $oeuvre->nom = $request->input('nom');
            $oeuvre->description = $request->input('description');
            $oeuvre->annee = $request->input('annee');
            $oeuvre->categorie_id = $request->input('categorie_id');
            $oeuvre->artiste_id = $request->input('artiste_id');
            
            $oeuvre->save();
            return to_route('oeuvre.index');
        }
        else{
            return redirect()->back()->withErrors($validatedData)->withInput();
        }    


    }

    public function edit(string $id)
    {
        $artistes=Artiste::all();
        $categories=Categorie::all();    
        $oeuvre = Oeuvre::findOrFail($id);
        return view('edit-oeuvre', compact('artistes','categories','oeuvre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OeuvreRequest $request, $id)
    {
        $oeuvre = Oeuvre::findOrFail($id);
        
        $validatedData = $request->validated();

        if ($request->validated()){
            

        $oeuvre->nom = $validatedData['nom'];
        $oeuvre->description = $validatedData['description'];
        $oeuvre->annee = $validatedData['annee'];
        $oeuvre->categorie_id = $validatedData['categorie_id'];
        $oeuvre->artiste_id = $validatedData['artiste_id'];

        $oeuvre->save();

        return redirect()->route('oeuvre.index');

    } else{
        return redirect()->back()->withErrors($validatedData)->withInput();
    }

        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $marche = Oeuvre::findOrFail($id);
        $marche->delete();
        return redirect()->route('oeuvre.index')
    ;
    }
}
