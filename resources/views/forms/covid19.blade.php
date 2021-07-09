<style type="text/css">
	OL { counter-reset: item; } 
	OL>LI { display: block } 
	OL>LI:before { content: counters(item, ".") " "; counter-increment: item }
	li { padding: 6px; text-align: justify;}
</style>

<h3 style="text-align: center;">{{trans('forms.name')[10]}}</h3>

<p style = "text-align: justify;">
{{trans('forms.covidIntro')}}
</p>

<ol>

@foreach(trans('forms.COVIDQUES') as $key=>$item)	
<li> {{$item}} 

<br>
<label class="form-check-label" for="inlineRadio1"> {{trans('application.yes')}}  </label>	
<input class="" type="radio" name="pag[{{$key}}]" id="inlineRadio1" value="1" {{($d[$key]??"")==1? "checked":""}} required>

<label class="form-check-label" for="inlineRadio2"> {{trans('application.no')}}</label>
<input class=" " type="radio" name="pag[{{$key}}]" id="inlineRadio2" value="0" {{($d[$key]??"")=="0"? "checked":""}} required>

@endforeach

</ol>
<p style = "text-align: justify;">
	<strong>
		{{trans('forms.IfYesToAnswer')}}
	</strong>
</p>

<ul>
	<li>
		{{trans('forms.covidNote')}}
		
	</li>
</ul>