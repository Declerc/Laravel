 @extends('layouts.app') 
 @section('title', 'Livre') 
 @section('sidebar') 
 	@parent 



 @endsection 

 @section('content') 
 <h2>Les livres recherchés</h2> 
 <ul> 
 	@if ($results === 0)
 		<li>Mauvais genre taper</li>
 	@else
	
	 	@foreach ($results as $key => $value) 
	 		@foreach ($results[$key] as $key => $value)
	 			@if ($key === 'liv_titre')
	 				<li>{{ $value }}</li>
				@endif
				@if ($key === 'liv_prixttc')
	 				<span>prix: {{ $value }}€</span>
				@endif
				@if ($key === 'gen_libelle')
	 				<br><span>genre: {{ $value }}</span>
				@endif
				@if ($key === 'pho_url')
					<img src="{{asset("/fnackillian/resources/assets/Photos/Titeuf1.jpg")}}">
				@endif

	 		@endforeach 
	 	@endforeach 
 	@endif
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
