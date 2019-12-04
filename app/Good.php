<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $table = 'goods';
    protected $fillable = ['FotoBarang','NamaBarang','HargaBeli','HargaJual','Stok'];
}
