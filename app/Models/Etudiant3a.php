<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant3a extends Model
{
    use HasFactory;
    protected $table = "sy_3a_candidats";
    protected $fillable = [
        "3a_admission","3a_note_preselection","3a_presence"
    ];
    protected $primaryKey = "3a_cin";
    public $timestamps = false;
}
