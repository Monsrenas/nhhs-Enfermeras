<h3>Neighborhood Home Health Services, Inc. <br>{{trans('application.CRIMINALINFORMATIONRELEASEtitle')}}</h3>

<div class="container" style="text-align: justify; width: 80%">
	<?php 
	
    	$firma=$dts["frm"]['firma']??"";

		$prevs=['PreviousName','address','previousaddress'];
		$items=['last','first','middle','maiden'];
		$bdate=['socialsecurity','DOB'];
		$bitems=['city','county', 'state','country'];
		$signat=['Signature','Date'];
	?>
<form action="javascript: Guardar('pag4')" id="pag4" method="POST" >
	<p>
		{{trans('application.authorize1')}}
		<input type="radio" name="pag[level]" id="level1" style="margin-right: .8em; margin-left: .8em;" value="1" {{($d4['level']??"")=="1"? "checked":""}} >
		{{trans('application.authorize2')}}
		<input type="radio" name="pag[level]" id="level2" style="margin-right: .8em; margin-left: .8em;" value="2" {{($d4['level']??"")=="2"? "checked":""}}>
		{{trans('application.authorize3')}}
		<br><br>
		{{trans('application.Pleaseprintlegibly')}}
	</p>

	<div class="form-group row">
		@foreach($items as $item)
			<input class="col-lg-3 col-sm-6 form-control form-control-sms" type="text" name="pag[{{$item}}]" value="{{$d4[$item]??""}}" 
			placeholder="{{trans('application.'.$item)}}" style="margin-bottom: 20px;">
		@endforeach	
	</div>

	<div class="form-group row">
		@foreach($prevs as $item)
			<p class="col-lg-12 col-sm-6" style="text-align: justify;">
			<label>{{trans('application.'.$item)}}</label>
			<br>
			<textarea  name="pag[{{$item}}]">{{$d4[$item]??""}}</textarea>
			<br><br>
			</p>
		@endforeach	
	</div>	

	<div class="form-group row">
		@foreach($bdate as $item)
		<div class="col-lg-4 col-sm-6">		
			<input class="form-control form-control-sms"  id="mpy{{$item}}" type="<?php echo ($item=="DOB")?"date":"text"?>" name="pag[sig{{$item}}]" value="{{$d4["sig".$item]??""}}">
			 <label>{{trans('application.'.$item)}}</label>
		</div>	 
		@endforeach

		<div class="col-lg-4 col-sm-6">		
			 <label>{{trans('application.sex')}}:</label>
			  <select  name="pag[sex]" >
                    <option  value=0></option>
                    <option  value=1 {{($d4["sex"]??"")=="1"? "selected":""}} > {{trans('application.female')}}</option>
                    <option  value=2 {{($d4["sex"]??"")=="2"? "selected":""}}> {{trans('application.male')}}</option>
              </select>
		</div>
		
	</div>

	<div class="form-group row">
		@foreach($bitems as $item)
		<div class="col-lg-3 col-sm-6">		
			<input class="form-control form-control-sms" type="text" name="pag[{{$item}}]" value="{{$d4[$item]??""}}">
			 <label>{{trans('application.'.$item)}}</label>
		</div>	 
		@endforeach
	</div> 		

	<p>
		{{trans('application.IunderstandBackgroundScreening')}}
	</p>
	<br>
	<div class="form-group row">
		<input type="checkbox" name="pag[signature]" required {{($d4['signature']??"")=="on"? "checked":""}}>
		@foreach($signat as $item)
		<div class="col-lg-5 col-sm-6">		
			@if (($firma!="")and($item=="Signature"))
		       <div class="firma">
		        <img src="data:image/png;base64,{{$firma}}" id="imgFirma" class="SignatireImg">
		       </div> 
		    @endif 
			<input class="form-control form-control-sms" type="<?php echo ($item=="Date")?"date":"text"?>" name="pag[sig{{$item}}]" value="{{$d4["sig".$item]??""}}" required>
			 <label>{{trans('application.'.$item)}}</label>
		</div>	 
		@endforeach
	</div> 	
<button class="fa fa-save btn btn-success"> {{trans('application.save')}}</button>	
</form>	

</div>

<script type="text/javascript">
	$('input#mpysocialsecurity')
  .keypress(function (event) {
    if (event.which < 48 || event.which > 57 || this.value.length === 4) {
      return false;
    }
  });
</script>