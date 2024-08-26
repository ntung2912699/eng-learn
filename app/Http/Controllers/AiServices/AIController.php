<?php

namespace App\Http\Controllers\AiServices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OpenAIService;

class AIController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function generateResponse(Request $request)
    {
        $prompt = $request->input('prompt');
        // Gọi OpenAI service để tạo text
        $response = $this->openAIService->generateText($prompt);

        return response()->json([
            'prompt' => $prompt,
            'response' => $response,
        ]);
    }

    public function chatForm() {
        return view('form_ai_chat');
    }
}
