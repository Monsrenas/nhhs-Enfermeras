<!DOCTYPE html>
<html>
<head>
 
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
 

    <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script> 
  
     
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
  
    <script type="text/javascript" src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.signature.js')}}"></script>
   
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
   
    <style>
        .kbw-signature { width: 100%; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
    </style>
  
</head>
<body class="">
<div class="container"  id="pad_firma" 
style=" /*bottom: 0; 
        margin-left: 0px;
       position: fixed;     
        z-index: 5000; 
        justify-content: center;*/
        ">

   <div class="row">
       <div class="col-md-6 offset-md-3 mt-5">

           <div class="card"> <button id="Dfirma">{{trans("forms.clsWin")}}</button>
               <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>  
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form method="GET" action="{{ route('signature') }}">
                        @csrf
                        <div class="col-md-12">
                            <label class="" for="">{{trans("forms.DrawSignature")}}:</label>
                            <br/>
                            <div id="sig" ></div>
                            <br/>
                            <button id="clear" class="btn btn-danger btn-sm">{{trans("forms.clsSig")}}</button>
                            <textarea id="signature64" name="signed" style="display: none"></textarea>
                        </div>
                        <br/>
                        <button class="btn btn-success">{{trans("forms.svsSig")}}</button>
                    </form>
               </div>
           </div>
       </div>
   </div>
</div>

<script type="text/javascript">

  
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });

   $('body').on( 'click','#Dfirma, #trazaFirma', function () {

      $('#pad_firma').toggle();
       
    });
        
   
    //$('#pad_firma').hide();  
    console.log('Pad hidden');  

</script>

</body>
</html>