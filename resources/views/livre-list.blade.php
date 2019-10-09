 @extends('layouts.app') 
 @section('title', 'Livre') 
 @section('sidebar') 
 	@parent 



 @endsection 



 @section('listeLivre') 
 <h2>Les livres</h2> 
 <ul> 
 	@foreach ($livres as $livre) 
 	<li><a href="/detail?param=<?php echo $livre->liv_id;?>">{{ $livre->liv_titre }}</a> {{ $livre->liv_prixttc }} €</li> 
	@endforeach


 </ul> 
@endsection








