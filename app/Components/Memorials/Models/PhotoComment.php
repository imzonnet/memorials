<?php namespace App\Components\Memorials\Models;

use App\Components\Memorials\Presenters\CommentPresenter;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class PhotoComment extends Model {

    use PresentableTrait;
    protected $presenter = CommentPresenter::class;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'granit_photo_comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['photo_id', 'user_id', 'text', 'likes', 'parent_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photoItem()
    {
        return $this->belongsTo(PhotoItem::class, 'photo_id', 'id');
    }

    public function commentsChild(){
        return $this->where('parent_id', '=', $this->id)->count();
    }
}