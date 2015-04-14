<?php namespace App\Components\Memorials\Http\Controllers\Backend;

use App\Components\MediaManager\Http\Controllers\MediaManagerController;
use App\Components\Memorials\Repositories\PhotoAlbumRepository;
use App\Components\Memorials\Repositories\MemorialRepository;
use App\Components\Memorials\Repositories\PhotoItemRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PhotoItemController extends Controller
{
    /**
     * The album memorial
     * @var memorialRepository
     */
    protected $photo;
    protected $album;

    /**
     * Display a listing of the resource.
     *
     * @param albumRepository $album
     */
    public function __construct(PhotoItemRepository $photo, PhotoAlbumRepository $album)
    {
        parent::__construct();
        $this->photo = $photo;
        $this->album = $album;
    }

    public function index($aid)
    {
        $album = $this->album->getElementById($aid);
        $photos = $this->photo->getListWithPaginate($album,12);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.album_photos.index', compact('album', 'photos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($aid, $id)
    {
        $photo = $this->photo->getElementById($id);
        if(file_exists($photo->image)) {
            unlink($photo->image);
        }
        $stt = $photo->delete();
        if(\Request::ajax()) {
            if($stt) {
                return \Response::json('success', 200);
            } else {
                return \Response::json('error', 400);
            }
        }
        return redirect()->back()->with('success_message', 'The album has been deleted');
    }

    /**
     * Upload Image via Ajax
     */
    public function uploadPhoto($aid, Request $request, MediaManagerController $media){
        $v = \Validator::make($request->all(),[
            'file'  => 'required|image'
        ]);
        if($v->fails()) {
            return Response::json('error', 400);
        }
        $file_path = $media->upload($request->file('file'), "photos/album_{$aid}/");
        $this->photo->create([
            'title' => $request->file('file')->getClientOriginalName(),
            'image' => $file_path,
            'album_id' => $aid
        ]);
        return Response::json('success', 200);
    }
}