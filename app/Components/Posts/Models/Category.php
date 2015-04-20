<?php namespace App\Components\Posts\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exp_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'created_by', 'type'];

    public function user() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts(){
        return $this->belongsToMany(Post::class, 'exp_post_category', 'category_id', 'post_id');
    }
}