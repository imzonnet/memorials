<?php namespace App\Components\Memorials\Http\Controllers\Backend;

use App\Components\Memorials\Repositories\FlowerItemRepository;
use App\Components\Memorials\Repositories\FlowerRepository;
use App\Components\MediaManager\Http\Controllers\MediaManagerController;
use App\Components\Memorials\Http\Requests\FlowerFormRequest;
use App\Http\Controllers\Controller;

class FlowerController extends Controller
{

    /**
     * The flower flower
     * @var flowerRepository
     */
    protected $flower;
    protected $item;

    /**
     * Display a listing of the resource.
     *
     * @param FlowerRepository $flowerRepository
     * @internal param FlowerRepository $flower
     */
    public function __construct(FlowerRepository $flowerRepository, FlowerItemRepository $flowerItemRepository)
    {
        parent::__construct();
        $this->flower = $flowerRepository;
        $this->item = $flowerItemRepository;
    }

    public function index()
    {
        $flowers = $this->flower->all();
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.flowers.index', compact('flowers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.flowers.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(FlowerFormRequest $request, MediaManagerController $media)
    {
        $attr = $request->all();
        $flower = $this->flower->create($attr);

        for($i=0; $i < $attr['flower_form_count']; $i++) {
            $flowerItems = [
                'flower_id' => $flower->id,
                'title' => $attr['flower_title'][$i],
            ];
            if( !empty($attr['flower_image'][$i])) {
                $file = $attr['flower_image'][$i];
                if(is_object($file)) {
                    $flowerItems['image'] = $media->upload($file, 'flowers');
                }
            }
            $this->item->create($flowerItems);
        }

        return redirect(route('backend.flower.index'))->with('success_message', 'The flower has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $flower = $this->flower->getElementById($id);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.flowers.create_edit', compact('flower'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, FlowerFormRequest $request, MediaManagerController $media)
    {
        $attr = $request->all();
        $this->flower->update($attr);

        for($i=0; $i < $attr['flower_form_count']; $i++) {
            $flowerItems = [
                'flower_id' => $id,
                'title' => $attr['flower_title'][$i],
            ];
            if( !empty($attr['flower_image'][$i])) {
                $file = $attr['flower_image'][$i];
                if(is_object($file)) {
                    $flowerItems['image'] = $media->upload($file, 'flowers');
                }
            }
            if($attr['flower_id'][$i] > 0) {
                $rs = $this->item->getElementById($attr['flower_id'][$i]);
                $rs->update($flowerItems);
            } else {
                $this->item->create($flowerItems);
            }
        }

        return redirect(route('backend.flower.index'))->with('success_message', 'The flower has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $flower = $this->flower->getElementById($id);
        $flower->delete();
        return redirect()->back()->with('success_message', 'The flower has been deleted');
    }
}