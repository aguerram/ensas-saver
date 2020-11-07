<?php

namespace App\Exports;

use App\Models\Etudiant3a;
use App\Models\Etudiant4a;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PresentExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements FromCollection,WithHeadings,Responsable,WithCustomValueBinder
{
    use Exportable;

    private $year;
    private $filiere;

    public function __construct($year, $filiere)
    {
        $this->year = $year;
        $this->filiere = $filiere;
    }

    public function headings(): array
    {
        return [
            "Nom",
            "Prenom",
            "CIN",
            "SIGNATURE"
        ];
    }

    public function collection()
    {
        $alias = $this->year."a_";
        $model = $this->year == "4" ? Etudiant4a::class : Etudiant3a::class;

        return $model::select([
            "{$alias}nom",
            "{$alias}prenom",
            "{$alias}cin",
        ])
            ->where([
                "{$alias}filiere" => $this->filiere
            ])
            ->where("{$alias}presence", "=", 1)
            ->orderBy("{$alias}nom", "asc")
            ->orderBy("{$alias}prenom", "asc")
            ->get();
    }

    private $headers = [
        'Content-Type' => 'text/csv; charset=utf-8',
    ];

}
