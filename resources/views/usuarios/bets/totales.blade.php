@extends('layouts.master')

@section('title', 'Quinielas')

@section('content')
    @if(session('success'))
    <p>{{ session('success') }}</p>
    @endif

    <table>
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($userTotals as $userTotal)
            <tr>
                <td>{{ $userTotal['user']->name }}</td>
                <td>{{ $userTotal['total_final'] }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>

@endsection
{{-- 
<h1>Totales Finales por Usuario</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Total Final</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userTotals as $userTotal)
                <tr>
                    <td>{{ $userTotal['user']->name }}</td>
                    <td>{{ $userTotal['total_final'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}