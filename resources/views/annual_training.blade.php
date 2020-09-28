@extends('welcome')
@section('operaciones')

	<div class="container row">
	 	<div class="tim-typo text-center">
              <h2 class="shodow p-9 m-0" style="text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);">{{trans('welcome.training')}}</h2>
        </div>
        
		<div class="space-50"></div> 
		@foreach ($info as $item)  
		 <figure class="col-md-3">
        <a class="black-text" href="#" style="color: black;" 
          data-file="{{asset($item)}}" data-toggle="modal" data-target="#myModal">
          <img alt="picture" src="{{asset('Material/annualtraining/'.pathinfo($item)['filename'])}}.jpg" class="img-fluid rounded-circle" style="min-height: 250px; height: 250px; width: 250px; display: inline-flex;">
          <p class="text-center" style="margin-left: 50px; margin-top: -30px;">{{trans('training.'.pathinfo($item)['filename'])}}</p>
        </a>
      </figure>

        @endforeach  
	</div>

<script type="text/javascript">
	$('body').on('click', 'a[data-toggle="modal"]', function()
	{
	    $press=$(this).data("file");
	    $('#modal-body').empty().append("<div><iframe src='http://docs.google.com/gview?url="+$press+"&embedded=true' style='width:600px; height:500px;' frameborder='0'></iframe></div>");
	});
</script>

@endsection