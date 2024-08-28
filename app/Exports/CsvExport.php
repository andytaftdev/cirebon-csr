<?php

namespace App\Exports;

use App\Models\Sektor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProjectsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Csv::all(); // Adjust the query as needed
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Sector',
            'Amount',
            // Add other columns as necessary
        ];
    }
}
