<?php

namespace App\Http\Controllers;

use App\Exports\PresentExport;
use App\Models\Etudiant3a;
use App\Models\Etudiant4a;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Enregistrement extends Controller
{
    // for saving student presence
    public function enrg4_submit(Request $request)
    {
        //validation
        $request->validate([
            "user" => "required",
        ]);

        $user = Etudiant4a::where('4a_matricule', 'like', "{$request->user}%")
            ->orWhere('4a_cin', "like", "{$request->user}%")
            ->first();

        $count =  Etudiant4a::where('4a_matricule', 'like', "{$request->user}%")
            ->orWhere('4a_cin', "like", "{$request->user}%")->count();

        if ($user === null) {
            return view("enrg")->with(["message" => "The user CIN or Matricule doesn't exist"]);
        } else {
            return view("mark-presence")->with(["user" => $user,"count"=>$count]);
        }
    }

    public function enrg3_submit(Request $request)
    {
        //validation
        $request->validate([
            "user" => "required",
        ]);

        $user = Etudiant3a::where('3a_matricule', 'like', "{$request->user}%")
            ->orWhere('3a_cin', "like", "{$request->user}%")
            ->first();
        if ($user === null) {
            return view("enrg")->with(["message" => "The user CIN or Matricule doesn't exist"]);
        } else {
            return view("mark-presence")->with(["user" => $user]);
        }
    }

    // for updating student presence
    public function mark_presence3(Request $request)
    {
        $user = Etudiant3a::where('3a_matricule', '=', $request->user)->orWhere('3a_cin', "=", $request->user)->first();
        if ($user === null) {
            return redirect("enrg3")->with(["message" => "The user CIN or Matricule doesn't exist", "error" => true]);
        } else {
            $user['3a_presence'] = 1;
            $user->save();
            return view("mark-presence")->with(["user" => $user, "message" => "The student has been marked as present", "error" => false]);
        }
    }

    public function mark_presence4(Request $request)
    {
        $user = Etudiant4a::where('4a_matricule', '=', $request->user)->orWhere('4a_cin', "=", $request->user)->first();
        if ($user === null) {
            return redirect("enrg3")->with(["user" => $user, "message" => "The user CIN or Matricule doesn't exist", "error" => true]);
        } else {
            $user['4a_presence'] = 1;
            $user->save();
            return view("mark-presence")->with(["user" => $user, "message" => "The student has been marked as present", "error" => false]);
        }
    }

    // for export data
    public function export_data(Request $request)
    {
        //validation
        $request->validate([
            "year" => "required",
            "filiere" => "required|in:F,P,D,T",
        ]);
        return Excel::download(new PresentExport(
            $request->year,
            $request->filiere
        ), "list_presence_$request->filiere.csv", \Maatwebsite\Excel\Excel::CSV);
    }

}
