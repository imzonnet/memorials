<?php namespace App\Components\Posts\Models;

use App\Components\Memorials\Models\MemorialService;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'granit_services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'image', 'state'];


    public function memorials()
    {
        return $this->belongsTo(MemorialService::class, 'service_id', 'id');
    }

}