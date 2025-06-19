@extends('layouts.admin')
@section('content')
<div class="webcrawler-admin-settings">
    <h3>{{ __('webcrawler::webcrawler.settings_title') }}</h3>
    <form method="POST" action="{{ route('admin.webcrawler.settings.save') }}">
        @csrf
        <div class="form-group">
            <label>{{ __('webcrawler::webcrawler.crawl_interval') }}</label>
            <select name="interval" class="form-control">
                <option value="daily">{{ __('webcrawler::webcrawler.daily') }}</option>
                <option value="weekly">{{ __('webcrawler::webcrawler.weekly') }}</option>
                <option value="monthly">{{ __('webcrawler::webcrawler.monthly') }}</option>
                <option value="custom">{{ __('webcrawler::webcrawler.custom') }}</option>
            </select>
        </div>
        <div class="form-group" id="custom-cron-group" style="display:none;">
            <label>{{ __('webcrawler::webcrawler.cron_expression') }}</label>
            <input type="text" name="cron_expression" class="form-control" placeholder="* * * * *">
        </div>
        <div class="form-group">
            <label>{{ __('webcrawler::webcrawler.trusted_websites') }}</label>
            <textarea name="trusted_websites" class="form-control" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('webcrawler::webcrawler.save_settings') }}</button>
    </form>
    <hr>
    <h4>{{ __('webcrawler::webcrawler.per_source_schedule') }}</h4>
    <div id="per-source-schedule">
        <!-- Per-source scheduling UI (to be loaded via JS) -->
    </div>
</div>
<script>
$(document).ready(function() {
    $('select[name=interval]').change(function() {
        if ($(this).val() === 'custom') {
            $('#custom-cron-group').show();
        } else {
            $('#custom-cron-group').hide();
        }
    });
});
</script>
@endsection
