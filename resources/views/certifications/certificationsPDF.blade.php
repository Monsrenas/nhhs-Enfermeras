<style type="text/css">
  
   .firma {
          width: 200px;

          height: 60px;
          max-height: 65px;
          max-width: 200px;
          text-align: center;
          padding: 0px;
          margin-top: -60px;

          overflow: hidden;
          background: none;
          position: absolute;
         }

  @supports(object-fit: cover){
    .firma img{
              height: 50px;
              object-fit: cover;
              object-position: center center;
              padding: 2px;
          }
        }

</style>

<?php
    $firma=$frm['firma']??"";
?>

<div class="cabeza">
		<h3>{{trans('application.CERTIFICATIONS')}}</h3>
</div>
<div class="container" style="text-align: justify; width: 100%">
	<ul class="list-group">
	  <li class="list-group-item">{{trans('application.IcertifyInformation')}}</li>
	  <li class="list-group-item">{{trans('application.Iunderstand')}}</li>
	  <li class="list-group-item">{{trans('application.Iagreesubmitdrug')}}</li>
	  <li class="list-group-item">{{trans('application.Iauthorize')}}</li>
	  <li class="list-group-item">{{trans('application.IunderstandneedprovideElectronicVerification')}}</li>
	</ul>

	<?php 
		$signat=['Signature','Date'];
	?>
	<br><br><br>
	<table style="margin-left: 40px">	
	<tr>	 
		@foreach($signat as $item)
		<td width="200">
			@if (($firma!="")and($item=="Signature"))
		       <div class="firma">
		        <img src="data:image/png;base64,{{$firma}}" id="imgFirma" width="150" height="60">
		       </div> 
      		@endif
  
			{{$d2["sig".$item]?? ""}} <br>
			 <label>{{trans('application.'.$item)}}</label>
		 
		</td>	 
		@endforeach
	</tr>	
	</table>		
</div>
 