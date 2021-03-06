<style type="text/css">
	td input {
		width: 56px;
	}

	 span { color: gray; }

	label { color: #494949; }
	.cabeza {
				display: block; 
				color: black;	
				background: #DBDBDB;
				padding-left: 4px;		
		    }

	textarea { 
				 resize: both;
				 overflow: auto;
				 width: 80%;
		 	 }
	hr{
		page-break-after: always;
		border: none;
		margin: 0;
		padding: 0;
	  }
</style>
<table>
	<tr>
		<td><img style="max-width: 100px;" src="./assets/img/nhhsLogo.jpg"></td>
		<td style="text-align: center;" width="400">
			<h3>Neighborhood Home Health Services, Inc. <br>{{trans('application.application')}}</h3>
		</td>		
	</tr>
</table>
<br>

<?php 
	$items=['last','first','middle','socialsecurity','address','city','state','zipcode','email', 'telephone', 'cellPhone'];
?>
<div class="container">

<form action="javascript: Guardar('pag1')" id="pag1" method="POST" >			
	<div class="form-group row">
		@foreach($items as $item)
			<div style="width: 25%; float: left; font-size: .8em;">
				<span style="color: gray;">{{trans('application.'.$item)}}:</span>	 {{$d[$item]?? ""}}
		    </div>  
			@if (($item=="socialsecurity")or($item=="zipcode"))
				<br><br>
			@endif
		@endforeach	
		<br><br>
		<label class="form-check-label" for="inlineRadio1">{{trans('application.areyouover18')}}:</label>
		{{($d['areyouover18']??"")==1? trans('application.yes'):trans('application.no') }}
	</div>	
	<br><br>

	
	 
<?php $items=['english','HHA','CNA' ]; ?>
	 
		@foreach ($items as $item)
		<div style="width: 25%; float: left;">
			<label class="form-check-label" for="inlineRadio1">{{trans('application.'.$item )}}: </label>
			{{ ($d[$item]??"")=="1"? trans('application.yes'):trans('application.no') }}
		</div>
		@endforeach		
		<br><br>

	<?php 
		$days=['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
		$scope=["from","to"];			 
		$items=['availablenights','availableweekends'];
	?>

	<div class="col-12">
		<table class="table table-bordered" style="font-size: 0.9em;">
			<thead>
				<tr style="background: #DBDBDB;">
					<th colspan="2">{{trans('application.dayshoursavailable')}}</th>
				
					@foreach ($days as $day)
						<th>{{trans('application.'.$day)}}</th>
					@endforeach
				</tr>	 
			</thead>
			<tbody>
				<tr>
					<td width="120" rowspan="2" style="background:#EAE9E9; font-size:0.8em; padding:8px;">
						@foreach ($items as $item)
						<label class="form-check-label">{{trans('application.'.$item)}}</label>
						<div class="form-check form-check-inline">
							<label class="form-check-label" style="font-size: 0.8em;"> {{trans('application.yes')}}</label>	
						  	<input type="radio" name="pag[{{$item}}]" id="inlineRadio1" value="1" {{($d[$item]??"")==1? "checked":""}} required>
							<label  class="" style="font-size: 0.8em;"> {{trans('application.no')}}</label>
							<input  type="radio" name="pag[{{$item}}]" id="inlineRadio2" value="0" {{($d[$item]??"")==0? "checked":""}} required>
						</div>
						@endforeach			
					</td>

					@for ($i = 0; $i < 2; $i++)
						<th>
							<label class="form-check-label"> 
								{{trans('application.'.$scope[$i])}}
							</label>
						</th>
						@foreach ($days as $day)
							<td style="padding: 4px; text-align: right;">
								{{$d[$day.$scope[$i]]??""}}
							</td>
						@endforeach
						
						@if ($i==0)
								<tr>			
						@endif
					@endfor
					 
			</tbody>
		</table>
	</div>

<div class="cabeza" >
	<h4>{{trans('application.EDUCATION')}}</h4>
</div>
<?php 		 
		$items=['school','address', 'telephone'];
		$tipos=['','degree','diploma','cert'];
		$scope=['school'=>'vocational','college'=>'collegeuniversity'];

		$advrt=['adverseactions'=>'adverseactionsexplain','convictedcrime'=>'convictedcrimeexplain'];

	?>
<table class="table table-bordered table-responsive" style="font-size: 0.9em;">
<tbody>

@foreach ($scope as $key=>$val)		
	<tr>
		<th rowspan="3" style="vertical-align: middle;">
			{{trans('application.'.$val)}}		
		</th>
		
		 @foreach ($items as $item)	
		 <td>  
		     {{$d[$key.$item]??""}}
		 </td>
		 @endforeach
	</tr>

	<tr>
		 @foreach ($items as $item)	
		 <td style="color: gray;" >  
		      {{ trans('application.'.$item) }}
		 </td>
		 @endforeach
	</tr>

	<tr>
			<td style="font-size: .8em;" colspan="2">
			 @for ($i = 1; $i < 4; $i++)
				
					<label class="form-check-label" > {{trans('application.'.$tipos[$i] )}}</label>	
					<input class="" type="radio" name="pag[{{$key}}Ratio]" value="{{$i}}" {{($d[$key."Ratio"]??"")==$i? "checked":""}} @if ($key<>"school") required @endif>		  
				
			 @endfor
			</td> 
 		<td>		 
			{{$d[$key."coursestudy"]??""}} <br>
			<span style="color: gray;">{{trans('application.coursestudy')}}</span>
		</td>	
	</tr>
	<tr> <td colspan="4" style="background: gray;"></td></tr>
@endforeach
	<tr>
		<th>{{trans('application.proflicense')}}:</th>

		<td>	
			{{ $d["proflicensestate"]??""}} <br>
			<span style="color: gray;">{{trans('application.state')}}</span>
		</td>
		<td>
			{{$d["proflicenselic"]??""}} <br>
			<span style="color: gray;">{{trans('application.lic#')}}</span>
		</td>
	 	<td>
			{{$d["proflicenseexpdate"]??""}} <br>
			<span style="color: gray;">{{trans('application.expdate')}}</span>
	 	</td>
	</tr>

	@foreach ($advrt as $key=>$val)
	<tr> <td colspan="4" style="background: gray;"></td></tr>	
	<tr>
		<td colspan="4">
			<span>{{trans('application.'.$key)}}:</span>
			
			{{($d[$key]??"")==1? trans('application.yes'):""}}. 
			{{($d[$key]??"")==0? trans('application.no'):""}}. 	  
			<span>{{trans('application.'.$val)}}</span>	
			<br><br>{{$d[$val] ?? ""}}		
		</td>
	</tr>
	
	@endforeach
	<tr> <td colspan="4" style="background: gray;"></td></tr>
		<tr>
		<td colspan="2">
			<span>{{trans('application.floridalicense')}}</span>
			 
				<label class="" style="font-size: 0.8em;"> {{trans('application.yes')}} </label>	
				<input class="" type="radio" name="pag[floridalicense]" id="inlineRadio1" value="1" style="font-size: 0.8em;" {{($d["floridalicense"]??"")==1? "checked":""}} required>
					  
				<label class="" style="font-size: 0.8em;"> {{trans('application.no')}}</label>
				<input class="" type="radio" name="pag[floridalicense]" id="inlineRadio2" value="0" {{($d["floridalicense"]??"")==0? "checked":""}} required>
			 	
		</td>
		<td>
			{{$d["floridalicenselic"]??""}} <br>
			
			<span style="color: gray;">{{trans('application.state')}}</span>
			
		</td>
	 	<td>	 		
			{{$d["floridalicenseexpdate"]??""}} <br>
			<span style="color: gray;">{{trans('application.expdate')}}</span>
	 	</td>
	</tr> 	
	<tr> <td colspan="4" style="background: gray;"></td></tr>
</tbody>
</table>  

<table>
	<tr>
		<td>
			<span>{{trans('application.drivingviolations')}}:</span> {{$d["drivingviolations"]??""}}
	 	</td>		
	</tr>
</table>

	<div class="cabeza">
		<h4>{{trans('application.MicrosoftOfficeSkills')}}</h4>
	</div>

	<?php 
		$materia=[	
					"Word", trans('application.PBXexperience'), 
					"Excel", trans('application.faxingexperience'), 
					"PowerPoint",  
				 ];
				 
		$tipo=["", trans('application.beginner'),trans('application.intermediate'),trans('application.expert')];

	?>

<table>
	<tr>
		@for ($i = 0; $i < count($materia); $i++)
			<td>
				<span style="color: gray;">{{$materia[$i]}}</span> 
				{{$tipo[ $d["MicrosoftOfficeSkills"][$i] ] }}
			</td>
		@endfor
		<td>
			<span style="color: gray;">{{trans('application.typingproficiency')}}</span>	
			{{$d["typingproficiency"]??""}}
		</td>
	</tr>
</table>


<div class="cabeza">
	<h4>{{trans('application.referenceemployers')}}</h4>
</div>	
<?php 
	$items=[	'name',
					'position', 
					'company',
					'address',
					'telephone'
				 ];
?>

<table class="table">
<tbody>
	 <tr>
		@for ($i = 1; $i < 3; $i++)
			<td width="200">	
				@foreach ($items as $item)
					<span style="color: gray;">{{trans('application.'.$item)}}:</span> {{$d["reference".$i][$item]??""}} <br>
				@endforeach
			</td>
		@endfor
	 </tr>
 </tbody>
</table>


 <p style="text-align: justify; border: 1px solid black; color:black; padding: 10px; resize: both; overflow: auto;">
 	<span style="color: gray;">{{trans('application.applicationspace')}}.</span> <br><br>
 	
 	{{$d["applicationspace"]??""}}
 	
 </p>


<div class="cabeza">
	<h4>{{trans('application.MILITARYSERVICE')}}</h4>
</div>	

<table class="table table-responsive">
	<tr>
		<td colspan="2" width="150">
			<label >{{trans('application.MilitaryService')}}</label>
			<div class="form-check form-check-inline">
				<label class="" style="font-size: 0.8em;"> {{trans('application.yes')}} </label>	
				<input class="" type="radio" name="pag[MilitaryService]" id="inlineRadio1" value="1" style="font-size: 0.8em;" {{($d["MilitaryService"]??"")==1? "checked":""}} required>
					  
				<label class="" style="font-size: 0.8em;"> {{trans('application.no')}}</label>
				<input class=" " type="radio" name="pag[MilitaryService]" id="inlineRadio2" value="0" {{($d["MilitaryService"]??"")==0? "checked":""}} required>
			</div>	
		</td>
		<td width="100">	
			<span style="color: gray;">{{trans('application.Branch')}}:</span>
			  {{$d["militariBranch"]??""}}
		</td>
	 	<td>	 		
	 		<span style="color: gray;">{{trans('application.from')}}:</span>
			 {{$d["militariFrom"]??""}}
	 	</td>
	 	<td>	 		
	 		<span style="color: gray;">{{trans('application.to')}}:</span>
			 {{$d["militariTo"]??""}}
	 	</td>
	 </tr>
</table>	


<div class="cabeza">
	<h4>{{trans('application.WORKEXPERIENCE')}}</h4>
	<p style="text-align: justify; padding: 4px;">
		{{trans('application.listworkexperience')}}	
	</p>
</div>

<?php $ciclo=isset($d["Employer"])?count($d["Employer"])-1:1 ?>
	 
@for ($i = 0; $i < $ciclo ; $i++)
	
	<table class="table table-responsive" style="text-align: center;">
		@if ($i>0)
			<tr> <td colspan="4" style="background: gray;"></td></tr>
		@endif
		<tr>
			<td width='100'>
			{{$d["Employer"][$i]??""}}
			<br><span>{{trans('application.Employer')}}</span>
			</td>
			<td>
				 {{$d["EmployerTelephone"][$i]??""}}
				 <br><span>{{trans('application.telephone')}}</span>	
			</td>
			<td width="200">
				    {{($d["Maycontactemployer"][$i]??"")==1? trans('application.yes'):""}}
					{{($d["Maycontactemployer"][$i]??"")=="0"? trans('application.no'):""}}
				 
				<br><span>{{trans('application.Maycontactemployer')}}</span>	
			</td>
			<td>
				{{$d["Salary"][$i]??""}} <br>
				<span>{{trans('application.Salary')}}</span>
			</td>
		</tr>
		<tr> <td>-</td></tr>
		<tr>
			<td colspan='2'>
				{{$d["EmployerAddress"][$i]??""}} <br>
				<span>{{trans('application.address')}}</span>
			</td>
			<td>
				{{$d["EmployerTitle"][$i]??""}} <br>
				<span>{{trans('application.JobTitle')}}</span>
			</td>
			<td>
				{{$d["EmployerSupervisor"][$i]??""}} <br>
				<span>{{trans('application.Supervisor')}}</span>
			</td>
		</tr>
		<tr> <td></td><td>-</td><td></td></tr>
		<tr>
			<td colspan='2'>
				{{$d["Reasonleaving"][$i]??""}} <br>
				<span>{{trans('application.Reasonleaving')}}</span>
			</td>
			<td>
				{{$d["EmploymentDates"][$i]??""}} <br>
				<span>{{trans('application.EmploymentDates')}}</span>
			</td>
			<td>
				{{$d["EmployerTo"][$i]??""}} <br>
				<span>{{trans('application.to')}}</span>
			</td>
		</tr>
	</table>
	<br><br>		
@endfor



