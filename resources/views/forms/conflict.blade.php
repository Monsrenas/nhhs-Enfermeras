<style type="text/css">
		textarea { 
				
				 overflow: auto;
				 width: 80%;
				 max-width: 80%;
				 height: 200px;
				 min-height: 200px;
		 }
  
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

	 if (isset($p)) { 
						$firmaIMG=$frm['firma']??""; 
					} else { 
								$firmaIMG=$dts["frm"]['firma']??"";
							}

	  $items=trans('forms.I_hereby_affirm');  
	  $firma=trans('forms.ConflitSignature');		  
?>

<h3 style="text-align: center;">{{trans('forms.CONFLICT')}}</h3>
<p>
	{{trans('forms.Please_check')}}	
</p>

<table class="table">
 
	@foreach ($items as $key=>$item)
	 <tr>	
		<td style="text-align: right;">
			<input type="radio" name="opcion" id="Radio{{$key}}" value="{{$key}}" {{($d["Radio".$key]??"")==$key? "checked":""}}>
		</td>		
		<td width="90%" style="text-align: justify;"> 	
			{{$item}}
		</td>	
	 </tr>	
	@endforeach
 
  <tr>
	<td></td>
	<td>{{trans('forms.Describe')}}</td>
 </tr>	
 <tr>
	<td></td>
	<td height="200"><textarea name="describe">{{$d["describe"]??""}}</textarea></td>
 </tr>	
 </table>

<p style="text-align: justify;">
	{{trans('forms.I_understand')}}	
</p>

<table class="table">
 <tr>	
	@foreach ($firma as $key=>$item)


		<td width="50%"> 
			@if (($firmaIMG!="")and($key==2))
		       <div class="firma">
		        <img src="data:image/png;base64,{{$firmaIMG}}" id="imgFirma" width="150" height="60">
		       </div> 
      		@endif

			@if (isset($p))
				<br>{{$d["firma".$key]?? ""}}<br>
				_____________________________ <br>
			@else
			  <input class="form-control form-control-sm" type="text" name="firma{{$key}}" value="{{$d["firma".$key]?? ""}}">
			@endif	
			
			<label style="color: gray;">{{$item}}</label>
			<br><br>
		</td>

		@if ($key==1) </tr><tr> @endif	
	@endforeach
 </tr>
</table>