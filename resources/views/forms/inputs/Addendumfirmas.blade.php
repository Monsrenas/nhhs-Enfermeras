<style type="text/css">
  
   .firma {
          width: 200px;

          height: 130px;
          max-height: 135px;
          max-width: 200px;
          text-align: center;
          padding: 0px;
          margin-top: -20px;

          overflow: hidden;
          background: none;
          position: absolute;
         }

  @supports(object-fit: cover){
    .firma img{
              height: 50px;
              object-fit: cover;
              object-position: center center;
              padding: 2px;
          }
        }

</style>

<?php 
	if (isset($p)) { $firma=$frm['firma']??""; } else { $firma=$dts["frm"]['firma']??"";}

	$items=trans('forms.addendumfirma');
?>

<div class="table-responsive">
<table class="table">
<tr>
	<td style="text-align: center;">{{trans('forms.firmas')[0]}}</td>
	<td style="text-align: center;">{{trans('forms.firmas')[2]}}</td>
</tr> 
@foreach ($items as $key=>$item)
	<tr>
		@for ($i = 0; $i < 2; $i++)
		<td width="50%"> 
			@if (($firma!="")and($key==1)and($i==1))
		       <div class="firma">
		        <img src="data:image/png;base64,{{$firma}}" id="imgFirma" width="150" height="60">
		       </div> 
      		@endif
      		@if (isset($p))
      			<br>
      			{{$d["firma".$key.$i]?? ""}} <br>
      	 
      		@else
				<input class="form-control form-control-sm" type="text" name="firma{{$key}}{{$i}}" 
					   value="{{$d["firma".$key.$i]?? ""}}">
			@endif	
				<label style="color: gray;">{{$item}}</label>

		</td>
		@endfor 
	</tr>
@endforeach
</table>
</div>