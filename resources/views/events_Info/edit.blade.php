@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('event-info.update', ['id' => $eventInfo->id]) }}">
                        @method('PUT')
                        @csrf

                        <!-- Form fields for editing Date Frame Info -->
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="text" name="date" id="date" value="{{ $eventInfo->date }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ $eventInfo->title }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control">{{ $eventInfo->description }}</textarea>
                        </div>

                        <!-- Add more form fields for editing as needed -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection