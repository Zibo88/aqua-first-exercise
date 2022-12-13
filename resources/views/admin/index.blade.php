@extends('layouts.app')

@section('page-title')
   Tutte le pratiche
@endsection


@section('content')
    <section>
        <div class="container">
            @if($show_deleted_message === 'yes')
	            <div class="alert alert-success" role="alert">
	                Pratica eliminata con successo
	            </div>
            @endif
            <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                @foreach ($customers as $customer)
                <div class="col-6 mt-4">
                    <div class="card p-2">
                        <ul>
                            <h5> Nome e Cognome: {{$customer->name . ' '}} {{$customer->lastname}} </h5>
                            <li>Email: <br> {{$customer->email}}</li>
                            <li>Pratica n°: {{$customer->pratica_n°}}</li>
                        </ul>
                        <a class="btn btn-primary" href="{{route('admin.customers.show', ['customer' =>$customer->id])}}"> Maggiori info </a>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </section>
@endsection