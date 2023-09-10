<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MstReferenceModel;

class MstBarangModel extends Model
{
    use HasFactory;
    protected $table = 'mst_barang';
    protected $fillable = ['nama', 'harga', 'stok', 'category', 'expired'];

    public function ref_category()
    {
        return $this->belongsTo(MstReferenceModel::class, 'category', 'id');
    }
}
