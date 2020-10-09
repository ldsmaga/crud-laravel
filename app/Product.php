<?php

namespace CrudLaravel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['price', 'name', 'url_name', 'description']; 
    public $timestamps = false;
}
