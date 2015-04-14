<?php namespace App\Components\Memorials\Http\Controllers\Backend;

use App\Components\MediaManager\Http\Controllers\MediaManagerController;
use App\Components\Memorials\Http\Requests\MemorialFormRequest;
use App\Components\Memorials\Repositories\MemorialRepository;
use App\Components\Memorials\Repositories\TimeLineRepository;
use App\Http\Controllers\Controller;

class MemorialController extends Controller
{
    /**
     * The memorial memorial
     * @var memorialRepository
     */
    protected $memorial;
    protected $timeline;

    /**
     * Display a listing of the resource.
     *
     * @param MemorialRepository $memorial
     * @param TimeLineRepository $timeline
     */
    public function __construct(MemorialRepository $memorial, TimeLineRepository $timeline)
    {
        parent::__construct();
        $this->memorial = $memorial;
        $this->timeline = $timeline;
    }

    public function index()
    {
        $memorials = $this->memorial->all();
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.index', compact('memorials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(MemorialFormRequest $request, MediaManagerController $media)
    {
        $attr = $request->all();
        /**
         * Upload avatar
         */
        $attr['avatar'] = $media->upload($request->file('avatar'));
        $memorial = $this->memorial->create($attr);
        /**
         * Timeline
         */
        if(isset($attr['timeline']) and $attr['timeline'] == 1) {
            for($i=0; $i < $attr['timeline_form_count']; $i++) {
                $timeline = [
                    'mem_id' => $memorial->id,
                    'title' => $attr['timeline_title'][$i],
                    'year' => $attr['timeline_year'][$i],
                    'description' => $attr['timeline_desc'][$i],
                ];
                if($request->hasFile($attr['timeline_image'][$i])) {
                    $timeline['image'] = $media->upload($attr['timeline_image'][$i], 'timeline');
                }
                $this->timeline->create($timeline);
            }

        }
        return redirect(route('backend.memorial.index'))->with('success_message', 'The memorial has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $memorial = $this->memorial->getElementById($id);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.create_edit', compact('memorial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, MemorialFormRequest $request, MediaManagerController $media)
    {
        $attr = $request->all();
        $memorial = $this->memorial->getElementById($id);
        /**
         * Update Avatar
         */
        if( $request->hasFile('avatar') ) {
            if(file_exists($memorial->avatar)) {
                unlink($memorial->avatar);
            }
            $attr['avatar'] = $media->upload($request->file('avatar'));
        }
        $memorial->update($attr);
        /**
         * Timeline
         */

        if(isset($attr['timeline']) and $attr['timeline'] == 1) {
            for($i=0; $i < $attr['timeline_form_count']; $i++) {

                $timeline = [
                    'mem_id' => $id,
                    'title' => $attr['timeline_title'][$i],
                    'year' => $attr['timeline_year'][$i],
                    'description' => $attr['timeline_desc'][$i],
                ];
                $file = $attr['timeline_image'][$i];
                if(is_object($file)) {
                    $timeline['image'] = $media->upload($file, 'timeline');
                }
                if($attr['timeline_id'][$i] > 0) {
                    $rs = $this->timeline->getElementById($attr['timeline_id'][$i]);
                    $rs->update($timeline);
                } else {
                    $this->timeline->create($timeline);
                }
            }
        }
        return redirect(route('backend.memorial.index'))->with('success_message', 'The memorial has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $memorial = $this->memorial->getElementById($id);
        $memorial->timelines()->delete();
        $memorial->delete();
        return redirect()->back()->with('success_message', 'The memorial has been deleted');
    }
}