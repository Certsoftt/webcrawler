<?php
namespace WebCrawler\Repositories;

use WebCrawler\Models\CrawlerSource;
use WebCrawler\Models\CrawlerLog;
use WebCrawler\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebCrawlerRepository
{
    public function getSources() { return CrawlerSource::all(); }

    public function addSource(Request $request)
    {
        try {
            $data = $request->only(['name', 'url', 'type', 'active', 'meta']);
            $validator = Validator::make($data, [
                'name' => 'required|string',
                'url' => 'required|url',
                'type' => 'required|string',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            $source = CrawlerSource::create($data);
            // Audit log
            $this->logUserAction(auth()->id(), 'add_source', $source->id, $data);
            return response()->json($source);
        } catch (\Exception $e) {
            \Log::error('Add source failed: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to add source.'], 500);
        }
    }

    public function updateSource(Request $request, $id)
    {
        try {
            $source = CrawlerSource::findOrFail($id);
            $data = $request->only(['name', 'url', 'type', 'active', 'meta']);
            $source->update($data);
            // Audit log
            $this->logUserAction(auth()->id(), 'update_source', $source->id, $data);
            return response()->json($source);
        } catch (\Exception $e) {
            \Log::error('Update source failed: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to update source.'], 500);
        }
    }

    public function deleteSource($id)
    {
        try {
            $source = CrawlerSource::findOrFail($id);
            $source->delete();
            // Audit log
            $this->logUserAction(auth()->id(), 'delete_source', $id);
            return response()->json(['status' => 'deleted']);
        } catch (\Exception $e) {
            \Log::error('Delete source failed: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to delete source.'], 500);
        }
    }

    public function getLogs() { return CrawlerLog::orderByDesc('created_at')->limit(100)->get(); }
    public function getSettings() { return []; }

    public function logUserAction($userId, $action, $sourceId = null, $details = null)
    {
        // Implement audit logging (e.g., to crawler_logs or a dedicated audit table)
        \Log::info('WebCrawler audit', [
            'user_id' => $userId,
            'action' => $action,
            'source_id' => $sourceId,
            'details' => $details,
            'timestamp' => now(),
        ]);
    }
}
