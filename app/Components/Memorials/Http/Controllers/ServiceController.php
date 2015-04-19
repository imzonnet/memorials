<?php namespace App\Components\Memorials\Http\Controllers;

use App\Components\Memorials\Http\Requests\ServiceFormRequest;
use App\Components\Memorials\Repositories\MemorialRepository;
use App\Components\Memorials\Repositories\MemorialServiceRepository;
use App\Components\Services\Repositories\ServiceRepository;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * The guestbook memorial
     * @var memorialRepository
     */
    protected $memorial;
    protected $memorial_service;
    protected $service;

    /**
     * Display a listing of the resource.
     *
     * @param GuestbookRepository $guestbook
     */
    public function __construct(MemorialRepository $memorial, MemorialServiceRepository $memorialServiceRepository, ServiceRepository $serviceRepository)
    {
        parent::__construct();
        $this->memorial = $memorial;
        $this->service = $serviceRepository;
        $this->memorial_service = $memorialServiceRepository;
    }

    public function index($slug, $mid)
    {
        $memorial = $this->memorial->getElementById($mid);
        $services = $this->service->all();
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.services.index', compact('memorial', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($slug, $mid, $sid)
    {
        $memorial = $this->memorial->getElementById($mid);
        $service = $this->service->getElementById($sid);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.services.create', compact('memorial', 'service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($slug, $mid, $sid, ServiceFormRequest $request)
    {
        $attr = $request->all();
        $this->memorial_service->create($attr);
        return redirect(route('memorial.show',[$slug, $mid]))->with('success_message', 'Please wait us check it and call you soon!');
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
        $guestbook = $memorial->guestbooks->find($id);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.guestbooks.create_edit', compact('guestbook', 'memorial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($mid, $id, GuestbookFormRequest $request)
    {
        $guest = $this->guestbook->getElementById($id);
        $guest->update($request->all());
        return redirect(route('backend.memorial.guestbook.index',$mid))->with('success_message', 'The guestbook has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($mid, $id)
    {
        $this->guestbook->getElementById($id)->delete();
        return redirect()->back()->with('success_message', 'The guestbook has been deleted');
    }
}