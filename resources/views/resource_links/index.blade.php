<!-- resources/views/resource_codes/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Resource links</h1>


<div class="row">
    @php
function extractFacebookVideoId($url) {
    // Use regular expression to extract the video ID from the Facebook URL
    if (preg_match('/[?&]v=([^&]+)/', $url, $matches)) {
        return $matches[1];
    }

    return null; // Invalid Facebook video URL
}
@endphp
    @php $count = 0; @endphp

    @foreach ($resourceLinks as $video)
        @if ($count % 3 == 0)
            </div>
            <div class="row">
        @endif

        <div class="col-md-4">
            @if (str_contains($video->url, 'youtube.com'))
                @php
                    $videoUrl = $video->url; // Replace with your video URL
                    $embeddedUrl = preg_replace('/watch\?v=([a-zA-Z0-9_\-]+)/', 'embed/$1', $videoUrl);
                @endphp

                <div class="video-container">
                    <iframe width="100%" height="315" src="{{ $embeddedUrl }}" frameborder="0" allowfullscreen></iframe>
                </div>
                <!-- Embed YouTube Video -->
            @elseif (str_contains($video->url, 'instagram.com'))
                <!-- Embed Instagram Post -->
                <blockquote class="instagram-media" data-instgrm-permalink="{{ $video->url }}"></blockquote>
                <script async src="//www.instagram.com/embed.js"></script>
            @elseif (str_contains($video->url, 'facebook.com'))
                @php
                    $videoUrl = $video->url;
                    $videoId = null;

                    // Use regular expression to extract the video ID
                    if (preg_match('/[?&]v=([^&]+)/', $videoUrl, $matches)) {
                        $videoId = $matches[1];
                    }

                    // Check if a video ID was found and construct the embedded URL
                    if ($videoId) {
                        $embeddedUrl = "https://www.facebook.com/plugins/video.php?href=$videoUrl";
                    } else {
                        $embeddedUrl = null; // Invalid URL, handle accordingly
                    }
                @endphp

                @if ($embeddedUrl)
                    <div class="video-container">
                        <iframe src="{{ $embeddedUrl }}" width="100%" height="315" style="border:none;overflow:hidden"
                            scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
                    </div>
                @else
                    <p>Invalid Facebook video link</p>
                @endif
            @else
                <!-- Unknown Video Type -->
                <p>Video link doesn't match any known type</p>
            @endif
        </div>

        @php $count++; @endphp
    @endforeach
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>url</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($resourceLinks as $code)
            <tr>
                <td>{{ $code->id }}</td>
                <td><a href="{{ $code->url }}">{{ $code->url }}</a></td>
            </tr>
        @endforeach
    </tbody>

</table>


    </div>
@endsection
