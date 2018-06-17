<?php
namespace App\Http\Controllers;
use App\User;
use App\Date;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;



class UserController extends Controller {

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'

        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'] ])) {

            return redirect()->route('posts');

        }
        return redirect()->back()->with([
            'message' => 'There was an error. Please check Your login info.'
        ]);

    }


    public function postSignUp(Request $request){
        if(! Auth::user()->isAdmin()){
            $message = 'Your do not have permission to create accounts.';
            return redirect()->back()->with([
                'message' => $message
            ]);

        }
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'password' => 'required|min:4',
            'description' => 'required|max:3000'
        ]);

        $fname=$request['first_name'];
        $lname=$request['last_name'];
        $email=$request['email'];
        $pass=bcrypt($request['password']);
        $desc=$request['description'];


        $newuser = new User();

        $newuser->email=$email;
        $newuser->password=$pass;
        $newuser->first_name=$fname;
        $newuser->last_name=$lname;
        $newuser->desc=$desc;
        if($request['is_admin'] == 'admin'){
            $newuser->is_admin = true;
        }
        else{
            $newuser->is_admin = false;
        }
        $message = 'There was a problem.';
        if($newuser->save())
        {
            $message = 'Successfully created a new user.';
        }

        return redirect()->back()->with(['message' => $message]);

    }

    public function getSignOut(){
        Auth::logout();
        return redirect()->route('welcome');
    }

    public function getAccount(){
        $userid = Auth::user()->id;
        $dates = Date::where('user_id' , $userid)->get();

        if($dates->isEmpty()) {
            $dates = null;
        }
        return view('account', [
            'user' => Auth::user(),
            'dates' => $dates
        ]);
    }

    public function postSaveAccount(Request $request){
        $this->validate($request, [
           'first_name' => 'required|max:30',
           'last_name' => 'required|max:30',
           'desc' => 'required|max:3000',
        ]);
        $user=Auth::user();
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->desc = $request['desc'];
        $user->update();
        $file = $request->file('image');
        $filename = $user->id . '.jpg';
        if($file){
            Storage::disk('local')->put($filename, File::get($file));
            $img = Image::make($file)->resize(300,300)->save(base_path() . '/storage/app/' . $user->id . '-resize.jpg');

        }
        return redirect()->route('account');
    }

    public function getUserImage($filename){
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }

    public function getCreateUser(){
        return view('createUser');
    }

    public function getUsers(){
        $users = User::get();

        return view('users', [
            'users' => $users
        ]);
    }

    public function getDeleteUser($user_id){
        $user = User::where('id' , $user_id)->first();
        $currentUser = Auth::user();
        if($user === $currentUser){
            $msg = 'You can not delete your own profile.';
            return redirect()->back()->with(['message' => $msg]);
        }
        if(!($currentUser->isAdmin())) {
            $msg = 'You do not have permission to delete a user.';
            return redirect()->back()->with(['message' => $msg]);
        }
        $user->delete();
        $msg = 'User deleted successfully.';
        return redirect()->back()->with(['message' => $msg]);

    }





}