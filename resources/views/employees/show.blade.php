@extends('layouts.app')
@section('content')
    <a class="text-light" href="{{ route('employee.index') }}">Back To Home</a>
    <div class="card">
        <div class="card-body">
            <p style="font-size:20px; font-weight:bold;">Employee details</p>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" value="{{ $data->name }}" readonly>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" value="{{ $data->email }}" readonly>
            </div>

            <div class="form-group">
                <label for="joining_date">Joining date</label>
                <input type="date" class="form-control" value="{{ $data->joining_date }}" readonly>
            </div>

            <div class="form-group">
                <label for="joining_salary">Joining salary</label>
                <input type="number" class="form-control" value="{{ $data->joining_salary }}" readonly>
            </div>

            <div class="form-group">
                <label for="is_active">Active</label><br>
                <input type="checkbox" {{ $data->is_active == '1' ? 'checked' : '' }} readonly />
            </div>
            <a href="{{ route('employee.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
