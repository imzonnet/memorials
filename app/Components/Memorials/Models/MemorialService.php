<?php namespace App\Components\Memorials\Models;

use App\Components\Memorials\Presenter\MemorialServicePresenter;
use App\Components\Services\Models\Service;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class MemorialService extends Model {

    use PresentableTrait;

    protected $presenter = MemorialServicePresenter::class;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'granit_memorial_services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['mem_id', 'title', 'url', 'image','created_by'];


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

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

}