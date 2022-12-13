@extends('layouts.app')

@section('page-title')
   Pratica n° {{$pratica_singola->pratica_n°}}
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="pratica">
                        <ul>
                            <h5>Nome e Cognome: {{$pratica_singola->name . ' '}} {{$pratica_singola->lastname}} </h5>
                            <li>Data di nascita:{{$pratica_singola->date_of_birth}}</li>
                            <li>Email: {{$pratica_singola->email}}</li>
                            <li>Pratica n°: {{$pratica_singola->pratica_n°}}</li>
                            <li>Data Appuntamento: {{$pratica_singola->meet_date}}</li>
                            <li>Descrizione del caso: <br>{{$pratica_singola->descrizione}}</li>
                        </ul>

                        <div class="d-flex">
                            <a class="btn btn-primary" href="{{route('admin.customers.edit' , ['customer' => $pratica_singola->id])}}" role="button">Modifica pratica</a>
                            <form class="ml-3" action="{{route('admin.customers.destroy' , ['customer' => $pratica_singola->id])}}" method="post" >
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Cancella" onclick="return confirm('Vuoi davvero cancellare la pratica n° {{$pratica_singola->pratica_n°}}')">
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection