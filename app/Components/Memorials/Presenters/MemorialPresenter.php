<?php namespace App\Components\Memorials\Presenters;

use Carbon\Carbon;
use Laracasts\Presenter\Presenter;

class MemorialPresenter extends Presenter
{
    public function getProfilePath()
    {
        return route('memorial.show', [str_slug($this->name), $this->id]);
    }

    public function getBiographyPath()
    {
        return route('memorial.biography', [str_slug($this->name), $this->id]);
    }

    public function getPhotoAlbumsPath()
    {
        return route('memorial.photoAlbums', [str_slug($this->name), $this->id]);
    }

    public function getVideosPath()
    {
        return route('memorial.videos', [str_slug($this->name), $this->id]);
    }

    public function getGuestbooksPath()
    {
        return route('memorial.guestbooks', [str_slug($this->name), $this->id]);
    }

    public function getFamilyPath()
    {
        return route('memorial.family', [str_slug($this->name), $this->id]);
    }

    public function getCreatedAt(){
        return Carbon::parse($this->created_at)->format('d. m. Y');
    }

    public function getBirthday(){
        return Carbon::parse($this->birthday)->format('d. m. Y');
    }
    public function getDeath(){
        return Carbon::parse($this->death)->format('d. m. Y');
    }
}