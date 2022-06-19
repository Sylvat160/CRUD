@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <h2>Liste des etudiants</h2>
        <div class="d-flex justify-content-between mb-4">
        {{ $listeE->links() }}
        
            <button type="button" class="btn btn-info"> <a class="navbar-brand" href=" {{route('etudiant.create')}} "> Ajouter un etudiant </a> </button>
        </div>
        @if(session()->has('suppression'))
        <div class="mt-4 alert alert-success">
           
                {{session()->get('suppression')}}
           
        </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Numero</th>
                <th scope="col">Classe</th>
                <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listeE as $etudiant)
                <tr>
                    <th scope="row">{{ $loop-> index + 1 }}</th>
                    <td>{{$etudiant->nom}}</td>
                    <td>{{$etudiant->prenom}}</td>
                    <td>{{$etudiant->numero}}</td>
                    <td> {{$etudiant->classe->libelle}} </td>
                    <td>
                        <a href="{{ route('etudiant.edit' ,[ 'etudiant'=>$etudiant->id  ] )}}" class="btn btn-info">Modifier</a>
                        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment supprimer cet etudiant ?')){ document.getElementById('form-{{$etudiant->id}}').submit() }">Supprimer</a>
                            <form id="form-{{ $etudiant->id }}" action=" {{ route('etudiant.supprimer' , ['etudiant'=>$etudiant->id]) }} " method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                            </form>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
            
        </table>
    </div>

@endsection
