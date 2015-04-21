<?php namespace App\Components\Memorials\Http\Controllers\Backend;

use App\Components\Memorials\Http\Requests\MemorialServiceFormRequest;
use App\Components\Memorials\Repositories\MemorialRepository;
use App\Components\Memorials\Repositories\MemorialServiceRepository;
use App\Components\Memorials\Repositories\ServiceRepository;
use App\Http\Controllers\Controller;

class MemorialServiceController extends Controller
{
    /**
     * The service memorial
     * @var memorialRepository
     */
    protected $memorial;
    protected $service;
    protected $memorial_service;

    /**
     * Display a listing of the resource.
     *
     * @param serviceRepository $service
     */
    public function __construct(MemorialRepository $memorial, MemorialServiceRepository $serviceRepository, ServiceRepository $service)
    {
        parent::__construct();
        $this->memorial = $memorial;
        $this->memorial_service = $serviceRepository;
        $this->service = $service;
    }

    public function index($mid)
    {
        $memorial = $this->memorial->getElementById($mid);
        $memorial_services = $memorial->services->all();
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.services.index', compact('memorial_services', 'memorial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($mid)
    {
        $memorial = $this->memorial->getElementById($mid);
        $services = $this->service->all_services();
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.services.create_edit', compact('memorial', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($mid, MemorialServiceFormRequest $request)
    {
        $attrs = $request->all();
        $this->memorial_service->create($attrs);
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
        $services = $this->service->all_services();
        $memorial_service = $memorial->services->find($id);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.services.create_edit', compact('memorial_service', 'memorial', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($mid, $id, MemorialServiceFormRequest $request)
    {
        $this->memorial_service->update($request->all());

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
        $this->memorial_service->getElementById($id)->delete();
        return redirect()->back()->with('success_message', 'The service has been deleted');
    }

}