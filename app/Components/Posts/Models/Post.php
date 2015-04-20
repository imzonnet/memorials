<?php namespace App\Components\Posts\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exp_posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'image', 'description', 'type', 'created_by'];

    public function user() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(){
        return $this->belongsToMany(Category::class, 'exp_post_category', 'post_id', 'category_id');
    }

}