========================================================================================
Laravel Show Limited String like post excerpt 
========================================================================================

@php
	$limit = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores atque consequatur cum deleniti deserunt ea enim eveniet fugiat fugit iure maxime nemo neque numquam odit officia, quam
	quas rem repellendus.';
@endphp

{{$value = str_limit($limit, 7) }}