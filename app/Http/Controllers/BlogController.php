<?php

namespace App\Http\Controllers;

// Utils
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

// Modals
use App\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(5);
        return view('blog.index')
            ->with(
                [
                    'blogs' => $blogs
                ]
            );
    }

    public function createBlogPage(){
        return view('blog.create');
    }

    public function createBlog(Request $request){
        $validation = [
			'title' => 'required',
			'body' => 'required',
			'image' => 'required'
		];

		//Apply validation
		$validator = Validator::make($request->all(), $validation);

		if ($validator->fails()) {
            session()->flash('error', $validator->errors(),);
			return redirect()
                ->back() 
                ->withErrors($validator)
                ->withInput();
		}
        
        $title = $request->title;
        $body = $request->body;
        $image_link = $this->storeFile($request);
        
        $create_blog = new Blog();
        $create_blog->title = $title;
        $create_blog->body = $body;
        $create_blog->image = $image_link;
        $create_blog->save();

        session()->flash('success', 'Blog is successfully created!');
        return redirect('/blog');
    }

    public function storeFile($request){
        if ($request->hasFile('image')) {
            $image = Input::file('image');
			$image_path = 'blog/';
			$path = Storage::disk('public')->put($image_path, $image);
            $image_link = url('storage/' . $path);
        } else {
            $image_link = NULL;
        }
        return $image_link;
    }

    public function deleteBlog($blog_id){
        $delete_blog = Blog::find($blog_id);
        $delete_blog->delete();

        session()->flash('success', 'Blog is successfully deleted!');
        return redirect('/blog');
    }

    public function editBlogPage(Request $request){
        $blog = Blog::find($request->blog_id);
        return view('blog.edit')
            ->with(
                [
                    'blog' => $blog
                ]
            );
    }

    public function editBlog(Request $request){
        $validation = [
			'title' => 'required',
			'body' => 'required'
		];

		//Apply validation
		$validator = Validator::make($request->all(), $validation);

		if ($validator->fails()) {
            session()->flash('error', $validator->errors(),);
			return redirect()
                ->back() 
                ->withErrors($validator)
                ->withInput();
		}

        $blog = Blog::where('id', $request->blog_id)->first();
        $blog->title = $request->title;
        $blog->body = $request->body;
        if(isset($request->image)){
            $image_link = $this->storeFile($request);
            $blog->image = $image_link;
        }
        $blog->save();
       
        session()->flash('success', 'Blog #' . $request->blog_id . ' is successfully edited!');
        return redirect('/blog');
    }

    public function viewBlogPage(Request $request){
        $blog = Blog::find($request->blog_id);
        return view('blog.view')
            ->with(
                [
                    'blog' => $blog
                ]
            );
    }
}
