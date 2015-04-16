<?php namespace App\Components\Memorials\Presenters;

use Carbon\Carbon;
use Laracasts\Presenter\Presenter;

class PhotoItemPresenter extends Presenter
{
    public function getPermalink()
    {
        return route('memorial.photoAlbums.photo',[str_slug($this->photoAlbum->memorial->name), $this->photoAlbum->memorial->id, $this->id]);
    }

    public function comments_count() {
        return $this->comments->count();
    }

    public function getCreatedAt(){
        return Carbon::parse($this->created_at)->format('d. m. Y');
    }

}