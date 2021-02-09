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
	if (isset($p)) { 
						$firmaIMG=$frm['firma']??""; 
					} else { 
								$firmaIMG=$dts["frm"]['firma']??"";
							}

	$items=trans('forms.BankName');  
	$check=trans('forms.Checking');
	$firma=trans('forms.Signature');		  
?>


<h3 style="text-align: center;">{{trans('forms.Authorization')}}</h3>

<div style="text-align: left; color: black;">
<p>
	{{trans('forms.This_authorizes')}}	
</p>
@for ($i = 1; $i < 3; $i++)
  <h4><strong>{{trans('forms.Account#')}}{{$i}}</strong></h4>

  {{trans('forms.Account#')}}{{$i}} {{trans('forms.Type_check')}}
 <p> 
  @foreach ($check as $key=>$item)
  	<input type="checkbox" name="check{{$i}}{{$key}}" @if (isset($d["check".$i.$key])) checked @endif >
  	<label>{{$item}}</label>
  @endforeach
 </p> 	
 <table class="table">
  <tr>	
	@foreach ($items as $key=>$item)		
		<td width="50%" style="text-align: center;"> 
			@if (isset($p))
				<br><span style="padding-bottom: -20px;">	{{$d["bnk".$key.$i]?? ""}}</span> <br>
				_____________________________ <br>
			@else
			   <input class="form-control form-control-sm" type="text" name="bnk{{$key}}{{$i}}" value="{{$d["bnk".$key.$i]?? ""}}">
			@endif	
			<label style="color: gray;">{{$item}}</label>
		</td>

		@if ($key==1) 
			</tr> 
			<tr> 
		@endif	
	@endforeach
 </tr>	
 </table>
@endfor 

<div style="width: 90%; height: 300px; min-height: 300px; text-align: center; display: table; border: 2px solid #369; margin: 0 auto;" >
	<div style="display: table-cell; vertical-align: middle;">	
		{{trans('forms.Pleaseattac')}}
	</div>		
</div>
<br>
<p>
	{{trans('forms.authorizationeffect')}}	
</p>

<table class="table" width="100%">
 <tr>	
	@foreach ($firma as $key=>$item)		
		<td width="50%"> 
			@if (($firmaIMG!="")and($key==0))
		       <div class="firma">
		        <img src="data:image/png;base64,{{$firmaIMG}}" id="imgFirma" width="150" height="60">
		       </div> 
      		@endif

			@if (isset($p))
				<br><span style="padding-bottom: -20px;">	{{$d["firma".$key]?? ""}}</span> <br>
				_____________________________ <br>
			@else
			   <input class="form-control form-control-sm" type="text" name="firma{{$key}}" value="{{$d["firma".$key]?? ""}}">
			@endif	
			
			<label style="color: gray;">{{$item}}</label>
		</td>
		@if ($key==1) </tr><tr> @endif	
	@endforeach
 </tr>
</table>	
 </div>