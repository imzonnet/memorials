<?php namespace App\Components\Memorials\Http\Controllers\Backend;

use App\Components\Memorials\Http\Requests\PhotoAlbumFormRequest;
use App\Components\Memorials\Repositories\Memorials\PhotoAlbumRepository;
use App\Components\Memorials\Repositories\Memorials\MemorialRepository;
use App\Components\Memorials\Repositories\Memorials\PhotoItemRepository;
use App\Http\Controllers\Controller;

class PhotoAlbumController extends Controller
{
    /**
     * The album memorial
     * @var memorialRepository
     */
    protected $memorial;
    protected $album;

    /**
     * Display a listing of the resource.
     *
     * @param albumRepository $album
     */
    public function __construct(MemorialRepository $memorial, PhotoAlbumRepository $album)
    {
        parent::__construct();
        $this->memorial = $memorial;
        $this->album = $album;
    }

    public function index($mid)
    {
        $memorial = $this->memorial->getElementById($mid);
        $albums = $memorial->photoAlbums->all();
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.albums.index', compact('albums', 'memorial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($mid)
    {
        $memorial = $this->memorial->getElementById($mid);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.albums.create_edit', compact('memorial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($mid, PhotoAlbumFormRequest $request)
    {
        $album = $this->album->create($request->all());
        return redirect(route('backend.album.photo.index',$album->id))->with('success_message', 'The album has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($mem_id, $id)
    {
        $memorial = $this->memorial->getElementById($mem_id);
        $album = $memorial->photoAlbums->find($id);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.albums.create_edit', compact('album', 'memorial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($mid, $id, PhotoAlbumFormRequest $request)
    {
        $this->album->update($request->all());
        return redirect(route('backend.memorial.album.index',$mid))->with('success_message', 'The album has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $mid
     * @param  int $id
     * @param PhotoItemRepository $photoItem
     * @return Response
     */
    public function destroy($mid, $id)
    {
        $album = $this->album->getElementById($id);
        $photos = $album->photoItems->all();
        foreach($photos as $photo) {
            if(file_exists($photo->image)) {
                unlink($photo->image);
            }
            $photo->delete();
        }
        if(is_dir('public/uploads/photos/album_'.$id)) {
            rmdir('public/uploads/photos/album_'.$id);
        }
        $album->delete();
        return redirect()->back()->with('success_message', 'The album has been deleted');
    }
}