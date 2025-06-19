@extends('layouts.admin')
@section('content')
<div class="webcrawler-admin-logs">
    <h3>{{ __('webcrawler::webcrawler.logs_title') }}</h3>
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('webcrawler::webcrawler.level') }}</th>
                <th>{{ __('webcrawler::webcrawler.message') }}</th>
                <th>{{ __('webcrawler::webcrawler.source') }}</th>
                <th>{{ __('webcrawler::webcrawler.created_at') }}</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop through logs --}}
        </tbody>
    </table>
</div>
@endsection
