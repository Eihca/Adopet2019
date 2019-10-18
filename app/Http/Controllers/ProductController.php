<?php
  
namespace App\Http\Controllers;
  
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
        $products = Product::latest()->paginate(5);
  
        return view('products.index',compact('products'))
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
        return view('products.create');
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
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
  
        $product = Product::create($request->all());
        if($request->hasFile('photo')){
			$image = $request->file('photo');
			$ext = $image->getClientOriginalExtension();
			$product->photo = file_get_contents($image);
			switch (strtolower($ext)) {
				case "jpg":
				case "jpeg":
					$ext = "image/jpeg";
					break;
				case "png":
					$ext = "image/png";
					break;
			}
			$product->photo_mime = $ext;
			$product->save();
		};
   
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
		if (!Auth::check())
			return redirect()->intended('login');
        return view('products.edit',compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
		if (!Auth::check())
			return redirect()->intended('login');
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
 			'price' => 'required',
			'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
		
        $product->update($request->all());
		
		
		if($request->hasFile('photo')){
			$image = $request->file('photo');
			$ext = $image->getClientOriginalExtension();
			$product->photo = file_get_contents($image);
			switch (strtolower($ext)) {
				case "jpg":
				case "jpeg":
					$ext = "image/jpeg";
					break;
				case "png":
					$ext = "image/png";
					break;
			}
			$product->photo_mime = $ext;
			$product->save();
		};
  
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
		if (!Auth::check())
			return redirect()->intended('login');
        $product->delete();
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
  
    /**
     * Display the photo
     *
     * @param  the id of the product
     * @return image in binary
     */
    public function photo($id = null)
    {
        $product = Product::find($id);
		if ($product == null || $product->photo == null || $product->photo_mime == '') {
            // not yet working though
            redirect()->to('images/notfound.png');
			return;
		}
		return response($product->photo)
            ->header('Cache-Control', 'no-cache private')
            ->header('Content-Type', $product->photo_mime)
            ->header('Content-length', strlen($product->photo))
            ->header('Content-Transfer-Encoding', 'binary');
    }
}