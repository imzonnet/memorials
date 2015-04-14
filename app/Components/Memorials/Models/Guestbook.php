<?php namespace App\Components\Memorials\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'granit_guestbooks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['mem_id', 'title', 'description', 'created_by'];

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

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d. m. Y');
    }

}