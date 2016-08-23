<?php

namespace App\Http\Controllers\Backend;

use DB;
use Datatables;
use App\Models\Tag;
use App\Models\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.post.index');
    }

    /**
     * @return mixed
     */
    public function postList()
    {
        $post = Post::query();

        return Datatables::of($post)
            ->editColumn('title', function ($post)
            {
                return str_limit($post->title, 72);
            })
            ->addColumn('status', function ($post)
            {
                $badge = $post->is_draft ? 'default' : 'success';
                $status = $post->is_draft ? 'Unpublished' : 'Published';

                return '<span class="uk-badge uk-badge-' . $badge . '">' . $status . '</span>';
            })
            ->addColumn('author', function ($post)
            {
                return $post->author->display_name;
            })
            ->addColumn('action', function ($post)
            {
                $buttons = '<a href="' . route('admin::post.edit', $post->slug) . '" data-uk-tooltip="{pos:\'left\'}" title="Edit"><i class="material-icons md-24">&#xE254;</i></a>';
                $buttons .= '<a data-source="' . route('admin::plan.destroy', $post->slug) . '" data-uk-tooltip="{pos:\'left\'}" title="Delete"><i class="material-icons md-24">&#xE872;</i></a>';

                return $buttons;
            })
            ->make(true);
    }

    public function create()
    {
        $allTags = Tag::lists('tag')->all();

        return view('backend.post.create', compact('allTags'));
    }

    public function store(PostCreateRequest $request)
    {
        DB::transaction(function () use ($request)
        {
            $post = Post::create($request->postFillData());

            $this->uploadFeaturedImage($request, $post);

            $post->syncTags($request->get('tags', []));
        });

        return redirect()->back()->withSuccess(trans('messages.create_success', ['entity' => 'Post']));
    }

    /**
     * @param Post $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        $allTags = Tag::lists('tag')->all();

        $tags = $post->tags()->lists('tag')->all();

        return view('backend.post.edit', compact('post', 'allTags', 'tags'));
    }

    public function update(Post $post, PostUpdateRequest $request)
    {
        DB::transaction(function () use ($request, $post)
        {
            $post->update($request->postFillData());

            $this->uploadFeaturedImage($request, $post);

            $post->syncTags($request->get('tags', []));
        });

        return redirect()->back()->withSuccess(trans('messages.update_success', ['entity' => 'Post']));
    }

    /**
     * @param $request
     * @param $post
     */
    private function uploadFeaturedImage($request, $post)
    {
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');

            if ($post->image)
            {
                $post->image->upload($image);
            } else
            {
                $post->image()->create(['name' => cleanFileName($image)])->upload($image);
            }
        }
    }
}
