@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style="text-align: center" >
            <div class="pull-left" style="margin-bottom:20px" >
                <h2>Pet Catalogues</h2>
            </div>
			<div class="pull-right" style="margin-bottom:20px">
                <a class="btn btn-success" href="{{ route('pets.create') }}"> Add New Pet</a>
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
            <th>ID</th>
            <th>Class</th>
			<th>Name</th>
			<th>Price</th>
			<th width="250px" >Characteristics</th>
			<th width="250px">Environment</th>
			<th>Life Span</th>
			<th>Photo</th>
            <th width="100px">Action</th>
        </tr>
        @foreach ($pets as $pet)
        <tr>
            <td>{{ $pet->id }}</td>
            <td>{{ $pet->pet_class }}</td>
			<td>{{ $pet->pet_name }}</td>
			<td>{{ $pet->pet_price }}</td>
            <td>{{ $pet->pet_char }}</td>
			<td>{{ $pet->pet_envi }}</td>
			<td>{{ $pet->pet_life }}</td>
			<td> <img class="photo" alt="photo" src="/adopet/adopetpics/{{ $pet->pet_pic }}">
			
			</td>

            <td>
                <form id="form{{$pet->id}}" action="{{ route('pets.destroy',$pet->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('pets.show',$pet->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('pets.edit',$pet->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="button" class="btn btn-danger" onclick="verifyDelete({{$pet->id}})">Delete</button>
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
		$('#pet')[0].innerHTML = id;
		$('#myModal').modal()
	}
	function deletePet(){
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
        <p>Are you sure to delete the pet #<span id="pet"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="deletePet()">Ok</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
  
    {!! $pets->links() !!}
      
@endsection