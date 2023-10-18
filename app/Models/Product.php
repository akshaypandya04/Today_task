<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory;

    use SoftDeletes;
  
    protected $dates = ['deleted_at'];

    protected $table = 'products';

   
     protected $fillable = [
        'name',
        'price',
        'qty',
        'category_id',
        'created_by',
    ];

      public function Category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
