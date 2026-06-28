<?php

namespace App\Traits;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

trait RecordsActivity
{
    /**
     * Method bawaan Eloquent yang otomatis dipanggil.
     * Ini yang bertindak sebagai "sensor/CCTV".
     */
    public static function bootRecordsActivity()
    {
        // Jangan catat aktivitas jika command dijalankan via Terminal/Seeder
        if (app()->runningInConsole()) return;

        static::created(function ($model) {
            $model->recordActivity('created');
        });

        static::updated(function ($model) {
            $model->recordActivity('updated');
        });

        static::deleted(function ($model) {
            $model->recordActivity('deleted');
        });
    }

    /**
     * Fungsi yang mengeksekusi penyimpanan ke tabel activities.
     */
    protected function recordActivity($action)
    {
        $workspaceId = $this->getWorkspaceIdForActivity();

        if (! $workspaceId) return; // Skip kalau gak ada workspace_id

        Activity::create([
            'workspace_id' => $workspaceId,
            'user_id'      => Auth::id(), // ID user yang login
            'action'       => $action,
            'target_type'  => get_class($this), // Contoh: "App\Models\Task"
            'target_id'    => $this->id,
            'metadata'     => $this->getActivityMetadata($action),
        ]);
    }

    /**
     * Deteksi otomatis dari mana asal workspace_id model ini.
     */
    protected function getWorkspaceIdForActivity()
    {
        // Jika model langsung punya kolom workspace_id (Misal: Project / Note)
        if (isset($this->workspace_id)) {
            return $this->workspace_id;
        }

        // Jika modelnya adalah Task (hanya punya project_id), ambil dari tabel induknya
        if ($this->relationLoaded('project') && $this->project) {
            return $this->project->workspace_id;
        } elseif (isset($this->project_id)) {
            return $this->project()->value('workspace_id');
        }

        return null;
    }

    /**
     * Merangkum informasi pendukung apa yang sedang diubah
     */
    protected function getActivityMetadata($action)
    {
        $metadata = [
            'title' => $this->title ?? $this->name ?? 'Untitled Item',
        ];

        if ($action === 'updated') {
            // Hanya catat NAMA kolom yang diubah (kecuali updated_at) agar JSON tidak bengkak
            $changes = array_diff_key($this->getChanges(), array_flip(['updated_at']));
            $metadata['changed_fields'] = array_keys($changes);
        }

        return $metadata;
    }
}
