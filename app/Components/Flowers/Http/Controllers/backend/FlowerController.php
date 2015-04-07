<?php namespace App\Components\Flowers\Http\Controllers\Backend;

use App\Components\Flowers\Repositories\FlowerRepository;
use App\Components\MediaManager\Http\Controllers\MediaManagerController;
use App\Components\Flowers\Http\Requests\FlowerFormRequest;
use App\Http\Controllers\Controller;

class FlowerController extends Controller
{

    /**
     * The flower flower
     * @var flowerRepository
     */
    protected $flower;

    /**
     * Display a listing of the resource.
     *
     * @param FlowerRepository $flowerRepository
     * @internal param FlowerRepository $flower
     */
    public function __construct(FlowerRepository $flowerRepository)
    {
        parent::__construct();
        $this->flower = $flowerRepository;
    }

    public function index()
    {
        $flowers = $this->flower->all();
        return view('Flowers::' . $this->link_type . '.' . $this->current_theme . '.flowers.index', compact('flowers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Flowers::' . $this->link_type . '.' . $this->current_theme . '.flowers.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(FlowerFormRequest $request, MediaManagerController $media)
    {
        $attr = $request->all();
        $attr['image'] = $media->upload($attr['image'], 'flowers');
        $this->flower->create($attr);

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
        return view('Flowers::' . $this->link_type . '.' . $this->current_theme . '.flowers.create_edit', compact('flower'));
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
        $flower = $this->flower->getElementById($id);
        if($request->hasFile('image')) {
            if(file_exists($flower->image)) { unlink($flower->image);}
            $attr['image'] = $media->upload($attr['image'], 'flowers');
        }
        $this->flower->update($attr);

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