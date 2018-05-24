<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use Carbon\Carbon;

class ActivityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'edit', 'update', 'destroy', 'store']]);
    }

    public function searchByCategory(Request $request)
    {
        $acts = Activity::where('category_no', '=', $request->category_no)->paginate(10);
        return view('activities.index')->with(array('activities'=> $acts, 'title'=>$request->category_no));
    }

    public function searchByString(Request $request)
    {
        $searchInput = $request->get('q');
        $acts = Activity::where('title', 'LIKE', '%'.$searchInput.'%')->orWhere('body', 'LIKE', '%'.$searchInput.'%')->orderBy('created_at', 'desc')->paginate(10);
        // return view('activities.index')->with('activities', $acts);
        return view('activities.index')->with(array('activities'=> $acts, 'title'=>null));
    }

    public function sortByPageView(Request $request)
    {

        // $acts = Activity::orderBy('created_at', 'desc')->orderByViewsCount()->paginate(10);
        $acts = Activity::orderByViewsCount()->orderBy('created_at', 'desc')->get();

        // $acts = Activity::orderByViewsCount()->paginate();

        return view('activities.index')->with(array('activities'=> $acts, 'title'=>null));
    }


    public function index()
    {
        $acts = Activity::orderBy('created_at', 'desc')->paginate(10);
        return view('activities.index')->with(array('activities'=> $acts, 'title'=>null));
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if ($request->hasFile('cover_image')) 
        {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } 
        else 
        {
            $fileNameToStore = 'noimage.jpg';
        }   

        // Create Activity
        $act = new Activity;
        $act->title = $request->input('title');
        $act->body = $request->input('body');
        $act->creator_id = \Auth::user()->id;
        $act->category_no = (int)$request->input('category_no')[0]-1;
        $act->num_ppl = $request->input('num_ppl');
        $act->cover_image = $fileNameToStore;
        // $act->start_time = $request->input('start_time');
        // $act->end_time = $request->input('end_time');
        $act->start_time = date_create_from_format('m/d/Y g:i A', $request->input('start_time'));
        $act->end_time = date_create_from_format('m/d/Y g:i A', $request->input('end_time'));
        $act->location = $request->input('location');
        $act->save();

        return redirect('acts')->with('success', 'Activity Created');
        
    }

    public function show($id)
    {
        $act = Activity::find($id);
        return view('activities.show')->with('act', $act);
    }

    public function edit($id)
    {
        $act = Activity::find($id);
        
        if(auth()->user()->id !== $act->creator_id)
        {
            return redirect('acts')->with('error', 'Unauthorized Page');
        }

        return view('activities.edit')->with('act', $act);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        if ($request->hasFile('cover_image')) 
        {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        } 
        // Edit Activity
        $act = Activity::find($id);
        $act->title = $request->get('title');
        $act->body = $request->get('body');
        $act->category_no = (int)($request->get('category_no')[0])-1;
        $act->num_ppl = $request->get('num_ppl');
        $act->start_time = date_create_from_format('m/d/Y g:i A', $request->input('start_time'));
        $act->end_time = date_create_from_format('m/d/Y g:i A', $request->input('end_time'));
        $act->location = $request->input('location');
        if ($request->hasFile('cover_image'))
        {
            $act->cover_image = $fileNameToStore;
        }


        $act->save();

        return redirect('acts')->with('success', 'Activity Updated');
    }

    public function destroy($id)
    {
        $act = Activity::findOrFail($id);

        if(Auth::user()->id != $act->creator_id)
        {
            return redirect('dashboard')->with('error', 'Unauthorized Page');
        }

        if($act->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('storage/cover_images/'.$act->cover_image);
        }

        $act->delete();
        return redirect('dashboard')->with('success', 'Activity Removed');
    }

    public function joinUser($actid)
    {
        $act = Activity::find($actid);
        if (!Auth::guest()){
            $me = Auth::user();
            if($me->activties->find($act) != null){
                return redirect('acts')->with('error', 'You have already joined the activity');
            }
            else{
                $act->users()->attach($me->id);
                return redirect('acts')->with('success', 'You have joined the activty');
            }
        }
        else{
            return redirect('acts')->with('error', 'You need to log in to join an acitivty');
        }

    }

    public function shareToTwitter($actid)
    {
        return Share::load('http://127.0.0.1/acts/'.$actid.'twitter', 'Sharing the activity to twitter')->twitter();
    }

    public function fakeDestroy(){
        return redirect('dashboard')->with('success', 'Activity Removed');
    }

}
