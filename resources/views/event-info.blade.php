@extends('layouts.app')

@section('content')


<table >
    <thead>
        <tr>
            <th>Date</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th> <!-- Add a column for actions -->
        </tr>
    </thead>
    <tbody>
        @foreach($eventInfo as $info)
            <tr>
                <td>{{ $info->date }}</td>
                <td>{{ $info->title }}</td>
                <td>{{ $info->description }}</td>
                <td>
                    <a href="{{ route('event-info.edit', ['id' => $info->id]) }}" class="btn btn-primary">Edit</a>
                </td>            </tr>
        @endforeach
    </tbody>
</table>
@endsection