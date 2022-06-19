@extends('layouts.app')

@section('content')

<div class="my-3 p-3 bg-body rounded shadow-sm">

<div class="border-bottom pb-2 mb-4">
    Modifier
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
    <form action="{{route('etudiant.update' , ['etudiant'=>$etudiant->id])}}" method="post" style="width:65%;" class="offset-md-2">
   
    @csrf

    <input type="hidden" name="_method" value="put">

    <input class="form-control mb-2" type="text" name="nom" value="{{ $etudiant->nom }}" placeholder=" Nom" aria-label="">
    <input class="form-control mb-2" type="text" name="prenom" value="{{ $etudiant->prenom }}" aria-label="" >
    <input class="form-control mb-2" type="text" name="numero" value="{{ $etudiant->numero }}" aria-label="" >

    <select name="classe_id" class="form-control " id="" style="width: 50% ;">
        <option value="">classe</option>
        @foreach($classes as $classe)
            @if($classe->id == $etudiant->classe_id)
                <option value="{{$classe->id}}" selected>{{$classe->libelle}}</option>
            @else
                <option value="{{$classe->id}}" selected>{{$classe->libelle}}</option>
            
            @endif
        @endforeach

    </select>

    <button class="mt-3 btn btn-primary" type="submit"> Modifier</button>
    <button class="mt-3 btn btn-danger" type="submit"> <a class="navbar-brand" href="{{route('liste.etudiant')}}">Annuler </a> </button>

    </form>
</div>

</div>


@endsection