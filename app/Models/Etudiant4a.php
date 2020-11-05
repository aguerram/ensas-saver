<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant4a extends Model
{
    use HasFactory;

    protected $table = 'sy_4a_candidats';


    protected $fillable = [
        "4a_admission","4a_note_preselection","4a_presence"
    ];

    protected $primaryKey = "4a_cin";
    protected $keyType = 'string';
    public $timestamps = false;
}
