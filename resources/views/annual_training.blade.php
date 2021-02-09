@extends('welcome')
@section('operaciones')

<style type="text/css"> .negra {color: black;} </style>
<div class="container  ">
 	<div class="col-12 text-center">
          <h2 class="shodow p-9 m-0" style="text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);">{{trans('welcome.training')}}</h2>

          <div>
             <button class="btn btn-success" id="enviar" onclick="window.location.href='/exam'">
                
            {{trans('welcome.exametq')}}</button>
          </div>
    </div>
    
	<div class="space-50"></div> 
	<div class="row">
	@foreach ($info as $item)  
	 <figure class="col-md-3 col-sm-6" style="text-align: center; align-content: center; ">
    	<a class="black-text negra" href="#" data-file="{{asset($item)}}" data-toggle="modal" data-target="#myModal">
      		<img alt="picture" src="{{asset('Material/annualtraining/'.pathinfo($item)['filename'])}}.jpg" class="img-fluid rounded-circle" style="min-height: 250px; height: 250px; width: 250px; display: inline-flex; margin: 0 auto;">
      		<p class="text-center">
      			{{trans('training.'.pathinfo($item)['filename'])}}
      		</p>
    	</a>
  </figure>

    @endforeach
    </div>  
</div>



<script type="text/javascript">
	$('body').on('click', 'a[data-toggle="modal"]', function()
	{
	    $press=$(this).data("file");
	    $('#modal-body').empty().append("<div><iframe src='https://docs.google.com/gview?url="+$press+"&embedded=true' style='width:600px; height:500px;' frameborder='0'></iframe></div>");
	});
</script>

@endsection


