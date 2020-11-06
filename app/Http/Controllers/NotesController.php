<?php

namespace App\Http\Controllers;

use App\Exports\EtudiantsExport;
use App\Models\Etudiant3a;
use App\Models\Etudiant4a;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NotesController extends Controller
{
    public function index(Request $request, $year)
    {
        $filiere = $request->query("filiere");
        $q = $request->query("q");
        $order = $request->query("order");

        if ($order != "asc" && $order != "desc") {
            $order = null;
        }

        if ($year != 3 && $year != 4) {
            abort(404);
        }

        if (!$filiere) {
            return $this->listFiliereIndex($request, $year);
        }
        if (!$this->isFiliere($filiere)) {
            abort(404);
        }

        $alias = $year == 4 ? "4a_" : "3a_";
        $model = $year == 4 ? Etudiant4a::class : Etudiant3a::class;

        $qExist = $q && strlen(trim($q)) > 0;
        $orderExist = $order && strlen(trim($order)) > 0;

        $etudiants = $model::where([
            "{$alias}presence" => 1,
            "{$alias}filiere" => $filiere
        ])
            ->when(!$orderExist, function ($query) use ($alias) {
                $query
                    ->orderBy("{$alias}nom", "asc")
                    ->orderBy("{$alias}prenom", "asc");
            }, function ($query) use ($alias, $order) {
                $query
                    ->orderBy("{$alias}note_preselection", $order)
                    ->orderBy("{$alias}nom", "asc")
                    ->orderBy("{$alias}prenom", "asc");
            })
            ->when($qExist, function ($query) use ($q, $alias, $filiere) {
                return $query
                    ->where(function ($query) use ($q, $alias, $filiere) {
                        $query
                            ->where("{$alias}presence", 1)
                            ->where("{$alias}filiere", $filiere);
                    })
                    ->where(function ($query) use ($q, $alias) {
                        $query
                            ->orWhere("{$alias}nom", "like", "%{$q}%")
                            ->orWhere("{$alias}prenom", "like", "%{$q}%")
                            ->orWhere("{$alias}massar", "like", "%{$q}%")
                            ->orWhere("{$alias}cin", "like", "%{$q}%")
                            ->orWhere("{$alias}email", "like", "%{$q}%");
                    });

            })
            ->paginate(20);

//        $etudiants->withPath("/notes/{$year}?filiere={$filiere}");

        $filiereTitle = $this->getFilieres()[$filiere];
        $link = "/notes/{$year}?filiere={$filiere}";
        if ($qExist) {
            $link .= "&q=${q}";
        }
        $orderLink = $link;
        if ($orderExist) {
            if ($order == "asc") {
                $orderLink .= "&order=desc";
            } else {
                $orderLink .= "&order=asc";
            }
        } else {
            $orderLink .= "&order=asc";
        }

        return view("notes.notes_fill", [
            "pageTitle" => "Liste des candidats présents au concours d'accès en {$year}éme année : {$filiereTitle}",
            "year" => $year,
            "etudiants" => $etudiants,
            "filiereTitle" => $filiereTitle,
            "alias" => $alias,
            "link" => $link,
            "filiere" => $filiere,
            "orderLink" => $orderLink
        ]);
    }

    private function listFiliereIndex(Request $request, $year)
    {
        $filieres = $this->getFilieres();
        return view("notes.list_fil", compact("filieres", "year"));
    }

    public function index3a(Request $request)
    {
        return $this->index($request, 3);
    }

    public function index4a(Request $request)
    {
        return $this->index($request, 4);
    }

    public function update(Request $request)
    {
        $request->validate([
            "year" => "required|in:3,4",
            "filiere" => "required|in:F,P,D,T",
        ]);
        $notes = $request->all();
        $year = $request->year;
        $filiere = $request->filiere;
        $alias = $year == 4 ? "4a_" : "3a_";
        $instance = $year == 4 ? Etudiant4a::class : Etudiant3a::class;
        foreach ($notes as $key => $note) {
            if (in_array($key, [
                "_token",
                "filiere",
                "year",
            ]))
                continue;

            $et = $instance::find($key);
            $et["{$alias}note_preselection"] = $note;
            $et->save();
        }

        return back()->with("success", "Vos données ont été enregistrées");
    }

    public function excel(Request $request, $year, $filiere)
    {
        if (!NotesController::isFiliere($filiere) || ($year != 3 && $year != 4)) {
            return abort(404);
        }
        $alias = $year == 4 ? "4a_" : "3a_";
        $model = $year == 4 ? Etudiant4a::class : Etudiant3a::class;

        $filiereTitle = $this->getFilieres()[$filiere];


        return view("notes.excel", [
            "pageTitle" => "Export list des candidats {$year}éme année : {$filiereTitle}",
            "year"=>$year,
            "filiere"=>$filiere
        ]);
    }

    public function excel_export(Request $request)
    {
        $request->validate([
            "min_note"=>"required|numeric",
            "princ_list_count"=>"required|numeric",
            "wait_list_count"=>"required|numeric",
            "year"=>"required|in:3,4",
            "filiere" => "required|in:F,P,D,T"
        ]);

        return Excel::download(new EtudiantsExport(
            $request->year,
            $request->filiere,
            $request->min_note,
            $request->princ_list_count,
            $request->wait_list_count,
        ),"etudiants.csv",\Maatwebsite\Excel\Excel::CSV);
    }


    public static function getFilieres()
    {
        return [
            "F" => "Génie Informatique",
            "T" => "Génie Télécoms",
            "D" => "Génie Industriel",
            "P" => "Génie Procédés"
        ];
    }

    public static function getFiliereByAbr($abr)
    {
        return NotesController::getFilieres()[$abr];
    }

    public static function isFiliere($fi)
    {
        $filieres = NotesController::getFilieres();
        return array_key_exists($fi, $filieres);
    }


}
