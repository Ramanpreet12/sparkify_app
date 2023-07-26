<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $table = 'subcategories';
    protected $fillable = ['categories_id' , 'name' , 'status'];

    public function category(){
        return $this->belongsTo(Category::class , 'categories_id' , 'id');

    }
}
