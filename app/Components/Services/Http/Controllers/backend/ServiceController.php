<?php namespace App\Components\Services\Http\Controllers\Backend;

use App\Components\MediaManager\Http\Controllers\MediaManagerController;
use App\Components\Services\Http\Requests\ServiceFormRequest;
use App\Components\Services\Repositories\ServiceRepository;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{

    /**
     * The service service
     * @var serviceRepository
     */
    protected $service;

    /**
     * Display a listing of the resource.
     *
     * @param serviceRepository $service
     * @param TimeLineRepository $timeline
     */
    public function __construct(ServiceRepository $serviceRepository)
    {
        parent::__construct();
        $this->service = $serviceRepository;
    }

    public function index()
    {
        $services = $this->service->all();
        return view('Services::' . $this->link_type . '.' . $this->current_theme . '.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Services::' . $this->link_type . '.' . $this->current_theme . '.services.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ServiceFormRequest $request, MediaManagerController $media)
    {
        $attr = $request->all();
        $attr['image'] = $media->upload($attr['image'], 'services');
        $this->service->create($attr);

        return redirect(route('backend.service.index'))->with('success_message', 'The service has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $service = $this->service->getElementById($id);
        return view('Services::' . $this->link_type . '.' . $this->current_theme . '.services.create_edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, ServiceFormRequest $request, MediaManagerController $media)
    {
        $attr = $request->all();
        $service = $this->service->getElementById($id);
        if($request->hasFile('image')) {
            if(file_exists($service->image)) { unlink($service->image);}
            $attr['image'] = $media->upload($attr['image'], 'services');
        }
        $this->service->update($attr);

        return redirect(route('backend.service.index'))->with('success_message', 'The service has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $service = $this->service->getElementById($id);
        $service->delete();
        return redirect()->back()->with('success_message', 'The service has been deleted');
    }
}