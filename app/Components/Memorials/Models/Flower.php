<?php namespace App\Components\Memorials\Models;

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
    protected $fillable = ['title', 'description', 'state', 'price', 'stock'];

    public function items()
    {
        return $this->hasMany(FlowerItem::class, 'flower_id', 'id');
    }


}