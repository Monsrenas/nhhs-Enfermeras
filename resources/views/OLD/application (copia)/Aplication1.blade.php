@extends('welcome')
@section('operaciones')

<?php 
          if(!isset($_SESSION)){
                         session_start();
                       }  
?>
  
<div class="row">
		<div class="text-center col-12">
      <h2 class="shodow p-9 m-0" style="text-shadow: 0 0 10px rgba(0,0,0,0.7);">{{trans('welcome.application')}}</h2>          
        @if ((isset($dts[1]["last"]))and(isset($dts[2]["sigDate"]))and(isset($dts[3]["SEVENDAYSAWEEK"]))and(isset($dts[4]["sigSignature"])))
                 <button class="btn btn-success" id="enviar">{{trans('application.sendapp')}}</button>
        @endif
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
                    <li class="nav-item col-lg-3 col-sm-6">
                      <a class="nav-link active text-center" href="#home" data-toggle="tab"> 
                      	{{trans('application.application')}} <br>
                      	<input type="checkbox" name="" @if (isset($dts[1]["last"])) checked @endif>
                  	  </a>
                    </li>
                    <li class="nav-item col-lg-3 col-sm-6">
                      <a class="nav-link text-center" href="#updates" data-toggle="tab">{{trans('application.CERTIFICATIONS')}}<br>
                      	<input type="checkbox" name="" @if (isset($dts[2]["sigDate"])) checked @endif>
                      </a>
                    </li>
                    <li class="nav-item col-lg-3 col-sm-6">
                      <a class="nav-link text-center" href="#history" data-toggle="tab">
                      	{{trans('application.MATCHINGINFORMATIONSHEET')}}<br>
                      	<input type="checkbox" name="" @if (isset($dts[3]["SEVENDAYSAWEEK"])) checked @endif>
                      </a>
                    </li>
                    <li class="nav-item text-center col-lg-3 col-sm-6">
                      <a class="nav-link" href="#adjunta" data-toggle="tab">{{trans('application.CRIMINALINFORMATIONRELEASEtitle')}}<br>
                      	<input type="checkbox" name="" @if (isset($dts[4]["sigSignature"])) checked @endif>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body ">
              <div class="tab-content text-center">
                <div class="tab-pane active" id="home">
                  @include("application.application",['d1' => $dts[1] ??[] ])
                </div>
                <div class="tab-pane" id="updates">
                  @include("certifications.certifications",['d2' => $dts[2] ??[] ])
                </div>
                <div class="tab-pane" id="history">
                  @include("sheet.information",['d3' => $dts[3] ??[] ])
                </div>
                <div class="tab-pane" id="adjunta">
                  @include("release.autorization",['d4' => $dts[4] ??[] ])
                </div>
              </div>
            </div>
          </div>
          <!-- End Tabs on plain Card -->
	 	 </div>
 @endif  

  <script type="text/javascript">
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
            //$('.fa-save').attr("disabled",true);
            //location.href="/forms/1/4/application.Aplication1";
            mensaje('{{trans('forms.DocSav')}}');
        });
    }

    $('body').on('click', '#enviar', function()
      {
          mensaje('{{trans('forms.DocSend')}}');
          location.href="/createPDF";
      });
   
  </script>

@endsection