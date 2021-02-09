<?php $items=trans('forms.JOBTITLE');  
	  
?>

<h3 style="text-align: center;">{{trans('forms.PHYSICAL_DEMANDS')}}</h3>

 <table class="table table-responsive" style="width: 100%;">
  <tr>	
	@foreach ($items as $key=>$item)		
		<td width="50%" style="text-align: left;"> 	
			{{$item}}:
			<input @if(($item=='DATE')or($item=='FECHA')) type="Date"  @endif  name="dmds{{$key}}" value="{{$d["dmds".$key]??""}}">
		</td>
		@if (in_array($key, ["1","3","5"])) </tr> <tr> @endif	
	@endforeach
	</tr>	
 </table>	

<p style="text-align: justify;">
	{{trans('forms.CHECK_APPROPRIATE')}}	
</p>

<?php 
	$items=trans('forms.perfoTitle');
	$items1=trans('forms.perfoHead'); 
	$tabhead=trans('forms.tabhead');  	
?>

<table class="table-responsive">
<tr>	 
@foreach ($items as $key=>$item)		
	<td width="50%" style="vertical-align: top;">
		<strong>{{$item}}</strong><br>	
		<spam style="text-align: justify;">{{$items1[$key]}}</spam>

					<?php 
						if ($key<3) $opcs=trans('forms.perfoTab')[$key];  
					?>
		 		
					<table class="table table-bordered">
							
			  			@if ($key<3)	
			  				<tr style="padding: 0px;">
								<td width="50%" style="vertical-align: top;"></td>
				  				@foreach ($tabhead as $cln)
				  					<td style="text-align: right; padding: 0px; padding-left: 14px; font-size: .7em">{{$cln}}</td>
				  				@endforeach
			  				</tr>	

							@foreach ($opcs as $yve=>$opc)
					  			<tr style="padding: 0px;">	
					  				<td style="text-align: right; padding: 0px; padding-left: 14px; font-size: .7em"> 	{{$opc}}:   </td>
					  				@for ($y=1; $y<5; $y++)
					  				 <td style="text-align: center; padding: 0px; padding-left: 14px; font-size: .7em">
					  				 	<input type="checkbox" name="{{$yve.$y}}">
					  				 </td>
					  				@endfor
								</tr>	
							@endforeach
						@else
							@if ($key==3)	@include("forms.eval.noise") @endif
							@if ($key==4)	@include("forms.eval.vision") @endif
							@if ($key==5)	@include("forms.eval.motion") @endif	
						@endif
			 		</table>
	</td>
	<td width="10"></td>
	
 	@if (in_array($key, ["1","3","5"])) </tr> <tr> @endif	
@endforeach
</tr>
</table>

