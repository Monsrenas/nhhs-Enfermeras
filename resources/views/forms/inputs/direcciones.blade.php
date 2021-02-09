<br><br>
<p class="table-responsive">
	  	<table class="table" style="width: 100%;">
	  		<tr>
	  			<td width="50%" style="text-align: center;">{{trans('forms.ifto')[0]}}</td>
	  			<td style="text-align: center;">{{trans('forms.ifto')[1]}}</td>
	  		</tr>
	  		@for ($i = 0; $i < 3; $i++)
	  		<tr>
	  			@for ($j = 0; $j < 2; $j++)
	  			<td style="text-align: left;">
	  				@if (isset($p))
						{{$d["notice"][$i.$j] ?? ""}}
					@else
						<input class="form-control form-control-sm" type="text" name="notice[{{$i}}{{$j}}]" value="@if ($j==0) Director/ 9110 SW 72 ST/ Miami, FL 33173 @else {{$d["notice"][$i.$j] ?? ""}} @endif" @if (($i==0)and($j>0)) required @endif>
					@endif
	  			</td>
	  			@endfor
	  		</tr>
	  		@endfor
	  	</table>
	  </p>
	  <br>