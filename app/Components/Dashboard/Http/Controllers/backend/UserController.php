<?php namespace App\Components\Dashboard\Http\Controllers\Backend;

use App\Components\Dashboard\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Components\Dashboard\Repositories\User\UserRepository;

class UserController extends Controller
{

    /**
     * The User Model
     * @var UserRepository
     */
    protected $user;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(UserRepository $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $attr = $request->all();
        $attr['password'] = bcrypt($attr['password']);
        $this->user->create($attr);
        return redirect(route('backend.user.index'))->with('success_message', 'The account has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->user->getUserById($id);
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.users.create', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, UserRequest $request)
    {
        $attr = $request->all();
        $attr['password'] = bcrypt($attr['password']);
        $this->user->getUserById($id)->update($attr);
        return redirect(route('backend.user.index'))->with('success_message', 'The account has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->user->getUserById($id)->delete();
        return redirect()->back()->with('success_message', 'The account has been deleted');
    }
}