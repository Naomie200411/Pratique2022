@extends('base')
@section('title', 'ENREGISTREMENT DES OEUVRES')

@section('content')
@vite('resources/css/app.css')
<div class="flex justify-center items-center h-full">
    <form method="POST" action="{{ route('oeuvre.store') }}" class="w-full max-w-lg bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" >
        <h2 class="text-2xl mb-4 text-center font-bold">Remplissez le formulaire suivant:</h2>
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom :</label>
                <input type="text" name="nom" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nom" placeholder="Nom de l'oeuvre">
                @error('nom')
                    <span class="text-red-800">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description :</label>
                <textarea type="text" name="description" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="description" placeholder="Description de l'oeuvre"></textarea>
                @error('description')
                    <span class="text-red-800">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="annee" class="block text-gray-700 text-sm font-bold mb-2">Année</label>
                <input type="int" name="annee" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="annee">
                @error('annee')
                    <span class="text-red-800">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full md:w-1/2 px-4 mb-6 md:mb-0">
                <label for="artiste_id">Artiste </label>
                <select name="artiste_id" id="artiste_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @foreach ($artistes as $artiste)
                   
                    <option value="{{ $artiste->id }}">{{ $artiste->nom }} </option>
                    @endforeach 
                </select>
                @error('artiste_id')
                    <span class="text-red-800 bg-red-50">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full md:w-1/2 px-4 mb-6 md:mb-0">
                <label for="categorie_id">Catégorie </label>
                <select name="categorie_id" id="categorie_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @foreach ($categories as $categorie)
                   
                    <option value="{{ $categorie->id }}">{{ $categorie->nomCategorie }} </option>
                    @endforeach 
                </select>
                @error('categorie_id')
                    <span class="text-red-800 bg-red-50">{{ $message }}</span>
                @enderror
            </div>
            
        </div>
        <div class="flex justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Ajouter
            </button>
        </div>
    </form>
</div>
@endsection
