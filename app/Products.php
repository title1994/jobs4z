<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = ['product_name_en', 'product_name_fr', 'product_detail_en', 'product_detail_fr', 'amount'];

}
