<style type="text/css">
  
   .firma {
          width: 200px;

          height: 60px;
          max-height: 65px;
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
        }

</style>

<table>
	<tr>
		<td width="50"><img style="max-width: 100px;" src="./assets/img/nhhsLogo.jpg"></td>
		<td style="text-align: center;" width="400">
			<h3>
				Neighborhood Home Health Services, Inc. <br>
			   {{trans('application.CRIMINALINFORMATIONRELEASE')}}
			</h3>
		</td>		
	</tr>
</table>

 

<div class="container" style="text-align: justify; width: 100%">
	<?php 
		  
    $firma=$frm['firma']??"";

 
		$prevs=['PreviousName','address','previousaddress'];
		$items=['last','first','middle','maiden'];
		$bdate=['socialsecurity','DOB'];
		$bitems=['city','county', 'state','country'];
		$signat=['Signature','Date'];
	?>
 
	<p>

		{{trans('application.authorize1')}} 
		<strong>{{($d['level']??"")=="1"? "[*]":"[   ]"}}</strong>
		{{trans('application.authorize2')}} 
		<strong>{{($d['level']??"")=="2"? "[*]":"[   ]"}}</strong>
		{{trans('application.authorize3')}}
		<br><br>
		{{trans('application.Pleaseprintlegibly')}}
	</p>
	<table>
	<tr>
		@foreach($items as $item)
			<td width="200">
				{{$d[$item]??""}}<br>
				<span>{{trans('application.'.$item)}}</span>
			</td>
		@endforeach	
	</tr>
	</table>

	<div class="form-group row">
		@foreach($prevs as $item)
			<p class="col-lg-12 col-sm-6" style="text-align: justify;">
			<label>{{trans('application.'.$item)}}</label>
			<br>
			{{$d[$item]??""}}
			<br><br>
			</p>
		@endforeach	
	</div>	

	<table>
		<tr>
			@foreach($bdate as $item)
			<td width="200">		
				<label>{{trans('application.'.$item)}}</label>: {{$d["sig".$item]??""}}
				 
			</td>	 
			@endforeach
			<td>		
				 <label>{{trans('application.sex')}}:</label>
				 {{($d["sex"]??"")=="1"? trans('application.female'):""}}
				 {{($d["sex"]??"")=="2"? trans('application.male'):""}}	
	        </td>      
		</tr>
		
	
<br>
		<tr>
			@foreach($bitems as $item)
			<td width="200">		
				<label>{{trans('application.'.$item)}}</label>: {{$d[$item]??""}}
				 
			</td>	 
			@endforeach
		</tr> 		
	</table>
	<p>
		{{trans('application.IunderstandBackgroundScreening')}}
	</p>

	<table style="margin-left: 40px; margin-top: 80px;">	
	<tr>	 
		@foreach($signat as $item)
		<td width="200">
			@if (($firma!="")and($item=="Signature"))
		       <div class="firma">
		        <img src="data:image/png;base64,{{$firma}}" id="imgFirma" width="150" height="60">
		       </div> 
      		@endif	
			{{$d["sig".$item]?? ""}} <br>
			 <label>{{trans('application.'.$item)}}</label>
		 
		</td>	 
		@endforeach
	</tr>	
	</table>	
 
 

</div>