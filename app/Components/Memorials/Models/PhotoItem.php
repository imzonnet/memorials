<?php namespace App\Components\Memorials\Models;

use App\Components\Memorials\Presenters\PhotoItemPresenter;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class PhotoItem extends Model {

    use PresentableTrait;
    protected $presenter = PhotoItemPresenter::class;

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

    public function comments()
    {
        return $this->hasMany(PhotoComment::class, 'photo_id', 'id');
    }

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d. m. Y');
    }

}