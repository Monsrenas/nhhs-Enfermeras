<style type="text/css">
  
   .firma {
          width: 200px;

          height: 164px;
          max-height: 164px;
          max-width: 200px;
          text-align: center;
          padding: 0px;
          margin-top: -66px;
          margin-left: 80px;
          overflow: hidden;
          background: none;
          position: absolute;
         }

  @supports(object-fit: cover){
    .firma img{
              height: 60px;
              object-fit: cover;
              object-position: center center;
              padding: 2px;
          }
        }

</style>

<?php   
	$firma=$dts["frm"]["firma"]??"";
	if ($firma=="") {
		$firma=$frm["firma"]??"";
	}
	$items=trans('forms.etiquetasfirma');
?>

<div class="table-responsive">
<table class="table" style="width: 100%;">
<tr>
	<td style="text-align: center;">{{trans('forms.firmas')[0]}}</td>
	<td style="text-align: center;">{{trans('forms.firmas')[1]}}</td>
</tr> 

		@if (isset($p))
		<tr>
			<td>
				<br><br><br>
		
			</td>
		</tr>
			
		@endif

@foreach ($items as $key=>$item)
	<tr>
		@for ($i = 0; $i < 2; $i++)
		<td width="50%"> 
			@if (($firma!="")and($key==0)and($i==1))
		       <div class="firma" id="MyFirma">
		        <img src="data:image/png;base64,{{$firma}}" class="SignatireImg" id="imgFirma" width="150" height="60">
		       </div> 
      		@endif

			@if (isset($p))
				{{$d["firma".$key.$i]?? ""}}<br>
				 
				<label style="color: gray;">{{$item}}</label><br><br>
			@else
						<input class=" form-control form-control-sm" type="text" name="firma{{$key}}{{$i}}" value="{{$d["firma".$key.$i]?? ""}}"><label>{{$item}}</label>
			@endif	

	</td>
		@endfor 
	</tr>
@endforeach
</table>
</div>

