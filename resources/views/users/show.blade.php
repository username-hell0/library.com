@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Show</h1>

        <div class="d-flex mb-3">
            <a class="btn btn-success mr-1"
               href="{{ route('users.edit', $user->id) }}">Edit</a>

            <form method="POST" action="{{ route('users.verify', $user) }}" class="mr-1">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary">Verify</button>
            </form>

            <form method="POST" action="{{ route('users.destroy', $user) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>

        <table class="table table-bordered">
            <tbody>
            <tr>
                <th scope="row">Id</th>
                <th>{{ $user->id }}</th>
            </tr>
            <tr>
                <th>Name</th>
                <th>{{ $user->name }}</th>
            </tr>
            <tr>
                <th>Email</th>
                <th>{{ $user->email }}</th>
            </tr>
            <tr>
                <th>Verify</th>
                <th>{{ $user->status }}</th>
            </tr>
            </tbody>
        </table>
    </div>

@endsection
