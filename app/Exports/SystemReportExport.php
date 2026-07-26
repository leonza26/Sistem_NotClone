<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Workspace;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SystemReportExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Kita gabungkan data User dengan Workspace pertamanya sebagai laporan ringkas
        return User::with('workspaces')->latest()->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Role',
            'Status',
            'Total Workspaces',
            'Registered Date'
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->role == 0 ? 'Super Admin' : 'Member',
            $user->status == 1 ? 'Active' : 'Suspended',
            $user->workspaces->count(),
            $user->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
