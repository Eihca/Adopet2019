<?php
  
namespace App\Http\Controllers;
  
use App\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
  
class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
        $pets = Pet::latest()->paginate(5);
  
        return view('pets.index',compact('pets'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		if (!Auth::check())
			return redirect()->intended('login');
        return view('pets.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
            //'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
  
        /*$pet = Pet::create($request->all());
        if($request->hasFile('photo')){
			$image = $request->file('photo');
			$ext = $image->getClientOriginalExtension();
			$pet->photo = file_get_contents($image);
			switch (strtolower($ext)) {
				case "jpg":
				case "jpeg":
					$ext = "image/jpeg";
					break;
				case "png":
					$ext = "image/png";
					break;
			}
			$pet->photo_mime = $ext;
			$pet->save();
		};
   */
        return redirect()->route('pets.index')
                        ->with('success','Product created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        return view('pets.show',compact('pet'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
		if (!Auth::check())
			return redirect()->intended('login');
        return view('pets.edit',compact('pet'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
		if (!Auth::check())
			return redirect()->intended('login');
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
 			'price' => 'required',
			'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
		
        $pet->update($request->all());
		
		
		if($request->hasFile('photo')){
			$image = $request->file('photo');
			$ext = $image->getClientOriginalExtension();
			$pet->photo = file_get_contents($image);
			switch (strtolower($ext)) {
				case "jpg":
				case "jpeg":
					$ext = "image/jpeg";
					break;
				case "png":
					$ext = "image/png";
					break;
			}
			$pet->photo_mime = $ext;
			$pet->save();
		};
  
        return redirect()->route('pets.index')
                        ->with('success','Product updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
		if (!Auth::check())
			return redirect()->intended('login');
        $pet->delete();
        return redirect()->route('pets.index')
                        ->with('success','Product deleted successfully');
    }
  
    /**
     * Display the photo
     *
     * @param  the id of the product
     * @return image in binary
     */
    /*public function photo($id = null)
    {
        $pet = Pet::find($id);
		if ($pet == null || $pet->photo == null || $pet->photo_mime == '') {
            // not yet working though
            redirect()->to('images/notfound.png');
			return;
		}
		return response($pet->photo)
            ->header('Cache-Control', 'no-cache private')
            ->header('Content-Type', $pet->photo_mime)
            ->header('Content-length', strlen($pet->photo))
            ->header('Content-Transfer-Encoding', 'binary');
    }*/
}