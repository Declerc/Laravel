 @extends('layouts.app') 
 @section('title', 'Livre') 
 @section('sidebar') 
 	@parent 



 @endsection 



 @section('content') 
 <h2>Les livres</h2> 
 <ul> 
 	@foreach ($livres as $livre) 
 	<li>{{ $livre->liv_titre }} {{ $livre->liv_prixttc }}</li> 
 	@endforeach 
 </ul> 
@endsection


<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="request"
            placeholder="Search genre"> <span class="input-group-btn">
            <input type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </input>
        </span>
    </div>
</form>




