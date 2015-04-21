<?php namespace App\Components\Posts\Http\Controllers\Backend;

use App\Components\MediaManager\Http\Controllers\MediaManagerController;
use App\Components\Posts\Http\Requests\PostFormRequest;
use App\Components\Posts\Repositories\CategoryRepository;
use App\Components\Posts\Repositories\PostRepository;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    /**
     * The '. $this->post_type .' post
     * @var postRepository
     */
    protected $post;
    protected $post_type;
    protected $category;

    /**
     * Display a listing of the resource.
     *
     * @param postRepository $post
     * @param TimeLineRepository $timeline
     */
    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository)
    {
        parent::__construct();
        $this->post = $postRepository;
        $this->category = $categoryRepository;
        if (\Request::is('backend/post*')) {
            $this->post_type = 'post';
        } else {
            $this->post_type = 'page';
        }
        view()->share('post_type', $this->post_type);
    }

    public function index()
    {
        $posts = $this->post->all_post($this->post_type);
        return view('Posts::' . $this->link_type . '.' . $this->current_theme . '.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->category->all_categories($this->post_type);
        return view('Posts::' . $this->link_type . '.' . $this->current_theme . '.posts.create_edit', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PostFormRequest $request, MediaManagerController $media)
    {
        $attr = $request->all();
        $post = $this->post->create($attr);
        $post->categories()->sync($request->get('category_id', []));

        return redirect(route('backend.'.$this->post_type.'s.index'))->with('success_message', 'The '. $this->post_type .' has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->post->getElementById($id);
        $categories = $this->category->all_categories($this->post_type);
        return view('Posts::' . $this->link_type . '.' . $this->current_theme . '.posts.create_edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, PostFormRequest $request, MediaManagerController $media)
    {
        $attr = $request->all();
        $post = $this->post->update($attr);
        $post->categories()->sync($request->get('category_id', []));
        return redirect(route('backend.'.$this->post_type.'s.index'))->with('success_message', 'The '. $this->post_type .' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = $this->post->getElementById($id);
        $post->delete();
        return redirect()->back()->with('success_message', 'The '. $this->post_type .' has been deleted');
    }
}