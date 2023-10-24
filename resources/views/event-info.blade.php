@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th> <!-- Add a column for actions -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eventInfo as $info)
                            <tr>
                                <td>{{ $info->date }}</td>
                                <td>{{ $info->title }}</td>
                                <td>{{ $info->description }}</td>
                                <td>
                                    <a href="{{ route('event-info.edit', ['id' => $info->id]) }}"
                                        class="btn btn-secondary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
