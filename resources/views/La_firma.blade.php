{{--<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>--}}
<script src="{{asset('assets/js/signature_pad.min.js')}}"></script>
<div id="FirmaTabla" style="top: 10; 
        margin-right: 10%;
        margin-left: 10%;
       position: fixed;     
        z-index: 5000; 
        text-align: center;
        justify-content: center; display: none; background: gray;">
  <button id="Dfirma" class="btn btn-sm btn-block" style="background: white; color: black;">{{trans("forms.clsWin")}}</button>      
  <label class="" style="color: white;">{{trans("forms.DrawSignature")}}:</label>
            <br/>
	 <form method="GET" action="javascript:GUARDAFirma()" id="TblDeFirma">
        <div class="col-md-12">
            <div id="sig" >
            	<canvas  id="signature-pad" style="border: 1px solid #000; background: white;" >
		
				</canvas>
				<textarea id="infoSgn">
					
				</textarea>
            </div>
            <br/>
            <button id="clear" class="btn btn-danger btn-sm">{{trans("forms.clsSig")}}</button>
        </div>
        <br/>
        <button class="btn btn-success">{{trans("forms.svsSig")}}</button>
    </form>

</div>
<script type="text/javascript">
	var canvas = document.querySelector("canvas");

	var canvas = document.getElementById('signature-pad');
	var signaturePad = new SignaturePad(canvas);

    $('#clear').click(function(e) {
        e.preventDefault();
        signaturePad.clear();
    });

$('body').on('blur','#signature-pad', function()
{
	alert('prueba');
	$('infoSgn').append('prueba');
});

function GUARDAFirma()
{

  $d=signaturePad.toDataURL();
  console.log($d);
  var data="signed="+$d;

   $.get('/signature', data, function(subpage){  
         
        mensaje('{{trans('forms.DocSav')}}');
    });
}
</script>