@extends('layouts.app')
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <strong>Employee List</strong>
                    <a href="{{ route('employee.create') }}" class="btn btn-primary btn-xs float-end py-0">Create
                        Employee</a>
                    <table class="table table-responsive table-bordered table-stripped" style="margin-top:10px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Joining Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['email'] }}</td>
                                    <td>{{ $item['joining_date'] }}</td>
                                    <td><span type="button"
                                            class="btn  {{ $item['is_active'] == 1 ? 'btn-success' : 'btn-danger' }} btn-xs py-0">{{ $item['is_active'] == 1 ? 'Active' : 'Inactive' }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('employee.show', $item->id) }}"
                                                class="btn btn-primary btn-xs py-0 mx-1">Show</a>
                                            <a href="{{ route('employee.edit', $item->id) }}"
                                                class="btn btn-warning btn-xs py-0 mx-1">Edit</a>
                                            <form action="{{ route('employee.destroy', $item->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-xs py-0">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
