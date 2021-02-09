<style type="text/css">
	 .firma {
          width: 200px;

          height: 130px;
          max-height: 135px;
          max-width: 200px;
          text-align: center;
          padding: 0px;
          margin-top: -60px;

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
</style>

<?php 
	 if (isset($p)) { 
						$firmaIMG=$frm['firma']??""; 
					} else { 
								$firmaIMG=$dts["frm"]['firma']??"";
							}

	  $items=trans('forms.info');  
	  $items2=trans('forms.Type_List');
	  $items3=trans('forms.AbsenceFromTo');
	  $items4=trans('forms.Approved');
	  $firma1=trans('forms.SignatureAbsence');
	  $firma=trans('forms.SignatureManager');		  
?>
<h3 style="text-align: center;">{{trans('forms.Absence')}}</h3>

 <table class="table" width="100%">
  <tr>
	<td colspan="2">{{trans('forms.AbsenceInfo')}}</td>  	
  </tr>	
  <tr>	
	@foreach ($items as $key=>$item)		
		<td width="50%" style="text-align: center;" @if (($key==0)or($key==3)) colspan="2" @endif > 
			@if (isset($p))
				{{$d["info".$key]?? ""}} <br>
			@else
				<input class="form-control form-control-sm" type="text" name="info{{$key}}" value="{{$d["info".$key]?? ""}}">
			@endif	
			<label style="color: gray;">{{$item}}</label>
		</td>

		@if (($key==0)or($key==2)) 
			</tr> 
			<tr> 
		@endif	
	@endforeach
	</tr>
 </tr>	
 </table>	
 
  <table class="table" width="100%">
   <tr>
	<td colspan="2">{{trans('forms.Type_of_Absence')}}</td>  	
  </tr>		
  <tr>	
	@foreach ($items2 as $key=>$item)		
		<td width="10" style="text-align: center;"> 
	 		<input type="checkbox" name="check{{$key}}" @if (isset($d["check".$key])) checked @endif >
		</td>
		<td>
			<label>{{$item}}</label>
		</td>

		@if ($key==3) 
			</tr> 
			<tr> 
		@endif	
	@endforeach
 </tr>	
 </table>
 
 <br>

 <table class="table" width="100%">
   <tr>
   <td width="20%">{{trans('forms.DateAbsence')}}</td>  		
	@foreach ($items3 as $key=>$item)		
		<td style="text-align: center;"> 
		@if (isset($p))
			{{$d["dfy".$key]??""}} <br>
		@else		
	 		<input class="form-control form-control-sm" type="date" name="dfy{{$key}}" value="{{$d["dfy".$key]??""}}" >
	 	@endif	
	 		<label style="color: gray">{{$item}}</label>
		</td>	
	@endforeach
 </tr>	
 </table>
<br>
 <table width="100%">
 	<tr>
 		<td>
 			{{trans('forms.Reason')}}<br>
 		</td>
 	</tr>
 </table>
 
 <textarea name="reason">{{$d["reason"]??""}}</textarea>
 
 <p>
 	{{trans('forms.must_submit')}}
 </p>

@if (isset($p))
	<br><br><br>
@endif

 <table class="table" width="100%">
   <tr>  		
	@foreach ($firma1 as $key=>$item)		
		<td>
			@if (($firmaIMG!="")and($key==0))
		       <div class="firma">
		        <img src="data:image/png;base64,{{$firmaIMG}}" id="imgFirma" width="150" height="60">
		       </div> 
      		@endif			
			@if (isset($p))
				{{$d["dft".$key]??""}} <br>
			@else 
	 			<input class="form-control form-control-sm" type="@if (($item=='Date')or($item=='Fecha')) date @endif" name="dft{{$key}}" value="{{$d["dft".$key]??""}}" >
	 		@endif	
	 		<label style="color: gray">{{$item}}</label>
		</td>	
	@endforeach
 </tr>	
 </table>

  <table class="table" width="100%">
   <tr>
	<td colspan="2">{{trans('forms.Manager')}}</td> 
   </tr>				
	@foreach ($items4 as $key=>$item)
	  </tr>				
		<td width="10" style="text-align: center;"> 
	 		<input type="checkbox" name="app{{$key}}" @if (isset($d["app".$key])) checked @endif >
		</td>
		<td>
			<label>{{$item}}</label>
		</td>
	  </tr>			
	@endforeach
 
 </table>


<table width="100%">
 	<tr>
 		<td>
 			{{trans('forms.Comments')}}<br>
 		</td>
 	</tr>
 </table>
 
 <textarea name="comments">{{$d["comments"]??""}}</textarea>
 

  <table class="table" width="100%">
   <tr>  		
	@foreach ($firma as $key=>$item)		
		<td> 
			@if (isset($p))
				{{$d["mng".$key]??""}} <br>
			@else
	 			<input class="form-control form-control-sm" type="@if (($item=='Date')or($item=='Fecha')) date @endif" name="mng{{$key}}" value="{{$d["mng".$key]??""}}" >
	 		@endif	
	 		<label style="color: gray">{{$item}}</label>
		</td>	
	@endforeach
 </tr>	
 </table>