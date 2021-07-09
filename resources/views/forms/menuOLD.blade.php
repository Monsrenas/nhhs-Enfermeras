@extends('welcome')
@section('operaciones')

<?php 
    if(!isset($_SESSION)){
                          session_start();
                         }  

    $idm=(session('lang'))?(session('lang')):"en"; 
    $vistas=["forms.contrato_".$idm, "forms.addendum_".$idm,"forms.deposit","forms.conflict","forms.absence","forms.evaluation","forms.covid19"];    
?>
  
	<div class="row">
    
		<div class=" text-center col-12">
        	<h2 class="shodow p-9 m-0" style="text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);">{{trans('welcome.legalforms')}}</h2>
                
        </div>
@if (!isset($_SESSION['cliente']))
  <div style="text-align: center; width: 100%"> 
   <h4>{{trans('application.youmustlogin')}}</h4>
  </div> 
@else 

        <div class="container" >
          <!-- Tabs on Plain Card -->
          <div class="card card-nav-tabs card-plain">
            <div class="card-header card-header-success">
              <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->              
              <div class="nav-tabs-navigation" style="margin: 0 auto;">
                <div class="nav-tabs-wrapper">
                  <ul class="nav nav-tabs row" data-tabs="tabs">
                    <?php $items=trans('forms.name');?>
                    @foreach($items as $key=>$item)
                      <li class="nav-item col-lg-4 col-sm-6 p-1 m-0">
                        <a class="nav-link text-center" href="#frm{{$key}}" data-toggle="tab" style="font-size: .8em;"> 
                        	{{$item}}<br>
                        	<input type="checkbox" name="" @if (isset($dts[$key+5])) checked @endif>
                    	  </a>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>

            <div class="card-body ">
              <div class="tab-content text-center">
                @foreach($vistas as $llv=>$lmt)
                  <div class="tab-pane" id="frm{{$llv}}">
                    @if (isset($dts[$llv+5]))
                      <a href="{{url('/PDF/'.($llv+5).'/'.$lmt)}}" class="btn btn-success" id="pdf" onclick="javascript:mensaje('{{trans('forms.DocSend')}}');">{{trans('application.sendapp')}} </a>
                    @endif

                    <form action="javascript: Guardar('{{$llv+5}}','{{$lmt}}')" id="pag{{$llv+5}}" method="POST" >
                       @csrf 
                       <input type="text" name="VistA" value="{{$lmt}}" hidden>
                      @include($lmt,['d' => $dts[$llv+5] ??[]])
                      <button class="fa fa-save btn btn-success"> {{trans('forms.saveNDsubmit')}}</button>
                    </form>
                  </div>
                @endforeach

              </div>
            </div>
          </div>
          <!-- End Tabs on plain Card -->

	 	 </div>
     
 @endif     
	</div>
<hr/>
 
<script type="text/javascript">

	$('body').on('click', 'a[data-toggle="modal"]', function()
	{
	    $press=$(this).data("file");
	    $('#modal-body').empty().append("<div><iframe src='http://docs.google.com/gview?url="+$press+"&embedded=true' style='width:600px; height:500px;' frameborder='0'></iframe></div>");
	});

function Guardar(formulario, vista)
{

  var data=$('#pag'+formulario).serialize();
  var data="_token={{ csrf_token()}}&"+data+"&ext=pag"+formulario;

   $.post('/Guardar', data, function(subpage){  
        $('#btGuarda').attr("disabled",true);
         
        location.href="/PDF/"+formulario+"/"+vista;
        //location.href="/forms/5/10/forms.menu";
        mensaje('{{trans('forms.DocSavSend')}}');
    });
}


$('body').on('click', '#enviar', function()
  {
      mensaje('{{trans('forms.DocSend')}}');   
      location.href="/createPDF";
  });
  


</script>

@endsection