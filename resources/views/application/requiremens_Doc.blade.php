@extends('welcome')
@section('operaciones')
<div class="container">	
	<h2 class="shodow p-9 m-0 text-center" style="text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);">{{trans('welcome.application')}}</h2>

	  <div class="text-center">
        <button class="btn btn-success" onclick="window.location.href='/forms/1/11/forms.menu'">
            {{trans('welcome.menuop')[1]}}
        </button>
      </div>
 

	<h3 class="text-center" style="color: red;">{{trans('requirements.REQUIREMENTSTOBECOMEAPROVIDER')}}</h3>

	<strong style="text-align: left;">{{trans('requirements.OneCopy')}} <br></strong>
	<br>
	@foreach(trans('requirements.docList') as $item)
	   <ul>
	   		<li style="text-align:  justify;">{{$item}}</li>
	   </ul>
	@endforeach
	<br>
	<h4>{{trans('requirements.IN-SERVICES')}}</h4>
	@foreach(trans('requirements.inList') as $item)
	   <ul>
	   		<li style="text-align:  justify;">{{$item}}</li>
	   </ul>
	@endforeach
	<br>
	<h4>{{trans('requirements.Optional')}}</h4>

	@foreach(trans('requirements.OpcList') as $item)
	   <ul>
	   		<li style="text-align:  justify;">{{$item}}</li>
	   </ul>
	@endforeach

	<div class="text-center">
        <button class="btn btn-success" onclick="window.location.href='/forms/1/4/application.Aplication1'">
            {{trans('welcome.menuop')[0]}}
        </button>
      </div>
</div>

@endsection 