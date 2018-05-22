<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Activity;

use Illuminate\Database\Eloquent\ModelNotFoundException;


class UserController extends Controller
{
    public function joinAct($actid)
    {
        // $actid = $request->input('id');
        try{
            $act = Activity::where('id', $actid)->firstOrFail();
        } catch (ModelNotFoundException $exp) {
            return $this->responseFail('Acitivity not available');
        }

        // $id = Auth::id();
        // $me = User::find($id);
        if(!Auth::guest()){
            $me = Auth::user();
            if($me->activities->find($act) != null){
                return redirect('acts/'.$actid)->with('error', 'You have already joined the activity');
            }
            else{
                $me->activities()->attach($act->id);
                // return $this->responseSuccess();
                return redirect('acts')->with('success', 'You have joined the activity');
            }
        }
        else{
            return redirect('acts/'.$actid)->with('error', 'You need to log in first');
        }
    }

    public function quitAct(Request $request)
    {
        $actid = $request->input('id');
        try{
            $act = Activity::where('id', $actid)->firstOrFail();
        } catch (ModelNotFoundException $exp) {
            return $this->responseFail('Acitivity not available');
        }

        $id = Auth::id();
        $me = User::find($id);

        $me->activities()->detach($act->id);

        return $this->responseSuccess();
    }

    private function responseSuccess($message = '')
    {
    	return $this->response(true, $message);
    }

    private function responseFail($message = '')
    {
    	return $this->response(false, $message);
    }
    
    private function response($status = false, $message = '')
    {
    	return response()->json([
    		'status' => $status,
    		'message' => $message,
    		]);
    }

    public function AllUser()
    {
        $users = User::all();
        #return $users->toJson();
        // echo $users."\r\n";
        // echo "\r\n";
        return $users->toArray();
    }

    public function AllUserActivity()
    {
        $users = User::all();
        // $user = User::find(1);
        $res = array();

        foreach($users as $user) {

            echo $user;

            foreach ($user->activities as $act)
            {
                echo $act;
                echo $act->pivot."\r\n";
                echo $act->pivot->activity_id."\r\n";
                $res[] = $act;
            }

            echo "\r\n\r\n";

            echo implode("|", $res);
            return json_encode($res);
        }


    }
}
