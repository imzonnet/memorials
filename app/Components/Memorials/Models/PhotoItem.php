<?php namespace App\Components\Memorials\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PhotoItem extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'granit_photo_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['album_id', 'title', 'image', 'created_by'];


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
    public function photoAlbum()
    {
        return $this->belongsTo(PhotoAlbum::class, 'album_id', 'id');
    }

}