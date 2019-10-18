@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Our Products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
			<th>Price</th>
			<th>Photo</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
			<td>{{ $product->price }}</td>
			<td><img class="photo" alt="photo" src="/products/{{$product->id}}/photo"></td>

            <td>
                <form id="form{{$product->id}}" action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="button" class="btn btn-danger" onclick="verifyDelete({{$product->id}})">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
	
	<script>
	var delId;
	function verifyDelete(id){
		//alert(id)
		delId = id;
		$('#product')[0].innerHTML = id;
		$('#myModal').modal()
	}
	function deleteProduct(){
		$('#form' + delId)[0].submit();
	}
	</script>
	<div id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure to delete the product #<span id="product"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="deleteProduct()">Ok</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
  
    {!! $products->links() !!}
      
@endsection