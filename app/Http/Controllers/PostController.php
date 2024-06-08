<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;



class PostController extends Controller
{
    public function index()
    {
        $tag = Tag::whereDoesntHave('posts')->get();

        return view('Post.Create',['tags' => $tag]);
    }

    public function create(PostRequest $request)
    {
        $data = [];
        $data['name'] = $request->name;
        
        $input = $request->file('image');

        $ext = $input->getClientOriginalExtension();
        $file = $input->getClientOriginalName();
        $filename = 'DOC-' . $file;

        $path = '/public/images/' . $filename;
        Storage::disk('local')->put($path, file_get_contents($input));

        $data['image'] =  $filename;
        $post = Post::create($data);

        $post->tags()->attach($request->tag_id);

        return redirect()->route('admin.dashboard')->with('success', 'Post created successfully.');
    }

    public function delete($id)
    {

        $post = Post::find($id);
        $post->tags()->detach();
        $post->users()->detach();
        $post->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Post deleted successfully.');

    }
}
