@if (isset($p))
	{{$d["date"]??""}}
@else
	<input type="date" name="date" value="{{$d["date"] ??""}}" required>
@endif	