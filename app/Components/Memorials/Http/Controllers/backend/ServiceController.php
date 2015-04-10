<?php namespace App\Components\Memorials\Http\Controllers\Backend;

use App\Components\Memorials\Http\Requests\ServiceFormRequest;
use App\Components\Memorials\Models\Memorial;
use App\Components\Memorials\Repositories\MemorialRepository;
use App\Components\Memorials\Repositories\MemorialServiceRepository;
use App\Components\Services\Repositories\ServiceRepository;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * The service memorial
     * @var memorialRepository
     */
    protected $memorialService;
    protected $service;
    protected $memorial;

    /**
     * Display a listing of the resource.
     *
     * @param serviceRepository $service
     */
    public function __construct(MemorialRepository $memorialRepository, MemorialServiceRepository $memorialService, ServiceRepository $serviceRepository)
    {
        parent::__construct();
        $this->memorial = $memorialRepository;
        $this->service = $serviceRepository;
        $this->memorialService = $memorialService;
    }

    public function index($mid)
    {
        $memorial = Memorial::find($mid);
        //$memorial = $this->memorial->getElementById($mid);
        dd($memorial->present()->hello);
        $s = $memorial->services->first();
        dd($s->present()->hello());
        $services = $memorial->services->all();
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.services.index', compact('services', 'memorial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($mid)
    {
        $memorial = $this->memorial->getElementById($mid);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.services.create_edit', compact('memorial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($mid, serviceFormRequest $request)
    {
        $attrs = $request->all();
        $this->serviceHelper->setUrl($attrs['url']);
        $attrs['image'] = $this->serviceHelper->getImage();
        $service = $this->service->create($attrs);
        return redirect(route('backend.memorial.service.index',$mid))->with('success_message', 'The service has been created.');
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
        $service = $memorial->services->find($id);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.services.create_edit', compact('service', 'memorial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($mid, $id, serviceFormRequest $request)
    {
        $attrs = $request->all();
        $service = $this->service->getElementById($id);

        $this->serviceHelper->setUrl($attrs['url']);
        $attrs['image'] = $this->serviceHelper->getImage();

        $service->update($attrs);

        return redirect(route('backend.memorial.service.index',$mid))->with('success_message', 'The service has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($mid, $id)
    {
        $this->service->getElementById($id)->delete();
        return redirect()->back()->with('success_message', 'The service has been deleted');
    }

}