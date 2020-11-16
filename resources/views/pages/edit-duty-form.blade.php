@extends('layouts.app-leader')

@section('content')
    <form class="pt-5 w-50 m-auto" action="{{ route('paredaguoti-uzduoti', $requestedDuty->id) }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="duty_title">Užduoties Pavadinimas</label>
                <input type="text" class="form-control" id="duty_title" name="duty_title" value="{{ $requestedDuty->duty_title }}" required>
                @error('duty_title')
                <div class="text-danger" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="duty_assigned_to">Užduoties Darbuotojas</label>
                <input type="text" class="form-control" id="duty_assigned_to" name="duty_assigned_to" value="{{ $requestedDuty->duty_assigned_to }}" required>
                @error('duty_assigned_to')
                <div class="text-danger" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </div>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="duty_description">Užduoties Aprašymas</label>
                <input type="text" class="form-control" id="duty_description" name="duty_description" value="{{ $requestedDuty->duty_description }}" required>
                @error('duty_description')
                <div class="text-danger" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Sukurti</button>
    </form>
@endsection
