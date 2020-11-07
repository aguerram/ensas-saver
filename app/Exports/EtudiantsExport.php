<?php

namespace App\Exports;

use App\Models\Etudiant3a;
use App\Models\Etudiant4a;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EtudiantsExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements
    FromCollection,
    WithHeadings,
    Responsable,
    WithCustomValueBinder
{
    use Exportable;

    private $year;
    private $filiere;
    private $min_mark;
    private $princ_list_count;
    private $wait_list_count;
    private $mainList;

    public function __construct($year, $filiere, $min_mark, $princ_list_count, $wait_list_count, $mainList)
    {
        $this->year = $year;
        $this->filiere = $filiere;
        $this->min_mark = $min_mark;
        $this->princ_list_count = $princ_list_count;
        $this->wait_list_count = $wait_list_count;
        $this->mainList = $mainList;
    }

    public function headings(): array
    {
        return [
            "Nom",
            "Prenom",
            "CIN",
            "CNE",
            "Tele",
            "Ville",
            "Note bac",
            "Note preselection",
        ];
    }

    public function collection()
    {
        $alias = $this->year == 4 ? "4a_" : "3a_";
        $model = $this->year == 4 ? Etudiant4a::class : Etudiant3a::class;

        return $model::select([
            "{$alias}nom",
            "{$alias}prenom",
            "{$alias}cin",
            "{$alias}massar",
            "{$alias}tele",
            "{$alias}ville",
            "{$alias}note_bac",
            "{$alias}note_preselection",
        ])
            ->where([
                "{$alias}filiere" => $this->filiere,
                "{$alias}presence" => 1
            ])
            ->where("{$alias}note_preselection", ">=", $this->min_mark)
            ->orderBy("{$alias}note_preselection", "desc")
            ->orderBy("{$alias}note_bac", "desc")
            ->when($this->mainList, function ($query) {
                return $query->take($this->princ_list_count);
            }, function ($query) {
                return $query->take($this->wait_list_count)
                    ->skip($this->princ_list_count);
            })
            ->get();
    }

}
