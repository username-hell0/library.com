@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Page</h1>

        @include('users.filter.filter')
        @include('users.message.message')

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

            @include('users.search-result.search-result')

            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/search/user/user-search.js') }}"></script>
@endsection
