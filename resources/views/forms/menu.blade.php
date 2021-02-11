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
                          <a href="{{url('/PDF/'.($llv+5).'/'.$lmt)}}" class="btn btn-success" id="pdf">{{trans('application.sendapp')}}</a>
                    @endif

                    <form action="javascript: Guardar('pag{{$llv+5}}')" id="pag{{$llv+5}}" method="POST" >
                       @csrf 
                      @include($lmt,['d' => $dts[$llv+5] ??[]])
                      <button class="fa fa-save btn btn-success"> {{trans('forms.save')}}</button>
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
<div class="container">
<form id="ImagendeFirma"> 
   @csrf
  <div class="row">
    <div class="col-3 center"> 
      <input id="firmaUpl" type="file" style="display:none" name="ImgsTL" accept="image/*" onchange="javascript: subirFirma()">
      <span style="float: right;">{{trans("forms.UploadSignatureImage")}}
        <button type="button" id="firmafile" class="btn btn-success btn-sm fa fa-folder" onclick="javascript: SubeFirma()" ></button>   
      </span>   
    </div>
    <div class="col-1" style="text-align: center;">
        <strong>or</strong>
    </div>
    <div class="col-12">          
      
    </div>     
  </div> 

{{--
  <span style="float: left;">{{trans("forms.DrawSignature")}}
        <button type="button" class="btn btn-success btn-sm fa fa-pencil" data-toggle="modal" data-target="#myModal" onclick="javascript:Modal('signature_pad','', '')" ></button>
  </span>


 <button type="button" class="btn btn-info btn-sm"data-toggle="modal" data-target="#myModal" onclick="javascript:ModalView('Exam')">
          <i class="fa fa-th"></i>
  </button>
--}}

 </form>
  @include('signature_pad')
</div>
 
<script type="text/javascript">

  function SubeFirma(){
      
        $('#firmaUpl').click();
    };

	$('body').on('click', 'a[data-toggle="modal"]', function()
	{
	    $press=$(this).data("file");
	    $('#modal-body').empty().append("<div><iframe src='http://docs.google.com/gview?url="+$press+"&embedded=true' style='width:600px; height:500px;' frameborder='0'></iframe></div>");
	});

function Guardar(formulario)
{

  var data=$('#'+formulario).serialize();
  var data="_token={{ csrf_token()}}&"+data+"&ext="+formulario;

   $.post('/Guardar', data, function(subpage){  
        $('#btGuarda').attr("disabled",true);
        location.href="/forms/5/10/forms.menu";
    });
}


$('body').on('click', '#enviar', function()
  {
      location.href="/createPDF";
  });
  
  // Cuando el autentico cambia hace cambiar al falso
    $('input[type=file]').on('change', function(e){
      console.log("Subido");
      $(this).next().find('input').val($(this).val());
    });


   function subirFirma(){ 
    nombre=$("#firmaUpl").val();

    var miForm=document.getElementById('ImagendeFirma');   

            var dataFile = new FormData(miForm);
           
            $.ajax({ 
                             url: "/guardaFirma",
                            type: "post", 
                        dataType: "html",
                            data: dataFile,
                           cache: false,
                     contentType: false, 
                     processData: false 
                                                           
                  }).done(function(subpage){  
                  location.href="/forms/5/10/forms.menu";
                                            });
};  

</script>

@endsection