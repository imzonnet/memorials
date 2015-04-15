<?php namespace App\Components\Memorials\Models;

use App\Components\Memorials\Presenters\VideoPresenter;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Video extends Model {

    use PresentableTrait;
    protected $presenter = VideoPresenter::class;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'granit_videos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['mem_id', 'title', 'url', 'image', 'times', 'created_by'];


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


}