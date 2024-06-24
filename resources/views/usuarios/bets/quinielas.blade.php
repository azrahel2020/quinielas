@extends('layouts.master')

@section('title', 'Quinielas')

@section('content')

    <div class="breadcrum">
        
    </div>
    <!-- container fit -->
    <div class="container-fit">
        <!-- card quiniela -->
        @foreach ($quinielas as $quiniela)
            <div class="card-quiniela">
            <div class="card-quiniela__fecha">
                    <div class="inicio">
                        {{ $quiniela->inicio->format('d-m-Y') }}
                       
                    </div>
                    <div class="final">
                        {{ $quiniela->final->format('d-m-Y') }}
                    </div>
                </div>
                <img src="{{ asset('img/quinielas/' . $quiniela->image) }}" class="card-quiniela__img" alt="{{ $quiniela->name }}">
                {{-- <img src="./img/premier.png" class="card-quiniela__img"alt=""> --}}
                <div class="card-quiniela__nombre">
                    {{ $quiniela->name }}
                </div>
                
                  
                <div class="botones">
                    <a href="{{ route('usuarios.bets.calcularPuntos', ['quinielaId' => $quiniela->id]) }}">
                        <div class="botones__boton">
                            <i class="fa-solid fa-dollar-sign"></i>
                        </div>
                    </a>
                    <a href="{{ route('usuarios.bets.updateTotalFinal', ['quinielaId' => $quiniela->id]) }}">
                        <div class="botones__boton">
                            <i class="fa-solid fa-ranking-star"></i>
                        </div>
                    </a>
                </div>
                
                
            </div>
        @endforeach
        
       
    </div>

    

@endsection


