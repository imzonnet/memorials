<?php namespace App\Components\Memorials\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Memorial extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'granit_memorials';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'avatar', 'birthday', 'death', 'biography', 'obituary', 'buried', 'lat', 'long', 'created_by'];

    /**
     * Relationship with User table
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}