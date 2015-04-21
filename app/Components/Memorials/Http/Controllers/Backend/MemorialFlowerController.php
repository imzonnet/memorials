<?php namespace App\Components\Memorials\Http\Controllers\Backend;

use App\Components\Memorials\Http\Requests\MemorialFlowerFormRequest;
use App\Components\Memorials\Repositories\MemorialRepository;
use App\Components\Memorials\Repositories\MemorialFlowerRepository;
use App\Components\Memorials\Repositories\FlowerRepository;
use App\Http\Controllers\Controller;

class MemorialFlowerController extends Controller
{
    /**
     * The flower memorial
     * @var memorialRepository
     */
    protected $memorial;
    protected $flower;
    protected $memorial_flower;

    /**
     * Display a listing of the resource.
     *
     * @param flowerRepository $flower
     */
    public function __construct(MemorialRepository $memorial, MemorialFlowerRepository $flowerRepository, FlowerRepository $flower)
    {
        parent::__construct();
        $this->memorial = $memorial;
        $this->memorial_flower = $flowerRepository;
        $this->flower = $flower;
    }

    public function index($mid)
    {
        $memorial = $this->memorial->getElementById($mid);
        $memorial_flowers = $memorial->flowers->all();
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.flowers.index', compact('memorial_flowers', 'memorial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($mid)
    {
        $memorial = $this->memorial->getElementById($mid);
        $flowers = $this->flower->all_flowers();
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.flowers.create_edit', compact('memorial', 'flowers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($mid, MemorialFlowerFormRequest $request)
    {
        $attrs = $request->all();
        $this->memorial_flower->create($attrs);
        return redirect(route('backend.memorial.flower.index',$mid))->with('success_message', 'The flower has been created.');
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
        $flowers = $this->flower->all_flowers();
        $memorial_flower = $memorial->flowers->find($id);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.flowers.create_edit', compact('memorial_flower', 'memorial', 'flowers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($mid, $id, MemorialFlowerFormRequest $request)
    {
        $this->memorial_flower->update($request->all());

        return redirect(route('backend.memorial.flower.index',$mid))->with('success_message', 'The flower has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($mid, $id)
    {
        $this->memorial_flower->getElementById($id)->delete();
        return redirect()->back()->with('success_message', 'The flower has been deleted');
    }

}