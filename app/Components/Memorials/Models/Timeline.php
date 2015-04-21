<?php namespace App\Components\Memorials\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'granit_timelines';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['mem_id', 'title', 'year', 'description', 'image', 'created_by', 'state'];

    /**
     * Relationship with User table
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function memorial()
    {
        return $this->belongsTo(Memorial::class, 'mem_id', 'id');
    }

}