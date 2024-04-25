@extends('base')
@section('title', 'Détails des Oeuvres')

@section('content')
    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        @vite('resources/css/app.css')
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Oeuvre
                </th>
                <th scope="col" class="px-6 py-3">
                    Auteur
                </th>
                <th scope="col" class="px-6 py-3">
                   Année
                </th>
                <th scope="col" class="px-6 py-3">
                   Catégorie
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
                {{-- <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Supprimer</span>
                </th> --}}
               
            </tr>
        </thead>
        <tbody>
            @foreach ($oeuvres as $oeuvre)
            <tr class="bg-blue border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    {{$oeuvre->nom}}
                </td>
                <td class="px-6 py-4">
                    {{$oeuvre->artiste->nom}}
                </td>
                <td class="px-6 py-4">
                    {{$oeuvre->annee}}
                </td>
                <td class="px-6 py-4">
                    {{$oeuvre->categorie->nomCategorie}}
                </td>
                <td class="px-6 py-4">
                    <div class="mt-auto bg-white p-2 flex justify-between"> 
                        <a href="{{ route('oeuvre.edit', $oeuvre->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-5">Modifier</a>
                        <form action="{{ route('oeuvre.destroy', $oeuvre->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-5" onclick="return confirmDelete(event)">Supprimer</button>
                        </form>
                    </div>
                </td>
                
                <script>
                function confirmDelete(event) {
                    if (!confirm('Êtes-vous sûr de vouloir supprimer ?')) {
                        event.preventDefault(); 
                    }
                }
                </script>
                </td>
            
            </tr>
            @endforeach
           
        </tbody>
    
    </table>
</div>

@endsection