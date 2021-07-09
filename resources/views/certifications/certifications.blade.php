<h3>Neighborhood Home Health Services, Inc. <br>{{trans('application.CERTIFICATIONS')}}</h3>

<?php
    $firma=$dts["frm"]['firma']??"";
?>

<style type="text/css">
  
   .firma {
          width: 300px;
          height: 100px;
          text-align: center;
          padding: 0px;
          margin-top: -94px;

          background: none;
          position: absolute;
         }

  @supports(object-fit: cover){
    .firma img{
              height: 66px;
              object-fit: cover;
              object-position: center center;
              padding: 2px;
          }
        }

</style>

<div class="container" style="text-align: justify; width: 80%">
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
 	
  @csrf  
	<div class="form-group row">
		<input type="checkbox" name="pag[signature]" id="firmado" required {{($d2['signature']??"")=="on"? "checked":""}}>
		@foreach($signat as $item)
		<div class="col-lg-5 col-sm-6">		
      @if (($firma!="")and($item=="Signature"))
       <div class="firma">
        <img src="data:image/png;base64,{{$firma}}" id="imgFirma" class="SignatireImg">
       </div> 
      @endif  
			<input class="form-control form-control-sms" type="<?php echo ($item=="Date")?"date":"text"?>" name="pag[sig{{$item}}]" id="sig{{$item}}" value="{{$d2["sig".$item]?? ""}}" required>
			 <label>{{trans('application.'.$item)}}</label>
		</div>	 
		@endforeach
	</div> 		

{{-- 
 <div class="card"> 
    <input id="fotoUpl" type="file" style="display:none" name="ImgsTL" accept="image/*">
    <span style="float: right;">{{trans("forms.UploadSignatureImage")}}
                <button type="button" id="fotofile" class="btn btn-success btn-sm fa fa-folder" ></button>
    </span>

    <div class="col-3" style="text-align: center;">
        <span style="float: right;">{{trans("forms.DrawSignature")}}
        <button type="button" id="trazaFirma" class="btn btn-info btn-sm fa fa-pencil" >
        </button>
    </div>

 
    <div class="card-header"> Galeria de Banners 
                
              </div><div class="card-body" id="BannerGaleria" style="max-height: 500px; overflow: scroll;"></div> 
              
 	</div> 
	
--}} 
   
</div>


