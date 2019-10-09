 @extends('layouts.app') 
 @section('title', 'Livre') 

 @section('listeLivre') 
 <h2>Les livres recherchés</h2> 
 <ul> 
 	@if ($results === 0)
 		<li>Mauvais format taper</li>
 	@else
	 	@foreach ($results as $key => $value) 
	 		@foreach ($results[$key] as $key => $value)
	 			@if ($key === 'liv_id')
	 				<?php $id=$value; ?>
	 			@endif
	 			@if ($key === 'liv_titre')
	 				<li><a href="/detail?param=<?php echo $id;?>">{{ $value }}</a></li>
				@endif
				@if ($key === 'liv_prixttc')
	 				<span>prix: {{ $value }}€</span>
				@endif
				@if ($key === 'for_libelle')
	 				<br><span>format: {{ $value }}</span>
				@endif
				@if ($key === 'pho_url')
					<br><img src="{{asset("resources/assets/Photos/$value.jpg")}}" style="width:90px;height:90px;">
				@endif

	 		@endforeach 
	 	@endforeach 
 	@endif
 </ul> 
@endsection



