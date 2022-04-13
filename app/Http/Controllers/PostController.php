<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Auth::user()->id;
        $data = Posts::all()->where("user_id", $userid);
        // dd($data->toArray());
        return view('postview', compact(['data', 'userid']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $userid = Auth::user()->id;

        if ($request->file('post_icon')) {
            $file = $request->file('post_icon');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(storage_path('app/public/posts/'), $filename);
        }

        $data = [
            'user_id' => $userid,
            'title' => $request->title,
            'description' => $request->description,
            'post_icon' => $filename,
        ];

        $post = Posts::create($data);

        // dd($post);
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postedit = Posts::findOrfail($id);
        // dd($postedit);
        return view('postsupdate',compact('postedit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userid = Auth::user()->id;
        $posts = Posts::find($id);

        if ($request->file('post_icon')) {
            $file = $request->file('post_icon');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(storage_path('app/public/posts/'), $filename);
        }

        $postupdate = [
            'user_id' => $userid,
            'title' => $request->title,
            'description' => $request->description,
            'post_icon' => $filename,
        ];

        $posts->update($postupdate);
        // dd($postupdate);
        return redirect('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postsdelete = Posts::find($id)->delete();
        return redirect('posts');
    }

    
}
