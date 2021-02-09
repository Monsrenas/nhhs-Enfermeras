<td>
<?php $noises=trans('forms.typical_noise');   
?>
<table class="table">
  <tr>	
	@foreach ($noises as $kny=>$nss)
		<td width="1%" style="padding: 0px; padding-right: 15px;  "><input type="checkbox"></td>		
		<td style="text-align: left; font-size: .8em; padding: 0px;"> 	{{$nss}}   </td>
		@if (in_array($kny, ["1","3"])) </tr> <tr> @endif	
	@endforeach
	</tr>	
 </table>

<?php $noises=trans('forms.Hearing');   ?>

{{trans('forms.typical_Hearing')}}
<br><br>
 <table class="table">
  
	@foreach ($noises as $kny=>$nss)
		<tr>	
			<td width="1%" style="padding: 0px; padding-right: 15px;  "><input type="checkbox"></td>		
			<td style="text-align: left; font-size: .8em; padding: 0px;"> 	{{$nss}}   </td>
		</tr>	 
	@endforeach
	
 </table>	
</td>