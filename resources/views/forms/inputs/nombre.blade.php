@if (isset($p))
	{{$d["name"]??""}}
@else
	<input  type="text" name="name" style="width: 20em; margin-top: 2px;" value="{{$d["name"]??""}}" required>
@endif	