@extends('layouts.admin')
@section('content')
<div class="webcrawler-content-preview">
    <h3>{{ __('webcrawler::webcrawler.content_preview') }}</h3>
    <div class="card mb-3">
        <div class="card-header">Original Content</div>
        <div class="card-body">
            <h5>{{ $opportunity->title }}</h5>
            <p>{{ $opportunity->summary }}</p>
            <div>{!! nl2br(e($opportunity->content)) !!}</div>
        </div>
    </div>
    <form method="POST" action="{{ route('admin.webcrawler.sendToAI', $opportunity->id) }}">
        @csrf
        <button type="submit" class="btn btn-primary">{{ __('webcrawler::webcrawler.send_to_ai') }}</button>
    </form>
    @if(isset($aiResult))
    <div class="card mt-3">
        <div class="card-header">{{ __('webcrawler::webcrawler.ai_result') }}</div>
        <div class="card-body">
            {!! nl2br(e($aiResult)) !!}
        </div>
    </div>
    @endif
</div>
@endsection
