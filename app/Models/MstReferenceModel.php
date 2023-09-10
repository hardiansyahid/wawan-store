<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstReferenceModel extends Model
{
    use HasFactory;
    protected $table = 'mst_reference';
    protected $fillable = ['category', 'nama', 'code', 'isactive'];
}
