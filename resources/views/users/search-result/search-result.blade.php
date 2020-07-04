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
