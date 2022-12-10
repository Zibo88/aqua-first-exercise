@extends('layouts.app')

@section('page-title')
    Modifica Pratica
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    
                    <form action="{{route('admin.customers.update' , ['customer' => $pratica_to_update->id])}}" method="POST" class="row g-3 needs-validation" novalidate >
                        @csrf
                        @method('PUT')
                        <div class="col-md-4">
                          <label for="name" class="form-label">Nome</label>
                          <input type="text" class="form-control" id="name" name="name" value="{{old ('name' , $pratica_to_update->name)}}" required>
                        </div>

                        <div class="col-md-4">
                          <label for="lastname" class="form-label">Cognome</label>
                          <input type="text" class="form-control" id="lastname" name="lastname" value="{{old ('lastname' , $pratica_to_update->lastname)}}" required>
                        </div>

                        <div class="col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old ('email' , $pratica_to_update->email)}}">
                        </div>

                        <div class="col-md-6">
                          <label for="date_of_birth" class="form-label">Data di nascita</label>
                          <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"  value="{{old ('date_of_birth' , $pratica_to_update->date_of_birth )}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="pratica_n°" class="form-label">Pratica n°</label>
                            <input type="number" class="form-control" id="pratica_n°" name="pratica_n°" value="{{old ('pratica_n°' , $pratica_to_update->pratica_n°)}}" required>
                        </div>

                        <div class="col-md-12">
                            <label for="descrizione" class="form-label">Descrizione del caso:</label>
                            <textarea type="date" class="form-control" id="descrizione" name="descrizione">{{old ('descrizione') ? old ('descrizione') : $pratica_to_update->descrizione}}</textarea>
                        </div>

                        <div class="col-12">
                          <button class="btn btn-primary mt-3" type="submit" value="salva la nuova pratica">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection