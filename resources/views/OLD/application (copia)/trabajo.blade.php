	<br>
	<button class="fa fa-trash text-right btn btn-danger btn-sm" style="float: left; color: red; background: white;"></button>
	<table class="table table-responsive" >
		<tr>
			<td width='400'>
				<input type='text' class='form-control is-valid' name='pag[Employer][]' value="{{$d1["Employer"][$i]??""}}">
				<label><strong>{{trans('application.Employer')}}</strong></label>
			</td>
			<td>
				<input type='text' class='form-control is-valid' name='pag[EmployerTelephone][]' value="{{$d1["EmployerTelephone"][$i]??""}}">
				<label>{{trans('application.telephone')}}</label>
			</td>
			<td>
				<label >{{trans('application.Maycontactemployer')}}</label>
				<div class='form-check yesno' >
					<label  style='font-size: 0.8em;'> {{trans('application.yes')}} </label>	
					<input  type="radio" class="yes" name='pag[Maycontactemployer][{{$i}}]' id="emploRadio1" value='1' {{($d1["Maycontactemployer"][$i]??"")==1? "checked":""}} >
						  
					<label style="font-size: 0.8em;"> {{trans('application.no')}}</label>
					<input type="radio" class="no" name='pag[Maycontactemployer][{{$i}}]' id="emploRadio2" value='0' {{($d1["Maycontactemployer"][$i]??"")=="0"? "checked":""}}>
				</div>	
			</td>
			<td>
				<input type='number' class='form-control is-valid' name='pag[Salary][]' value="{{$d1["Salary"][$i]??""}}">
				<label>{{trans('application.Salary')}}</label>
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				<input type='text' class='form-control is-valid' name='pag[EmployerAddress][]' value="{{$d1["EmployerAddress"][$i]??""}}">
				<label>{{trans('application.address')}}</label>
			</td>
			<td>
				<input type='text' class='form-control is-valid' name='pag[EmployerTitle][]' value="{{$d1["EmployerTitle"][$i]??""}}">
				<label>{{trans('application.JobTitle')}}</label>
			</td>
			<td>
				<input type='text' class='form-control is-valid' name='pag[EmployerSupervisor][]' value="{{$d1["EmployerSupervisor"][$i]??""}}">
				<label>{{trans('application.Supervisor')}}</label>
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				<input type='text' class='form-control is-valid' name='pag[Reasonleaving][]' value="{{$d1["Reasonleaving"][$i]??""}}">
				<label>{{trans('application.Reasonleaving')}}</label>
			</td>
			<td>
				<input type='date' class='form-control is-valid' name='pag[EmploymentDates][]' value="{{$d1["EmploymentDates"][$i]??""}}">
				<label>{{trans('application.EmploymentDates')}}</label>
			</td>
			<td>
					<input type='date' class='form-control is-valid' name='pag[EmployerTo][]' value="{{$d1["EmployerTo"][$i]??""}}">
				<label>{{trans('application.to')}}</label>
			</td>
		</tr>
	</table>