<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Act;
// use App\Org;
use DB;

class ActsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //TODO: add filters
        $acts = Act::orderBy('created_at', 'desc')->paginate(5);
        return view('acts.index')->with('acts', $acts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('acts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            // 'cover_image' => 'image|nullable|max:1999'
        ]);
        // Handle File Upload
        // if($request->hasFile('cover_image')){
        //     // Get filename with the extension
        //     $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        //     // Get just filename
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     // Get just ext
        //     $extension = $request->file('cover_image')->getClientOriginalExtension();
        //     // Filename to store
        //     $fileNameToStore= $filename.'_'.time().'.'.$extension;
        //     // Upload Image
        //     $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        // } else {
        //     $fileNameToStore = 'noimage.jpg';
        // }
        // Create Activity 
        $act = new Act;
        $act->title = $request->input('title');
        $act->body = $request->input('body');
        $act->start_time = $request->input('start_time');
        $act->end_time = $request->input('end_time');
        $act->user_id = auth()->user()->id;
        // $act->cover_image = $fileNameToStore;
        $act->save();
        return redirect('/acts')->with('success', 'Activity Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $act = Act::find($id);
        return view('acts.show')->with('act', $act);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $act = Act::find($id);

        // Check for correct user
        if(auth()->user()->id !==$act->user_id){
            return redirect('/acts')->with('error', 'Unauthorized Page');
        }
        return view('acts.edit')->with('act', $act);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
         // Handle File Upload
        // if($request->hasFile('cover_image')){
        //     // Get filename with the extension
        //     $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        //     // Get just filename
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     // Get just ext
        //     $extension = $request->file('cover_image')->getClientOriginalExtension();
        //     // Filename to store
        //     $fileNameToStore= $filename.'_'.time().'.'.$extension;
        //     // Upload Image
        //     $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        // }

        // Create Activity 
        $activity = Act::find($id);
        $act->title = $request->input('title');
        $act->body = $request->input('body');
        // if($request->hasFile('cover_image')){
        //     $act->cover_image = $fileNameToStore;
        // }
        $act->save();
        return redirect('/acts')->with('success', 'Act Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $act = Act::find($id);
        // Check for correct user
        if(auth()->user()->id !==$act->user_id){
            return redirect('/acts')->with('error', 'Unauthorized Page');
        }
        if($act->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$act->cover_image);
        }
        
        $act->delete();
        return redirect('/acts')->with('success', 'Activitiy Removed');
    }
}
