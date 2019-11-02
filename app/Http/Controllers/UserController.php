<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::latest()->paginate(5);
  
        return view('user.index',compact('user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function store(Request $request)
	
    {
		
		if(!Auth::check())
			return redirect()->intended('login');
		$user = auth()->user();
		$user = User::find($user->id);
		$request->validate([
			'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
			
        ]);
		
		if($request->hasFile('photo')){
			$image = $request->file('photo');
			$ext = $image->getClientOriginalExtension();
			$user->photo = file_get_contents($image);
			switch (strtolower($ext)) {
				case "jpg":
				case "jpeg":
					$ext = "image/jpeg";
					break;
				case "png":
					$ext = "image/png";
					break;
			}
			$user->photo_mime = $ext;
			$user->save();
		};
  
        return redirect()->route('home')
                        ->with('success','User updated successfully');
    }
	public function photo()
    {
        $user = auth()->user();
		if ($user == null || $user->photo == null || $user->photo_mime == '') {
            // not yet working though
            redirect()->to('images/notfound.png');
			return;
		}
		return response($user->photo)
            ->header('Cache-Control', 'no-cache private')
            ->header('Content-Type', $user->photo_mime)
            ->header('Content-length', strlen($user->photo))
            ->header('Content-Transfer-Encoding', 'binary');
    }
  
	public function show($id)
    {
        return view('user.profile', ['secret' => 14344, 'user' => $id]);// User::findOrFail($id)]);
    }
}

