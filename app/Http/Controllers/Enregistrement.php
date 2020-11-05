<?php

namespace App\Http\Controllers;

use App\Models\Etudiant3a;
use App\Models\Etudiant4a;
use Illuminate\Http\Request;

class Enregistrement extends Controller
{
    public function enrg4_submit(Request $request)
    {
        $user = Etudiant4a::where('4a_matricule', '=', $request->user)->orWhere('4a_cin', "=", $request->user)->first();
        if ($user === null) {
            return view("enrg")->with(["message" => "The user CIN or Matricule doesn't exist"]);
        } else {
            return view("mark-presence")->with(["user" => $user]);
        }
    }

    public function enrg3_submit(Request $request)
    {
        $user = Etudiant3a::where('3a_matricule', '=', $request->user)->orWhere('3a_cin', "=", $request->user)->first();
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
            return view("mark-presence")->with(["message" => "The user CIN or Matricule doesn't exist", "error" => true]);
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
            return view("mark-presence")->with(["user" => $user, "message" => "The user CIN or Matricule doesn't exist", "error" => true]);
        } else {
            $user['4a_presence'] = 1;
            $user->save();
            return view("mark-presence")->with(["user" => $user, "message" => "The student has been marked as present", "error" => false]);
        }
    }

}
