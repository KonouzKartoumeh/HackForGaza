@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(session('notification'))
    <div class="alert alert-{{ session('notification.alert') }}">
        {{ session('notification.message') }}
    </div>
@endif
                <div class="card-header">Create a New Date Frame Info</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('events_Info.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <textarea name="title" id="title" class="form-control" rows="5" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>

                        <div id="resourceLinks">
                            <div class="resource-link-container">
                                <div class="form-group">
                                    <label for="resource_link">Resource Link </label>
                                    <input type="text" name="resource_link[]" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="data_type_id">Data Type</label>
                                    <select name="data_type_id[]" class="form-control">
                                        <option value="">Select a data type</option>
                                        @foreach($dataTypes as $dataType)
                                            <option value="{{ $dataType->id }}">{{ $dataType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-success" id="addResourceLink">Add Resource Link</button>
                        </div>

                        <div class="form-group">
                            <label for="image">Image (Optional)</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <div class "form-group">
                            <label for="description">Description (Optional)</label>
                            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="priority_level">Priority Level</label>
                            <input type="checkbox" name="priority_level" id="priority_level" value="1" @if(old('priority_level') == 1) checked @endif>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create Event Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript to add more resource link input fields
    document.addEventListener('DOMContentLoaded', function() {
        const addResourceLinkButton = document.getElementById('addResourceLink');
        const resourceLinksContainer = document.getElementById('resourceLinks');

        addResourceLinkButton.addEventListener('click', function() {
            const resourceLinkGroup = document.createElement('div');
            resourceLinkGroup.classList.add('resource-link-container');

            const resourceLinkInput = document.createElement('div');
            resourceLinkInput.classList.add('form-group');
            resourceLinkInput.innerHTML = `
                <label for="resource_link">Resource Link (Optional)</label>
                <input type="text" name="resource_link[]" class="form-control">
            `;

            const dataTypeInput = document.createElement('div');
            dataTypeInput.classList.add('form-group');
            dataTypeInput.innerHTML = `
                <label for="data_type_id">Data Type (Optional)</label>
                <select name="data_type_id[]" class="form-control">
                    <option value="">Select a data type</option>
                    @foreach($dataTypes as $dataType)
                        <option value="{{ $dataType->id }}">{{ $dataType->name }}</option>
                    @endforeach
                </select>
            `;

            resourceLinkGroup.appendChild(resourceLinkInput);
            resourceLinkGroup.appendChild(dataTypeInput);
            resourceLinksContainer.appendChild(resourceLinkGroup);
        });
    });
</script>
@endsection