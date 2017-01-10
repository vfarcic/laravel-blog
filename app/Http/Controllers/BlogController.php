<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $blogs = Blog::orderBy('created_at', 'asc')->get();

        return view('blogs', [
            'blogs' => $blogs
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addBlog(Request $request)
    {
        $validator = $this->validateFields($request);
        if($validator->fails()){
            return redirect('/')->withInput()->withErrors($validator);
        }
        Blog::create($request->all());

        return redirect()->route('show');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteBlog($id)
    {
        Blog::findOrFail($id)->delete();

        return redirect()->route('show');
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    protected function validateFields(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'   => 'required|max:100',
            'content' => 'required|max:255',
        ]);

        return $validator;
    }
}
