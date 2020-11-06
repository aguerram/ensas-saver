<?php

namespace App\Exports;

use App\Models\Etudiant3a;
use App\Models\Etudiant4a;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PresentExport implements FromCollection,WithHeadings
{
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
            "Prénom",
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
            ->orderBy("{$alias}nom", "desc")
            ->get();
    }
}
