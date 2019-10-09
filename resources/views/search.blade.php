@extends('layouts.app') 
@section('title', 'Livre') 
@section('listeLivre') 
<h2>Les livres recherchés</h2> <ul> 
	@if ($results === []) 
		<li>Mauvais genre taper</li> 
	@endif 
	@foreach ($results as $key => $value) 
		
		@foreach ($results[$key] as $key => $value)  
			
			@if ($key === 'aut_nom')   

				{{ $value }} <br><br> @endif  

			@if ($key === 'liv_id')
	 			<?php $id=$value; ?>
	 		@endif
			@if ($key === 'liv_titre')

				<li><a href="/detail?param=<?php echo $id;?>">{{ $value }}</a></ @endif 

			@if ($key === 'liv_prixttc') 

				{{ $value }} €  </li>  @endif 

			@if ($key === 'pho_url')
				<br><img src="{{asset("resources/assets/Photos/$value.jpg")}}" style="width:90px;height:90px;">
			@endif

		@endforeach 

	@endforeach 

</ul> @endsection