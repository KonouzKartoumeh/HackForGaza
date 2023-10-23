@extends('layouts.app')

@section('content')


<table >
    <thead>
        <tr>
            <th>Year</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th> <!-- Add a column for actions -->
        </tr>
    </thead>
    <tbody>
        @foreach($dateframeInfo as $info)
            <tr>
                <td>{{ $info->year }}</td>
                <td>{{ $info->content }}</td>
                <td>{{ $info->summary }}</td>
                <td>
                    <a href="{{ route('dateframe-info.edit', ['id' => $info->id]) }}" class="btn btn-primary">Edit</a>
                </td>            </tr>
        @endforeach
    </tbody>
</table>
@endsection