<?php namespace App\Components\Flowers\Models;

use Illuminate\Database\Eloquent\Model;

class Flower extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'granit_flowers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'image', 'state', 'price', 'stock'];


}