<?php namespace App\Components\Memorials\Presenters;

use Carbon\Carbon;
use Laracasts\Presenter\Presenter;

class CommentPresenter extends Presenter
{
    public function getTime(){
        return Carbon::parse($this->created_at)->format('d. m. Y');
    }

    public function getTimeAgo() {
        return $this->created_at->diffForHumans();
    }


}