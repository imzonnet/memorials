<?php namespace App\Components\Memorials\Http\Controllers\Backend;

use App\Components\Memorials\Http\Requests\VideoFormRequest;
use App\Components\Memorials\Repositories\MemorialRepository;
use App\Components\Memorials\Repositories\VideoRepository;
use App\Http\Controllers\Controller;
use App\Libraries\Videos\VideoHelper;

class VideoController extends Controller
{
    /**
     * The video memorial
     * @var memorialRepository
     */
    protected $memorial;
    protected $video;
    protected $videoHelper;

    /**
     * Display a listing of the resource.
     *
     * @param videoRepository $video
     */
    public function __construct(MemorialRepository $memorial, VideoRepository $video, VideoHelper $videoHelper)
    {
        parent::__construct();
        $this->memorial = $memorial;
        $this->video = $video;
        $this->videoHelper = $videoHelper;
    }

    public function index($mid)
    {
        $memorial = $this->memorial->getElementById($mid);
        $videos = $memorial->videos->all();
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.videos.index', compact('videos', 'memorial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($mid)
    {
        $memorial = $this->memorial->getElementById($mid);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.videos.create_edit', compact('memorial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($mid, VideoFormRequest $request)
    {
        $attrs = $request->all();
        $this->videoHelper->setUrl($attrs['url']);
        $attrs['image'] = $this->videoHelper->getImage();
        $attrs['times'] = $this->videoHelper->getTime();
        $video = $this->video->create($attrs);
        return redirect(route('backend.memorial.video.index',$mid))->with('success_message', 'The video has been created.');
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
        $video = $memorial->videos->find($id);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.videos.create_edit', compact('video', 'memorial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($mid, $id, VideoFormRequest $request)
    {
        $attrs = $request->all();
        $video = $this->video->getElementById($id);

        $this->videoHelper->setUrl($attrs['url']);
        $attrs['image'] = $this->videoHelper->getImage();
        $attrs['times'] = $this->videoHelper->getTime();

        $video->update($attrs);

        return redirect(route('backend.memorial.video.index',$mid))->with('success_message', 'The video has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($mid, $id)
    {
        $this->video->getElementById($id)->delete();
        return redirect()->back()->with('success_message', 'The video has been deleted');
    }

}