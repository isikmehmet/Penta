<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UrunModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "products";

    protected $fillable = [
        'name',
        'catId',
        'description',
        'keywords',
        'mainPic',
        'price',
        'stock',
        'rate',
    ];

    public function Kategori(){
        return $this->belongsTo(KategoriModel::class, 'catId', 'id');
    }
}
