<?php 
	$actions=trans('forms.ACTIONSlst');
	$acthea=trans('forms.ActHea'); 
	$ActPos=trans('forms.ActPos');  	
?>

<table class="table-responsive table-bordered">
<tr>	 
	<td></td>
	<td colspan="5" style="text-align: center; padding: 0px; padding-left: 1px; font-size: .7em; width: 12%">{{trans('forms.NumberHours')}}</td>	
</tr>	
<tr>	 
	<td></td>
	@foreach ($acthea as $mve=>$mpc)
		<td style="text-align: center; padding: 0px; padding-left: 1px; font-size: .7em; width: 12%">{{$mpc}}</td>	
	@endforeach
</tr>					 
@foreach ($actions as $mey=>$actn)		
	<tr>	
		<td style="text-align: right; padding: 0px; padding-left: 14px; font-size: .7em; font-weight: bold;"> 	{{$actn}}:   </td>
		<td></td><td></td><td></td><td></td><td></td>	
	</tr>				
	@foreach ($ActPos as $mve=>$mpc)
		<tr>
			<td style="text-align: right; padding: 0px; padding-left: 14px; font-size: .7em"> 	{{$mpc}}:   </td>
								 	@for ($m=1; $m<5; $m++)
					  				 <td style="text-align: center; padding: 0px; padding-left: 14px; font-size: .7em">
					  				 	<input type="checkbox" name="{{$mve.$m}}">
					  				 </td>
					  				@endfor
		</tr>	
	@endforeach					
		
@endforeach

</table>
