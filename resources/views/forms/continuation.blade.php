<h3 style="text-align: center;">{{trans('forms.CONTINUATION')}}</h3>

<table class="table" width="100%">
	<tr>
		<td>
			{{trans('forms.EvaluationScore')}}
			@if (isset($p))
				{{$d["cont_staffmember"]??"___________"}}
			@else
				<input type="text" name="cont_staffmember" value="{{$d["cont_staffmember"]??""}}">
			@endif
		</td>
		<td>
			{{trans('forms.EvaluationScore')}}
			@if (isset($p))
				{{$d["cont_jobTitle"]??"___________"}}
			@else
				<input type="text" name="cont_jobTitle" value="{{$d["cont_jobTitle"]??""}}">
			@endif
		</td>
	</tr>
	<tr>
		<td>
			{{trans('forms.EvaluationScore')}}
		</td>		
		<td></td>
	</tr>
	<tr>
		<td>
			# {{trans('forms.pointsachieved')}} <br>
			<br>
			@if (isset($p))
				{{$d["pntarchi"]??"___________"}}
			@else
				<input type="text" name="pntarchi" value="{{$d["pntarchi"]??""}}">
			@endif
			X 100=

			@if (isset($p))
				{{$d["percentarchi"]??"___________"}}%
			@else
				<input type="text" name="percentarchi" value="{{$d["percentarchi"]??""}}">%
			@endif
			<br>{{trans('forms.questionsx2')}}
		</td>
		<td>
			@foreach (trans('forms.points') as $pnts)
				{{$pnts}}<br>
			@endforeach 
		</td>
	</tr>
</table>

@foreach (trans('forms.Coments') as $cmkey=>$pnts)
<p style="text-align: left;">	
	{{$pnts}}:<br>
	<textarea name="Coments{{$cmkey}}">{{$d["Coments".$cmkey]??""}}</textarea>
</p>	
@endforeach 

{{trans('forms.ActionsRecommended')}}
<table class="table" width="100%">
	<tr>
	@foreach (trans('forms.ActionList') as $cmkey=>$pnts)
		<td>
			<input type="checkbox" name="chck{{$cmkey}}">
			{{$pnts}}
			@if (($cmkey==1)or($cmkey==2))
				@if (isset($p))
					{{$d["info".$cmkey]??"___________"}}
				@else
					<input type="text" name="info{{$cmkey}}" value="{{$d["info".$cmkey]??""}}">
				@endif


			@endif
		</td>	

		@if ($cmkey==1)
			</tr><tr>
		@endif	
	
	@endforeach
	</tr>

	@if (isset($p))
		<tr>
			<td> <br><br></td>
		</tr>
	@endif
 	<tr>	
	@foreach (trans('forms.Staff_Signature') as $cmkey=>$pnts)
		<td>
			@if (isset($p))
				{{$d["Stfsng".$cmkey]??"_________________________________"}} <br>
			@else
				<input class="form-control" type="text" name="Stfsng{{$cmkey}}" value="{{$d["Stfsng".$cmkey]??""}}">
			@endif	
			<label style="color: gray">{{$pnts}}</label>
		</td>	

		@if (($cmkey==1)or($cmkey==3))
			</tr><tr>
		@endif	
	
	@endforeach
	</tr>
</table>


