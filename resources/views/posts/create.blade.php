@extends('layouts.app') {{-- Assuming you have a layout template --}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (session('notification'))
            <div class="alert alert-{{ session('notification.alert') }}">
                {!! session('notification.message') !!}
            </div>
        @endif
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a New Post</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.store') }}">
                            @csrf

                            {{-- <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div> --}}

                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="year">Year</label>
                                <input type="number" name="year" id="year" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="resource_link">Resource Link (Optional)</label>
                                <input type="text" name="resource_link" id="resource_link" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
