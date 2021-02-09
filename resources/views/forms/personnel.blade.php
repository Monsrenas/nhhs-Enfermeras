<h3 style="text-align: center;">{{trans('forms.PersonnelMember')}}</h3>
<p style="text-align: justify;">
	{{trans('forms.As_a_member_of')}}
</p>

<table>
	<tr>
		<td></td>
		<td>
			{{trans('forms.EvalPoints')}}
		</td>
	</tr>
	 
	 @if (isset($p))
		<tr>
			<td> <br><br></td>
		</tr>
	@endif

	@foreach (trans('forms.EvalList') as $key=>$item)
	<tr>
		<td>	
			{{$key+1}}. {{$item}}
		</td>	
		<td>
			@if ($key!=10)
				<input class="form-control" type="text" name="EvalList{{$key}}" value="{{$d["EvalList".$key]??""}}">
			@endif
		</td>
	</tr>
	@endforeach
	
	<tr>
		<td colspan="2" style="text-align: center">
		<textarea name="satisfLevel">
			{{$d["satisfLevel"]??""}}
		</textarea>
		</td>
	</tr>	
</table>

<p style="text-align: justify; margin-top: 10px;">
	{{trans('forms.noteEnd')}}
</p>