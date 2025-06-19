@extends('layouts.admin')
@section('content')
<div class="webcrawler-admin-sources">
    <h3>{{ __('webcrawler::webcrawler.sources_title') }}</h3>
    <table class="table" id="sources-table">
        <thead>
            <tr>
                <th>{{ __('webcrawler::webcrawler.source_name') }}</th>
                <th>{{ __('webcrawler::webcrawler.source_url') }}</th>
                <th>{{ __('webcrawler::webcrawler.type') }}</th>
                <th>{{ __('webcrawler::webcrawler.active') }}</th>
                <th>{{ __('webcrawler::webcrawler.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop through sources dynamically via JS --}}
        </tbody>
    </table>
    <button class="btn btn-success" id="add-source-btn">{{ __('webcrawler::webcrawler.add_source') }}</button>
</div>
<script src="/plugins/webcrawler/public/js/crawler.js"></script>
<!-- Modal for source form -->
<div class="modal fade" id="sourceModal" tabindex="-1" role="dialog" aria-labelledby="sourceModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sourceModalLabel">{{ __('webcrawler::webcrawler.add_source') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Source form will be loaded here via JS -->
      </div>
    </div>
  </div>
</div>
@endsection
