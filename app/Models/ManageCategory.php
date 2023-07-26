<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageCategory extends Model
{
    use HasFactory;
    protected $table = 'manage_categories';
    protected $fillable = [ 'categories_id' , 'name' , 'status'];
}
