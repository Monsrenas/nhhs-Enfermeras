<style type="text/css">
	td input {
		width: 56px;
	}

	td  { padding: 0px; 

	}

	label { color: #494949; }
	.cabeza {
				display: block; 
				color: black;	
				background: #DBDBDB;		
	}

	textarea { 
				 resize: both;
				 overflow: auto;
				 width: 80%;
		 }
</style>

<h3>Neighborhood Home Health Services, Inc. <br>{{trans('application.application')}}</h3>
<?php 
		$items=['last','first','middle','socialsecurity','address','city','state','zipcode','email', 'telephone', 'cellPhone'];
		 

	?>
<div class="container" style="color: blue;">

<form action="javascript: Guardar('pag1')" id="pag1" method="POST" >			
	<div class="form-group row">
		@foreach($items as $item)
			<input class="col-3 form-control form-control-sms" id="mpt{{$item}}" type="<?php echo ($item=='email')?'email':'text'; ?>" name="pag[{{$item}}]," value="{{$d1[$item]?? ""}}" placeholder="{{trans('application.'.$item)}}" style="margin-bottom: 20px;" @if ($item<>"middle") required @endif>  
		@endforeach	

		<div class="col-lg-4 col-sm-4 ">
			<label class="form-check-label" for="inlineRadio1">{{trans('application.areyouover18')}}</label>
			<div class="form-check form-check-inline">
				<label class="form-check-label" for="inlineRadio1"> {{trans('application.yes')}}  </label>	
				<input class="" type="radio" name="pag[areyouover18]" id="inlineRadio1" value="1" {{($d1['areyouover18']??"")==1? "checked":""}} required>

				<label class="form-check-label" for="inlineRadio2"> {{trans('application.no')}}</label>
				<input class=" " type="radio" name="pag[areyouover18]" id="inlineRadio2" value="0" {{($d1['areyouover18']??"")=="0"? "checked":""}} required>
			</div>
		</div>
	</div>	
	

	
	 
<?php $items=['english','HHA','CNA' ]; ?>
	<div class="form-group row"> 
		@foreach ($items as $item)
		<div class="col-lg-4 col-sm-6 ">
			<label class="form-check-label" for="inlineRadio1">{{trans('application.'.$item )}}</label>
			<div class="form-check form-check-inline">
				  <label class="form-check-label" for="inlineRadio1"> {{trans('application.yes')}}</label>	
				  <input class="" type="radio" name="pag[{{$item}}]" id="inlineRadio1" value="1" {{($d1[$item]??"")==1? "checked":""}} required>
				  
				   <label class="form-check-label" for="inlineRadio2"> {{trans('application.no')}}</label>
				  <input class=" " type="radio" name="pag[{{$item}}]" id="inlineRadio2" value="0" {{($d1[$item]??"")=="0"? "checked":""}} required>	 
			</div>
		</div>
		@endforeach		
	</div>

	<?php 
		$days=['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
		$scope=["from","to"];			 
		$items=['availablenights','availableweekends'];
	?>

	<div class="col-12">
		<table class="table Xtable-bordered table-responsive" style="font-size: 0.9em;">
			<thead>
				<th colspan="2">{{trans('application.dayshoursavailable')}}</th>
				@foreach ($days as $day)
					<th>{{trans('application.'.$day)}}</th>
				@endforeach	 
			</thead>
			<tbody>
				<tr>
					<td rowspan="2" width="600">
						@foreach ($items as $item)
						<label class="form-check-label">{{trans('application.'.$item)}}</label>
						<div class="form-check form-check-inline">
							<label class="form-check-label" style="font-size: 0.8em;"> {{trans('application.yes')}}</label>	
						  	<input type="radio" name="pag[{{$item}}]" id="inlineRadio1" value="1" {{($d1[$item]??"")==1? "checked":""}} required>
							<label  class="" style="font-size: 0.8em;"> {{trans('application.no')}}</label>
							<input  type="radio" name="pag[{{$item}}]" id="inlineRadio2" value="0" {{($d1[$item]??"")=="0"? "checked":""}} required>
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
							<td>
								<input type="text" name="pag[{{$day.$scope[$i]}}]" placeholder="00:00" value="{{$d1[$day.$scope[$i]]??""}}" style="width: 58px;">
							</td>
						@endforeach
						</tr>
						@if ($i=="0")
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
		$tipos=['', 'degree','diploma','cert'];
		$scope=['school'=>'vocational','college'=>'collegeuniversity'];

		$advrt=['adverseactions'=>'adverseactionsexplain','convictedcrime'=>'convictedcrimeexplain'];

	?>
<table class="table table-bordered table-responsive" style="font-size: 0.9em;">
<tbody>

@foreach ($scope as $key=>$val)		
	<tr>
		<th rowspan="2" style="vertical-align: middle;">
			{{trans('application.'.$val)}}		
		</th>
		<td colspan="4">
			<div class="form-row">
			 @foreach ($items as $item)	
			    <div class="col-md-4 mb-3">  
			      <input type="text" class="form-control is-valid" name="pag[{{$key.$item}}]" value="{{$d1[$key.$item]??""}}" @if ($key<>"school") required @endif>
			      <label for="pag[{{$key.$item}}]">{{trans('application.'.$item )}}</label>
			    </div>
			 @endforeach   
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="4">	
			 @for ($i = 1; $i < 4; $i++)
				<div class="form-check form-check-inline">
					<label class="form-check-label" > {{trans('application.'.$tipos[$i] )}}</label>	
					<input class="" type="radio" name="pag[{{$key}}Ratio]" value="{{$i}}" {{($d1[$key."Ratio"]??"")==$i? "checked":""}} @if ($key<>"school") required @endif>		  
				</div>
			 @endfor
 
		<div class="col-6" style="float: right;">
			<input type="text" class="form-control is-valid" value="{{$d1[$key."coursestudy"]??""}}"   name="pag[{{$key}}coursestudy]" @if ($key<>"school") required @endif>
			<label for="pag[{{$key}}coursestudy]">{{trans('application.coursestudy')}}</label>
		</div>	
		</td>	
	</tr>
@endforeach

	<tr>
		<th>{{trans('application.proflicense')}}</th>
		<td >
			
			<input type="text"class="form-control is-valid"  name="pag[proflicensestate]" value="{{$d1["proflicensestate"]??""}}" style="width: 200px;">
			<label>{{trans('application.state')}}</label>
			
		</td>
		<td>
			
			<input type="text" class="form-control is-valid" name="pag[proflicenselic]" value="{{$d1["proflicenselic"]??""}}">
			<label for="pag[proflicenselic]" >{{trans('application.lic#')}}</label>
			
		</td>
	 	<td>
	 		
			<input type="date" class="form-control is-valid" name="pag[proflicenseexpdate]" style="width: 200px;" value="{{$d1["proflicenseexpdate"]??""}}">
			<label>{{trans('application.expdate')}}</label>

	 	</td>
	</tr>
	@foreach ($advrt as $key=>$val)	
	<tr>
		<td colspan="4">
			<label >{{trans('application.'.$key)}}</label>
			<div class="form-check form-check-inline">
				<label style="font-size: 0.8em;"> {{trans('application.yes')}} </label>	
				<input type="radio" name="pag[{{$key}}]" id="inlineRadio1" value="1" style="font-size: 0.8em;" required {{($d1[$key]??"")==1? "checked":""}}>
					  
				<label style="font-size: 0.8em;"> {{trans('application.no')}}</label>
				<input type="radio" name="pag[{{$key}}]" id="inlineRadio2" value="0" required {{($d1[$key]??"")=="0"? "checked":""}}>
			</div>
			<label >{{trans('application.'.$val)}}</label>	
			<textarea name="pag[{{$val}}]" style="margin-left: 2em; width: 80%;"  >{{$d1[$val] ?? ""}}</textarea>		
		</td>
	</tr>
	@endforeach

	<tr>
		<td colspan="2">
			<label >{{trans('application.floridalicense')}}</label>
			<div class="form-check form-check-inline">
				<label class="" style="font-size: 0.8em;"> {{trans('application.yes')}} </label>	
				<input class="" type="radio" name="pag[floridalicense]" id="inlineRadio1" value="1" style="font-size: 0.8em;" {{($d1["floridalicense"]??"")==1? "checked":""}} required>
					  
				<label class="" style="font-size: 0.8em;"> {{trans('application.no')}}</label>
				<input class="" type="radio" name="pag[floridalicense]" id="inlineRadio2" value="0" {{($d1["floridalicense"]??"")=="0"? "checked":""}} required>
			</div>	
		</td>
		<td>
			
			<input type="text" class="form-control is-valid" name="pag[floridalicenselic]" value="{{$d1["floridalicenselic"]??""}}"  >
			<label for="pag[proflicenselic]" >{{trans('application.state')}}</label>
			
		</td>
	 	<td>	 		
			<input type="date" class="form-control is-valid" name="pag[floridalicenseexpdate]" style="width: 200px;" value="{{$d1["floridalicenseexpdate"]??""}}" >
			<label>{{trans('application.expdate')}}</label>
	 	</td>
	</tr> 	
	<tr>
		<td colspan="4">
			<label>{{trans('application.drivingviolations')}}</label>
			<input type="number" min="0" name="pag[drivingviolations]" style="width: 200px;"  value="{{$d1["drivingviolations"]??""}}">
	 	</td>		
	</tr>
</tbody>
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
	?>
	<div class="row">
	@for ($i = 0; $i < count($materia); $i++)
	<label class="form-label col-lg-3 col-sm-3" style="font-size: 1.2em; padding: 2px;">{{$materia[$i]}}: </label>
	<div class="col-lg-3 col-sm-3" style="text-align: center; padding: 2px; " >
	  	 <select  name="pag[MicrosoftOfficeSkills][{{$i}}]" >
            <option  value="0"></option>
            <option  value=1 {{($d1["MicrosoftOfficeSkills"][$i]??"")==1? "selected":""}}> {{trans('application.beginner')}}</option>
            <option  value=2 {{($d1["MicrosoftOfficeSkills"][$i]??"")==2? "selected":""}} > {{trans('application.intermediate')}}</option>
            <option  value=3 {{($d1["MicrosoftOfficeSkills"][$i]??"")==3? "selected":""}} > {{trans('application.expert')}}</option>
          </select>
	</div>
	@endfor
	<label class="form-label col-lg-3 col-sm-3" style="font-size: 1.2em; padding: 2px;">
		{{trans('application.typingproficiency')}}: 
	</label>
	<div class="col-lg-3 col-sm-3" style="text-align: center; " >
		<input class="control-sm col-sm-6" type="number" min="0" name="pag[typingproficiency]" value="{{$d1["typingproficiency"]??""}}">
	</div>	
	</div>


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
	<div class="row">
		@for ($i = 1; $i < 3; $i++)
		<div class="col-lg-6 col-sm-6">	
			@foreach ($items as $item)
				<div class="col-lg-12 col-sm-6 " style="text-align: left; padding: 2px; " >	
				  	<input class="form-control" type="text" name="pag[reference{{$i}}][{{$item}}]" value="{{$d1["reference".$i][$item]??""}}" required>
				  	<label>{{trans('application.'.$item)}}: </label>
				</div>
			@endforeach
		</div>	
		@endfor
	</div>

	 <p style="text-align: justify; border: 1px solid black; color:black; padding: 10px; resize: both; overflow: auto;">
	 	{{trans('application.applicationspace')}}. <br>
	 	<textarea name="pag[applicationspace]">
	 		{{$d1["applicationspace"]??""}}
	 	</textarea>
	 </p>

	<div class="cabeza">
		<h4>{{trans('application.MILITARYSERVICE')}}</h4>
	</div>	

	<table class="table table-responsive">
		<tr>
		<td colspan="2">
			<label >{{trans('application.MilitaryService')}}</label>
			<div class="form-check form-check-inline">
				<label class="" style="font-size: 0.8em;"> {{trans('application.yes')}} </label>	
				<input class="" type="radio" name="pag[MilitaryService]" id="inlineRadio1" value="1" style="font-size: 0.8em;" {{($d1["MilitaryService"]??"")==1? "checked":""}} required>
					  
				<label class="" style="font-size: 0.8em;"> {{trans('application.no')}}</label>
				<input class=" " type="radio" name="pag[MilitaryService]" id="inlineRadio2" value="0" {{($d1["MilitaryService"]??"")=="0"? "checked":""}} required>
			</div>	
		</td>
		<td>
			
			<input type="text" class="form-control is-valid" name="pag[militariBranch]" value="{{$d1["militariBranch"]??""}}" >
			<label for="pag[militariBranch]" >{{trans('application.Branch')}}</label>
			
		</td>
	 	<td>	 		
			<input type="date" class="form-control is-valid" name="pag[militariFrom]" style="width: 200px;" value="{{$d1["militariFrom"]??""}}">
			<label>{{trans('application.from')}}</label>
		
	 	</td>
	 	<td>	 		
			

			<input type="date" class="form-control is-valid" name="pag[militariTo]" style="width: 200px;" value="{{$d1["militariTo"]??""}}" >
			<label>{{trans('application.to')}}</label>
	 	</td>
	 	</tr>
	</table>	
	<div class="cabeza">
		<h4>{{trans('application.WORKEXPERIENCE')}}</h4>
		<p style="text-align: justify; padding: 10px;">
		{{trans('application.listworkexperience')}}
		<button id="addTrabajo" type="button" class="btn btn-success btn-sm fa fa-plus control-inline"></button>	
		</p>

	</div>
	<?php $ciclo=isset($d1["Employer"])?count($d1["Employer"]):1 ?>
	<div id="trabajo">
		@for ($i = 0; $i < $ciclo ; $i++)
			<div>	
				@include('application.trabajo')
			</div>	
		@endfor
	</div>
	<button class="fa fa-save btn btn-success"> {{trans('application.save')}}</button>	
</form>	

</div>{{-- Fin de CONTAINER --}}

<div id="trabajoFuente" style="display: none;">
	@include('application.trabajo')
</div>
 
  <script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">

$('body').on('click', '#addTrabajo', function()
      {
           
           no=$(".yesno").length+1;      
            $.get('/AddJob', "indice="+no, function(subpage){ 
              $("#trabajo").append(subpage);
            }).fail(function() {
                 console.log('Error en carga de Datos');
            });
      });

$('body').on('click', '.fa-trash', function()
      {
           $(this).parent().empty();
     });   


$('input#mptsocialsecurity')
  .keypress(function (event) {
    // El código del carácter 0 es 48
    // El código del carácter 9 es 57
    if (event.which < 48 || event.which > 57 || this.value.length === 4) {
      return false;
    }
  });        	
</script>


