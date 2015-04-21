<?php namespace App\Components\Memorials\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class MemorialFlower extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'granit_memorial_flowers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['flower_id', 'created_by', 'mem_id', 'contact_name', 'contact_email', 'contact_phone', 'message'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function memorial()
    {
        return $this->belongsTo(Memorial::class, 'mem_id', 'id');
    }

    public function flower()
    {
        return $this->belongsTo(Flower::class, 'flower_id', 'id');
    }

}