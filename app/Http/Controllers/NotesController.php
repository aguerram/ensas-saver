<?php

namespace App\Http\Controllers;

use App\Models\Etudiant3a;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(Request $request, $year)
    {
        $filiere = $request->query("filiere");
        if ($year != 3 && $year != 4) {
            abort(404);
        }

        if (!$filiere) {
            return $this->listFiliereIndex($request,$year);
        }
        if(!$this->isFiliere($filiere))
        {
            abort(404);
        }


        $etudiants = Etudiant3a::where("3a_presence",1)->paginate(15);

        return view("notes.notes_fill", [
            "pageTitle" => "liste des candidats présents au concours d'accès en {$year}éme année : {$this->getFilieres()[$filiere]}",
            "year"=>$year,
            "etudiants"=>$etudiants
        ]);
    }

    private function listFiliereIndex(Request $request,$year)
    {
        $filieres = $this->getFilieres();
        return view("notes.list_fil",compact("filieres","year"));
    }

    public function index3a(Request $request)
    {
        return $this->index($request, 3);
    }

    public function index4a(Request $request)
    {
        return $this->index($request, 4);
    }



    public static function getFilieres()
    {
        return [
            "F"=>"Génie Informatique",
            "T"=>"Génie Télécoms",
            "D"=>"Génie Industriel",
            "P"=>"Génie Procédés"
        ];
    }
    public static function isFiliere($fi)
    {
        $filieres = NotesController::getFilieres();
        return array_key_exists($fi,$filieres);
    }

}
