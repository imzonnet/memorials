<?php namespace App\Components\Memorials\Models;

use App\Components\Memorials\Presenters\MemorialServicePresenter;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Memorial extends Model {

    use PresentableTrait;
    protected $presenter = MemorialServicePresenter::class;
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
    protected $fillable = ['name', 'avatar', 'birthday', 'death', 'biography', 'obituary', 'buried', 'lat', 'lng', 'created_by', 'timeline'];

    /**
     * Relationship with User table
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function relationships()
    {
        return $this->hasMany(MemorialRelationship::class, 'mem_id', 'id');
    }

    public function timelines()
    {
        return $this->hasMany(Timeline::class, 'mem_id', 'id');
    }

    public function guestbooks()
    {
        return $this->hasMany(Guestbook::class, 'mem_id', 'id');
    }
    public function photoAlbums()
    {
        return $this->hasMany(PhotoAlbum::class, 'mem_id', 'id');
    }

    public function videos(){
        return $this->hasMany(Video::class, 'mem_id', 'id');
    }

    public function services() {
        return $this->hasMany(MemorialService::class, 'mem_id', 'id');
    }

    public function getBirthdayAttribute($value){
        return Carbon::parse($value)->format('d. m. Y');
    }
    public function getDeathAttribute($value){
        return Carbon::parse($value)->format('d. m. Y');
    }
}