@extends('layouts.app')

@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">

        <div class="border-bottom pb-2 mb-4">
            Ajout d'un nouvel etudiant
        </div>

        <div class="mt-4 alert alert-success">
            @if(session()->get('success'))
                {{session()->get('success')}}
            @endif
        </div>

        <div>
            @if($errors->any())
                <ul class="alert alert-danger">
                    
                        @foreach($errors->all() as $error)

                            <li>{{$error}}</li>

                        @endforeach
                </ul>
            @endif
            <form action="{{route('etudiant.store')}}" method="post" style="width:65%;" class="offset-md-2">
           
            @csrf

            <input class="form-control mb-2" type="text" name="nom" placeholder=" Nom" aria-label="">
            <input class="form-control mb-2" type="text" name="prenom" placeholder=" Prenom" value="" aria-label="" >
            <input class="form-control mb-2" type="text" name="numero" value="" placeholder="numero" aria-label="" >

            <select name="classe_id" class="form-control " id="" style="width: 50% ;">
                <option value="">classe</option>
                @foreach($classes as $classe)
                    <option value="{{$classe->id}}">{{$classe->libelle}}</option>
                @endforeach

            </select>

            <button class="mt-3 btn btn-primary" type="submit"> Ajouter</button>
            <button class="mt-3 btn btn-danger" type="submit"> <a class="navbar-brand" href="{{route('liste.etudiant')}}">Annuler </a> </button>

            </form>
        </div>
        
    </div>

@endsection