<?php
namespace WebCrawler\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use WebCrawler\Repositories\WebCrawlerRepository;
use WebCrawler\Models\Opportunity;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;

class WebCrawlerController extends Controller
{
    protected $crawler;
    public function __construct(WebCrawlerRepository $crawler)
    {
        $this->crawler = $crawler;
    }
    public function sourcesPage() { return view('webcrawler::admin.sources'); }
    public function logsPage() { return view('webcrawler::admin.logs'); }
    public function settingsPage() { return view('webcrawler::admin.settings'); }
    public function sources() { return response()->json($this->crawler->getSources()); }
    public function addSource(Request $request) {
        if (!Gate::allows('webcrawler.manage_sources')) {
            abort(403, 'Unauthorized');
        }
        return $this->crawler->addSource($request);
    }
    public function updateSource(Request $request, $id) {
        if (!Gate::allows('webcrawler.manage_sources')) {
            abort(403, 'Unauthorized');
        }
        return $this->crawler->updateSource($request, $id);
    }
    public function deleteSource($id) {
        if (!Gate::allows('webcrawler.manage_sources')) {
            abort(403, 'Unauthorized');
        }
        return $this->crawler->deleteSource($id);
    }
    public function logs() { return response()->json($this->crawler->getLogs()); }
    public function settings() { return response()->json($this->crawler->getSettings()); }
    public function contentPreview($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        $aiResult = Session::get('ai_result');
        return view('webcrawler::admin.content-preview', compact('opportunity', 'aiResult'));
    }
    public function sendToAI($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        // Placeholder: Call AI rewriting engine service
        $aiResult = app('WebCrawler\\Services\\AIRewriteService')->rewrite($opportunity->content);
        Session::flash('ai_result', $aiResult);
        return redirect()->route('admin.webcrawler.contentPreview', $id);
    }
    public function saveSettings(Request $request)
    {
        // Save crawl interval, cron, and trusted websites to config or DB
        // Placeholder: implement actual save logic
        return redirect()->back()->with('success', 'Settings saved!');
    }
}
