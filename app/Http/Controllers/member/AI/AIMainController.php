<?php

namespace App\Http\Controllers\member\AI;

use App\Http\Controllers\Controller;
use App\Services\GeminiAIService;
use Illuminate\Http\Request;

class AIMainController extends Controller
{
    protected $aiService;
    // Inject service ke dalam controller
    public function __construct(GeminiAIService $aiService)
    {
        $this->aiService = $aiService;
    }
    public function ai()
    {
        return view('member.flowral.ai.index');
    }
    // Fungsi endpoint untuk AJAX Chat
    public function chat(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string|max:2000'
        ]);
        $response = $this->aiService->generateContent($request->prompt);
        // Convert markdown dari Gemini ke HTML render sederhana (untuk line breaks)
        $formattedResponse = nl2br(htmlspecialchars($response));
        // Bold parsing sederhana (opsional karena text biasa juga gampang dibaca)
        $formattedResponse = preg_replace('/\*\*(.*?)\*\*/s', '<strong>$1</strong>', $formattedResponse);
        return response()->json([
            'success' => true,
            'message' => $formattedResponse
        ]);
    }

    // Endpoint khusus AI Generate Task Description
    public function generateTask(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);
        $description = $this->aiService->generateTaskDescription($request->title);
        return response()->json([
            'success' => true,
            'description' => $description
        ]);
    }

    // Endpoint AI Summarize Note
    public function summarizeNote(Request $request)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        // Bersihkan tag HTML (bold, img, div) yang dikirim TinyMCE agar AI fokus pada teks dan menghemat token
        $cleanContent = strip_tags($request->content);

        $summary = $this->aiService->summarizeNote($cleanContent);

        // Format bintang-bintang markdown dari Gemini menjadi HTML Bold
        $formattedSummary = nl2br(htmlspecialchars($summary));
        $formattedSummary = preg_replace('/\*\*(.*?)\*\*/s', '<strong>$1</strong>', $formattedSummary);

        return response()->json([
            'success' => true,
            'summary' => $formattedSummary
        ]);
    }

    // Endpoint AI Suggest Workflow (Project)
    public function suggestWorkflow(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $workflow = $this->aiService->suggestWorkflow($request->name);

        return response()->json([
            'success' => true,
            'workflow' => $workflow
        ]);
    }
}
