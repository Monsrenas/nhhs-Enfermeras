<?php $items=trans('forms.POSITION');  
	  $items2=trans('forms.Job_Title');	  
	  $idm=(session('lang'))?(session('lang')):"en"; 
?>

<style type="text/css">
	h4 { text-decoration: underline; 
		 color: black; 
		 font-weight: bold;
		}
</style>

<h3 style="text-align: center;">{{trans('forms.POSITION')}}</h3>

 <table class="table">
  <tr>	
	@foreach ($items2 as $key=>$item)		
		<td width="50%" style="text-align: left;"> 	
			{{$item}} 
			@if ($key>1)
				<input @if(($item=='Date')or($item=='Fecha')) type="Date"  @endif  name="pos{{$key}}" value="{{$d["pos".$key]??""}}">
			@endif	  
		</td>
		@if (($key==1)or($key==3)) </tr> <tr> @endif	
	@endforeach
	</tr>	
 </table>	

 <p style="text-align: justify; margin-bottom: 20px;" >{{trans('forms.Job_Summary')}}</p>

<div style="text-align: left; display: block; width: 100%;">
 <h4>{{trans('forms.DUTIES')}}</h4>
</div>
 <?php $items=trans('forms.Eval');  ?>
  <table class="table">
  <tr>	
	@foreach ($items as $key=>$item)		
		<td width="33%" style="text-align: center;"> 	{{$item}}   </td>	
	@endforeach
	</tr>	
 </table>

 <?php $items=trans('forms.Demonstrates_Competency');
 		$items1=trans('forms.Performsduties');
 		$items3=trans('forms.Requirements');
   ?>
  <table class="table  table-bordered">
	  <tr>	
		@foreach ($items as $key=>$item)		
			<td style="text-align: center; font-weight: bold;"> 	{{$item}}   </td>	
		@endforeach
	  </tr>
		
	@foreach ($items1 as $key=>$item)
		@if ($key==10)
	  	  <tr>	
			@foreach ($items3 as $key=>$itm)		
				<td style="text-align: center; font-weight: bold;"> 	{{$itm}}   </td>	
			@endforeach
		  </tr>
		@endif

		<tr>		
			<td style="text-align: left; @if ($key==23) font-weight: bold; @endif "> 	{{$item}}   </td>
			@if ($key==23) 
				@for ($i=1; $i<4; $i++)  	
					<td>
						
					</td>
				@endfor 
			@else
				<td>2</td><td>1</td><td>0</td>
			@endif
		</tr>	
	@endforeach
			
 </table>

@include("forms.regulatory_".$idm)
	@if (isset($p))
			<div style="page-break-after:always;"></div>		
	@endif
@include("forms.demands")
	@if (isset($p))
			<div style="page-break-after:always;"></div>		
	@endif
@include("forms.continuation")
	@if (isset($p))
			<div style="page-break-after:always;"></div>		
	@endif
@include("forms.personnel")


