@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Page</h1>

        <a href="{{ route('users.create') }}"
            class="btn btn-success mb-3">Create</a>

        <table class="table">
            <thead>
            <tr>
                <th class="table-w-10 sorting"
                    data-type="desc" data-column="id"
                >
                    <span class="cursor-pointer">
                        Id
                        <i id="column_id" class="" aria-hidden="true"></i>
                    </span>
                </th>
                <th class="table-w-30 sorting"
                    data-type="asc" data-column="name"
                >
                    <span class="cursor-pointer">
                        Name
                        <i id="column_name" class="" aria-hidden="true"></i>
                    </span>
                </th>
                <th class="table-w-40 sorting"
                    data-type="asc" data-column="email"
                >
                    <span class="cursor-pointer">
                        Email
                        <i id="column_email" class="" aria-hidden="true"></i>
                    </span>
                </th>
                <th class="table-w-20 sorting"
                    data-type="asc" data-column="status"
                >
                    <span class="cursor-pointer">
                        Status
                        <i id="column_status" class="" aria-hidden="true"></i>
                    </span>
                </th>
            </tr>
            </thead>
            <tbody id="table-users">

            @foreach($usersList as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}">
                            {{ $user->name }}
                        </a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->status }}</td>
                </tr>
            @endforeach

            <td colspan="4">
                <div class="mt-4"></div>
                {{$usersList->links()}}
            </td>

            </tbody>
        </table>
    </div>
@endsection
