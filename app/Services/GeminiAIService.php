<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiAIService
{
    protected $apiKey;
    protected $baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash:generateContent';

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY');
    }

    public function generateContent($prompt)
    {
        // 1. Tambahkan System Prompt (Doktrin) agar dia sadar dia adalah Flowral Copilot
        $systemInstruction = "Anda adalah Flowral Copilot, asisten AI super cerdas yang tertanam di dalam aplikasi bernama Flowral (Aplikasi Project Management & Knowledge Base ala Notion). Tugas Anda membantu user mengelola tugas, meringkas catatan, dan memberi ide project. Jawablah dengan ramah, antusias, dan menggunakan bahasa Indonesia yang natural.";

        // Gabungkan doktrin dengan pertanyaan user
        $fullPrompt = $systemInstruction . "\n\nPertanyaan User:\n" . $prompt;

        try {
            // 2. Tambahkan timeout(60) agar tidak error saat AI butuh waktu berpikir agak lama
            $response = Http::timeout(60)->withHeaders([
                'Content-Type' => 'application/json',
            ])->post($this->baseUrl . '?key=' . $this->apiKey, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $fullPrompt]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, saya tidak bisa merespon saat ini.';
            }

            Log::error('Gemini API Error: ' . $response->body());
            return 'Maaf, terjadi kesalahan dari server AI.';
        } catch (\Exception $e) {
            Log::error('Gemini Exception: ' . $e->getMessage());
            return 'Maaf, koneksi ke AI gagal (Timeout atau Network Error).';
        }
    }

    public function generateTaskDescription($title)
    {
        // Doktrin khusus untuk membuat deskripsi (tanpa basa-basi chat)
        $systemInstruction = "Anda adalah AI pembuat spesifikasi tugas (task description). Berdasarkan Judul Tugas yang diberikan, buatkan deskripsi pekerjaan secara detail, terstruktur, profesional, dan to-the-point tanpa kata pembuka/penutup. Jika relevan, berikan bullet points (langkah-langkah). Gunakan bahasa Indonesia.";

        $fullPrompt = $systemInstruction . "\n\nJudul Tugas: " . $title . "\n\nDeskripsi:";

        try {
            $response = Http::timeout(60)->withHeaders([
                'Content-Type' => 'application/json',
            ])->post($this->baseUrl . '?key=' . $this->apiKey, [
                'contents' => [['parts' => [['text' => $fullPrompt]]]],
                'generationConfig' => ['temperature' => 0.6] // Suhu sedikit diturunkan agar lebih fokus/konsisten
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['candidates'][0]['content']['parts'][0]['text'] ?? '';
            }
            return 'Gagal men-generate deskripsi.';
        } catch (\Exception $e) {
            return 'Koneksi ke AI gagal saat membuat deskripsi.';
        }
    }

    public function summarizeNote($content)
    {
        // Doktrin AI khusus meringkas dokumen
        $systemInstruction = "Anda adalah AI Summarizer yang andal. Tugas Anda adalah membaca isi dokumen/catatan berikut dan membuat ringkasan (summary) yang padat, jelas, dan mudah dipahami. Gunakan poin-poin (bullet points) untuk menonjolkan inti pembicaraan. Jawab menggunakan bahasa Indonesia.";

        $fullPrompt = $systemInstruction . "\n\nIsi Dokumen:\n" . $content . "\n\nBuatkan Ringkasannya:";

        try {
            $response = Http::timeout(60)->withHeaders([
                'Content-Type' => 'application/json',
            ])->post($this->baseUrl . '?key=' . $this->apiKey, [
                'contents' => [['parts' => [['text' => $fullPrompt]]]],
                // Temperature diturunkan (0.4) agar AI lebih akurat membaca teks tanpa mengarang cerita sendiri (halusinasi)
                'generationConfig' => ['temperature' => 0.4]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['candidates'][0]['content']['parts'][0]['text'] ?? '';
            }
            return 'Gagal membuat ringkasan.';
        } catch (\Exception $e) {
            return 'Koneksi ke AI gagal saat meringkas.';
        }
    }

    public function suggestWorkflow($projectName)
    {
        $systemInstruction = "Anda adalah AI Project Manager yang jenius. Berdasarkan 'Nama Project' yang diberikan, buatkan 1 paragraf deskripsi singkat tentang tujuan project tersebut, dilanjutkan dengan usulan tahapan alur kerja (workflow / milestone) yang ideal. Buat secara rapi menggunakan bullet points. Jawab to-the-point tanpa basa-basi pembuka. Gunakan bahasa Indonesia.";

        $fullPrompt = $systemInstruction . "\n\nNama Project: " . $projectName . "\n\nUsulan Deskripsi & Workflow:";

        try {
            $response = Http::timeout(60)->withHeaders([
                'Content-Type' => 'application/json',
            ])->post($this->baseUrl . '?key=' . $this->apiKey, [
                'contents' => [['parts' => [['text' => $fullPrompt]]]],
                'generationConfig' => ['temperature' => 0.7]
            ]);

            // Jika API sukses merespon
            if ($response->successful()) {
                $data = $response->json();
                return $data['candidates'][0]['content']['parts'][0]['text'] ?? '';
            }

            // JIKA GAGAL: Tangkap pesan error aslinya (misal: 503 High Demand)
            $errorData = $response->json();
            if (isset($errorData['error']['message'])) {
                return '⚠️ AI sedang sibuk: ' . $errorData['error']['message'];
            }

            // Fallback jika format error berbeda
            return '⚠️ Gagal memberikan usulan workflow.';
        } catch (\Exception $e) {
            return '⚠️ Koneksi ke AI gagal: ' . $e->getMessage();
        }
    }
}
