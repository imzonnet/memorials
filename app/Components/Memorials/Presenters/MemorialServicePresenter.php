<?php namespace App\Components\Memorials\Presenters;

use Laracasts\Presenter\Presenter;

class MemorialServicePresenter extends Presenter
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
}