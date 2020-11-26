<?php

namespace App\Exports;

use App\Game;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GameExport implements FromView, WithColumnWidths, WithStyles
{
    public function view(): View
    {
        return view('games.excel', [
            'games' => Game::all()
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 20,
            'C' => 32,
            'D' => 15,
            'E' => 16,
            'F' => 6,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true, 'size' => 10]],
        ];
    }
}
