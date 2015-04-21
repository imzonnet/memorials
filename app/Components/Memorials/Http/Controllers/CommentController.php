<?php namespace App\Components\Memorials\Http\Controllers;

use App\Components\Memorials\Repositories\MemorialRepository;
use App\Components\Memorials\Repositories\PhotoCommentRepository;
use App\Components\Memorials\Repositories\VideoCommentRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use League\Flysystem\Exception;

class CommentController extends Controller
{
    /**
     * The memorial memorial
     * @var memorialRepository
     */
    protected $comment;

    /**
     * Display a listing of the resource.
     *
     * @param MemorialRepository $memorial
     * @param TimeLineRepository $timeline
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index($type, $id, PhotoCommentRepository $photo, VideoCommentRepository $video)
    {
        if(\Request::ajax()) {

            $attr = Input::all();

            switch ($type) {
                case 'photo' :
                    $this->comment = $photo;
                    $attr['photo_id'] = $id;
                    break;
                case 'video' :
                    $this->comment = $video;
                    $attr['video_id'] = $id;
                    break;
                default:
                    break;
            }

            try {
                $attr['likes'] = 0;
                $comment = $this->comment->create($attr);
                if($attr['parent_id'] == 0 )
                    return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.comment', compact('comment'));
                else
                    return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.comment-child', compact('comment'));
            } catch (Exception $e) {
                return \Response::json('error', 400);
            }

        }
        return redirect()->intended();
    }

    public function like($type, $id, PhotoCommentRepository $photo, VideoCommentRepository $video)
    {
        if(\Request::ajax()) {

            $attr = Input::all();

            switch ($type) {
                case 'photo' :
                    $this->comment = $photo;
                    break;
                case 'video' :
                    $this->comment = $video;
                    break;
                default:
                    break;
            }
            try {
                $comment = $this->comment->getElementById($id);
                $comment->likes += 1;
                $comment->save();
                return $comment->likes;
            } catch (Exception $e) {
                return \Response::json('error', 400);
            }

        }
        return redirect()->intended();
    }

}