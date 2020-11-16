@extends('layouts.app-leader')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Užduoties Pavadinimas</th>
            <th scope="col">Užduoties Aprašymas</th>
            <th scope="col">Užduoties Darbuotojas</th>
            <th scope="col">Užduoties Skyrėjas</th>
            <th scope="col">Užduoties Statusas</th>
            <th scope="col">Užduoties Sukūrimo Data</th>
            <th scope="col">Užduoties Atnaujinimo Data</th>
            <th scope="col">Ištrinti</th>
        </tr>
        </thead>
        <tbody>
        @foreach($duties as $duty)
            <tr>
                <th scope="row">{{ $duty->id }}</th>
                <td>{{ $duty->duty_title }}</td>
                <td>{{ $duty->duty_description }}</td>
                <td>{{ $duty->duty_assigned_to }}</td>
                <td>{{ $duty->duty_status }}</td>
                <td>{{ $duty->duty_created_by }}</td>
                <td>{{ $duty->created_at }}</td>
                <td>{{ $duty->updated_at }}</td>
                <td>
                    <a href="{{ route('naikinti-uzduoti', $duty->id) }}">
                        Ištrinti
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
