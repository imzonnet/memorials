<?php namespace App\Components\Memorials\Http\Controllers\Backend;

use App\Components\Memorials\Repositories\MemorialRepository;
use App\Components\Memorials\Repositories\TimeLineRepository;
use App\Http\Controllers\Controller;

class TimelineController extends Controller
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $this->timeline->getElementById($id)->delete();
            if(\Request::ajax()) {
                return \Response::json(['status' => true]);
            } else {
                return redirect()->back()->with('success_message', 'The timeline has been deleted');
            }
        } catch(Exception $e) {
            if(\Request::ajax()) {
                return \Response::json(['status' => false]);
            } else {
                return redirect()->back()->with('success_message', 'The timeline has been deleted');
            }
        }
    }
}