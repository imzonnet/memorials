<?php namespace App\Components\Memorials\Http\Controllers;

use App\Components\MediaManager\Http\Controllers\MediaManagerController;
use App\Components\Memorials\Http\Requests\GuestbookFormRequest;
use App\Components\Memorials\Repositories\GuestbookRepository;
use App\Components\Memorials\Repositories\MemorialRepository;
use App\Http\Controllers\Controller;

class GuestbookController extends Controller
{
    /**
     * The guestbook memorial
     * @var memorialRepository
     */
    protected $memorial;
    protected $guestbook;

    /**
     * Display a listing of the resource.
     *
     * @param GuestbookRepository $guestbook
     */
    public function __construct(MemorialRepository $memorial, GuestbookRepository $guestbook)
    {
        parent::__construct();
        $this->memorial = $memorial;
        $this->guestbook = $guestbook;
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index($slug, $id)
    {
        $memorial = $this->memorial->getElementById($id);
        $guestbooks = $memorial->guestbooks->all();
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.guestbooks.index', compact('memorial', 'guestbooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($slug, $mid)
    {
        $memorial = $this->memorial->getElementById($mid);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.guestbooks.create', compact('memorial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($slug, $mid, GuestbookFormRequest $request, MediaManagerController $media)
    {
        $this->guestbook->create($request->all());
        return redirect(route('memorial.guestbooks',[$slug, $mid]))->with('success_message', 'The guestbook has been created');
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