@extends('layouts.app-worker')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Užduoties Pavadinimas</th>
            <th scope="col">Užduoties Aprašymas</th>
            <th scope="col">Užduoties Skyrėjas</th>
            <th scope="col">Užduoties Sukūrimo Data</th>
            <th scope="col">Užduoties Atnaujinimo Data</th>
            <th scope="col">Alikti</th>
        </tr>
        </thead>
        <tbody>
        @foreach($myDuties as $duty)
            <tr>
                <th scope="row">{{ $duty->duty_title }}</th>
                <td>{{ $duty->duty_description }}</td>
                <td>{{ $duty->duty_created_by }}</td>
                <td>{{ $duty->created_at }}</td>
                <td>{{ $duty->updated_at }}</td>
                <td>
                    <a href="{{ route('atlikti-uzduoti', $duty->id) }}">
                        Atlikta
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
