<?php namespace App\Components\Memorials\Http\Controllers\Backend;

use App\Components\Memorials\Repositories\FlowerItemRepository;
use App\Components\Memorials\Repositories\FlowerRepository;
use App\Http\Controllers\Controller;

class FlowerItemController extends Controller
{
    /**
     * The memorial memorial
     * @var memorialRepository
     */
    protected $flower;
    protected $item;

    /**
     * Display a listing of the resource.
     *
     * @param MemorialRepository $memorial
     * @param TimeLineRepository $timeline
     */
    public function __construct(FlowerRepository $flowerRepository, FlowerItemRepository $flowerItemRepository)
    {
        parent::__construct();
        $this->flower = $flowerRepository;
        $this->item = $flowerItemRepository;
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
            $this->item->getElementById($id)->delete();
            if(\Request::ajax()) {
                return \Response::json(['status' => true]);
            } else {
                return redirect()->back()->with('success_message', 'The item has been deleted');
            }
        } catch(Exception $e) {
            if(\Request::ajax()) {
                return \Response::json(['status' => false]);
            } else {
                return redirect()->back()->with('success_message', 'The item has been deleted');
            }
        }
    }
}