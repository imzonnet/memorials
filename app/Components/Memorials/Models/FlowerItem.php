<?php namespace App\Components\Memorials\Models;

use Illuminate\Database\Eloquent\Model;

class FlowerItem extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'granit_flower_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'image', 'flower_id'];

    public function flower()
    {
        return $this->belongsTo(Flower::class, 'flower_id', 'id');
    }

}