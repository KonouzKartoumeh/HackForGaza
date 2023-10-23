@extends('layouts.app')

@section('content')



<form method="POST" action="{{ route('dateframe-info.update', ['id' => $dateframeInfo->id]) }}">
    @method('PUT')
    @csrf

    <!-- Form fields for editing Date Frame Info -->
    <div class="form-group">
        <label for="year">Year</label>
        <input type="text" name="year" id="year" value="{{ $dateframeInfo->year }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="content">Title</label>
        <input type="text" name="content" id="content" value="{{ $dateframeInfo->content }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="summary">Description</label>
        <textarea name="summary" id="summary" class="form-control">{{ $dateframeInfo->summary }}</textarea>
    </div>

    <!-- Add more form fields for editing as needed -->

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>





@endsection