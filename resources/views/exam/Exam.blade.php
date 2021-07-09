@extends('welcome')
@section('operaciones')

<?php 
          if(!isset($_SESSION)){
                         session_start();
                       }  
    $items=['last','first','middle'];
    $contenido=trans('exam.C');
    $signat=['Signature','Date'];
    
?>
  
<style type="text/css">
   ul { list-style-position: outside; } 
   li  { margin-left: 20px; }
</style>

<div class="row">
	<div class=" text-center col-12">
   
    <h2 class="shodow p-9 m-0" style="text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);">{{trans('exam.anualexam')}}</h2>

     @if (isset($exa[1]))
      <button class="btn btn-success enviar" type="button" id="Xenviar">{{trans('application.sendexam')}}</button>
    @endif
    
  </div>

@if (!isset($_SESSION['cliente']))
  <div style="text-align: center; width: 100%"> 
   <h4>{{trans('application.youmustlogin')}}</h4>
  </div> 
@else  

  <form action="javascript: Guardar('exam')" id="exam" method="POST" >
    <div class="container">

      <div class="form-group row" style="color: black; margin: 50px;">
        @foreach($items as $item)
          <input class="col-3 form-control form-control-sms" type="<?php echo ($item=='email')?'email':'text'; ?>" name="pag[{{$item}}]," value="{{$exa[$item]?? ""}}" placeholder="{{trans('application.'.$item)}}" style="margin-bottom: 20px;" @if ($item<>"middle") required @endif>  
        @endforeach 
      </div>

      <div class="container">
        <h3 class="text-center">{{trans('exam.HAVERECEIVED')}}</h3>
        <ul>
          @foreach($contenido as $i=>$item)
              <li>
                <input type="checkbox" name="pag[cnt{{$i}}]"  <?php if (isset($exa["cnt".$i])) echo "checked"; ?> >
                {{$item}}
              </li>  
          @endforeach 
        </ul>
        <div class="row ml-5" style="font-family:Brush Script MT;">
          @foreach($signat as $item)
            <div class="col-lg-5 col-sm-6">   
              <input class="form-control form-control-sms" type="<?php echo ($item=="Date")?"date":"text"?>" name="pag[sig{{$item}}]" id="sig{{$item}}" value="{{$exa["sig".$item]?? ""}}" required>
               <label>{{trans('application.'.$item)}}</label>
            </div>   
          @endforeach
        </div>
      </div>

 
      @foreach ($data as $i=>$tema)
        @if (gettype($tema)=="array")
        <ul>
            @foreach ($tema as $key=>$prg)
                @if ($key=="0")
                  <br><strong>{{$prg}}</strong><br>
                @else
                  <li>
                    <input type="radio" name="pag[{{$i}}]" id="inlineRadio{{$key}}" value="{{$key}}" {{($exa[$i]??"")==$key? "checked":""}} required>{{$key.") ".$prg}}<br>
                  </li>
                @endif
            @endforeach
         </ul>   
        @else
            <br><br>
            <h3 style="margin-left: 40px;">{{$tema}}</h3>    
        @endif    
      @endforeach
    
    </div>      <!-- End Container -->
    <button class="fa fa-save btn btn-success" style="margin-left: 340px;"> {{trans('application.savepage')}}</button>  
    @if (isset($exa[1]))
        <button type="button" class="btn btn-success enviar" id="enviar">{{trans('application.sendexam')}}</button>
    @endif
   </form>
@endif    
 	 </div>

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
        $('#btGuarda').attr("disabled",true);
        //location.href="/exam";
        mensaje('{{trans('forms.DocSav')}}');
    });
}


$('body').on('click', '.enviar', function()
  {

   $.get('/EnviarExamen', "", function(subpage){  
    
        //location.href="/exam";
        mensaje('{{trans('forms.DocSend')}}');
    });
  });
</script>
@endsection