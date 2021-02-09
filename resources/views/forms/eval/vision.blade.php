<td>
<?php $vision=trans('forms.visionOpc');   ?>

 <table class="table">
  
	@foreach ($vision as $kny=>$nss)
		<tr>	
			<td width="1%" style="padding: 0px; padding-right: 10px;  ">
				<input type="checkbox">
			</td>		
			<td style="text-align: left; font-size: .8em; padding: 0px;"> 	{{$nss}}   </td>
		</tr>	 
	@endforeach
 </table>	

<p style="text-align: left;">
	{{trans('forms.Specificdemands')}}

	<textarea name="Specificdemands" >
		
	</textarea>
</p>

{{---
	@for ($i=0; $i<4; $i++)	
		<hr color="gray" size=1 style="margin-top: 30px;">
	@endfor
--}}
<p>{{trans('forms.note')}}</p>
</td>