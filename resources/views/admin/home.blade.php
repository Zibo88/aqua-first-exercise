@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                   <div class="user-info">
                        <h3>Benvenuto Avv. {{ ucfirst($user->name) . ' '}}{{ucfirst($user->lastname)}}</h3>
                        <div>La tua email è: {{$user->email}}</div>
                   </div>
                </div>
            </div>
        </div>
    </section>
@endsection