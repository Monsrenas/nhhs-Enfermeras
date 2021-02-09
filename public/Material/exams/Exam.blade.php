@extends('welcome')
@section('operaciones')
@include("exam.exam1")
<?php 
  
?>
<div class="row">
	<div class=" text-center col-12">
    <h2 class="shodow p-9 m-0" style="text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);">{{trans('exam.anualexam')}}</h2>
  </div>
    <div class="container" >
      


    </div>      <!-- End Container -->
 	 </div>
</div>
 
<script type="text/javascript">
	$('body').on('click', 'a[data-toggle="modal"]', function()
	{
	    $press=$(this).data("file");
	    $('#modal-body').empty().append("<div><iframe src='http://docs.google.com/gview?url="+$press+"&embedded=true' style='width:600px; height:500px;' frameborder='0'></iframe></div>");
	});
</script>

@endsection