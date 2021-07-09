<style type="text/css">
  img { 
        margin: 40px; 
        display: inline-block: 
      }

  .drop { filter: drop-shadow(0 12px 15px rgba(0, 0, 0, 0.9)); opacity: 80%; }
  .box {   box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);   }
  .text {  text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);  }

  .fllwSnt {
              float: right;
              padding-left: 10px;  
              margin-bottom: 0px;
              padding-bottom: 0px;
              font-size: 1.2em;

           }
</style>
<?php 
if(!isset($_SESSION)){
                         session_start();
                       } 
$lng=session('lang');                        
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>NHHS</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('assets/css/material-kit.css?v=2.0.7') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" />
</head>
<body class="index-page sidebar-collapse" id="ElTodo">
  
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="/"><i class="material-icons">home</i>
         </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <div class="navbar-translate">
            @if($lng=="es")
              <a class="navbar-brand" href="{{ url('lang', ['en']) }}" style="font-size: .6em;">
                <i class="material-icons">language</i>English 
              </a>
            @else
              <a class="navbar-brand" href="{{ url('lang', ['es']) }}" style="font-size: .6em;">
                <i class="material-icons">language</i>Español 
              </a>
            @endif
      </div>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/requirements')}}" onclick="scrollToDownload()">
              <i class="material-icons">description</i> {{trans('welcome.menuop')[0]}} 
            </a>
          </li>
          {{--
          <li class="nav-item">
            <a class="nav-link" href="{{url('/forms/1/11/forms.menu')}}">
              <i class="material-icons">toc</i>{{trans('welcome.menuop')[1]}} 
            </a>
          </li>
          --}}
          <li class="nav-item">
            <a href="{{url('training_list')}}" class="nav-link">
              <i class="material-icons">apps</i> {{trans('welcome.menuop')[2]}} 
            </a>
          </li>
        
          <li class="nav-item">
            {{--<a class="nav-link" href="{{url('/exam')}}">--}}
            <a href="{{url('/contactus')}}" class="nav-link">  
              <i class="material-icons">send</i>{{trans('welcome.menuop')[3]}}
            </a>
          </li>

          {{--
          <li class="nav-item">
            @if($lng=="es")
              <a class="nav-link" href="{{ url('lang', ['en']) }}" style="font-size: .6em">
                <i class="material-icons">language</i>English 
              </a>
            @else
              <a class="nav-link" href="{{ url('lang', ['es']) }}" style="font-size: .6em">
                <i class="material-icons">language</i>Español 
              </a>
            @endif
          </li>
          --}}
          <br>
           
           @if (isset($_SESSION['cliente']))
            <li class="dropdown nav-item">
              <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" style="font-size: .6em">
                <i class="material-icons">how_to_reg</i>{{ $_SESSION['cliente'] }}
              </a>
              <div class="dropdown-menu dropdown-with-icons">
                
                <a href="#" class="dropdown-item" onclick="javascript: SubeFirma()">{{trans("forms.UploadSignatureImage")}}</a>
               {{-- <a href="#" class="dropdown-item" id="trazaFirma" data-target='#frmModal' data-toggle='modal'> {{trans("forms.DrawSignature")}}</a>--}}
                
             {{--   <a href="#" class="dropdown-item" id="firmar">{{trans("forms.DrawSignature")}}</a> --}}

                <a href="javascript:cerrar()" class="dropdown-item">
                  <strong>{{trans('welcome.Logout')}}</strong>
                </a>
              </div>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="#" data-target='#myModal' data-toggle='modal' onclick="Modal('autenticacion.login','anc','asd')">
                <i class="material-icons">how_to_reg</i>{{trans('welcome.signin')}}
              </a>
            </li>  
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('{{URL::asset('assets/img/bg2.jpg') }}');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <a href="/">
            <img style="max-width: 70%; margin: 0 auto; margin-top: -50px;" src="{{asset('assets/img/nhhsLogo.png')}}" class="drop">
            {{--<h1>Material Kit.</h1>
                                    <h3>A Badass Bootstrap 4 UI Kit based on Material Design.</h3>--}}
            </a>                        
          </div>
        </div>
                  
      </div>

      <div style="display: inline-block;text-align: center;  width: 100%; margin-top: -20px;">                     
                      <div style="display: block; margin-bottom: 0px; padding-bottom: 0px;">        
                              <a class="fllwSnt" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/NHHS" target="_blank" data-original-title="Follow us on Twitter" rel="nofollow">
                                <i class="fa fa-twitter" style="color: white; "></i>
                              </a>
                     
                              <a class="fllwSnt" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/NEIGHBORHOOD-HOME-HEALTH-SERVICES-302638734525" target="_blank" data-original-title="Like us on Facebook" rel="nofollow">
                                <i class="fa fa-facebook-square" style="color: white;"></i>
                              </a>
                      
                              <a class="fllwSnt" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/neighborhood_home_health_svcs/" target="_blank" data-original-title="Follow us on Instagram" rel="nofollow">
                                <i class="fa fa-instagram" style="color: white;"></i>
                              </a>
                              <a class="fllwSnt" rel="tooltip" title="" data-placement="bottom" href="https://www.linkedin.com/company/neighborhood-home-health-services-inc./about/" target="_blank" data-original-title="Follow us on Instagram" rel="nofollow">
                                <i class="fa fa-linkedin" style="color: white;"></i>
                              </a>
                       </div>       
                       <br>
                       <div style="display: block; width: 100%; float: right; margin-top: -10px; padding-top: 0px;">
                              <div style="width: 96px; float: right; font-size: .92em;">Follow NHHS</div>
                       </div>       
                  </div>  

    </div>
  </div>
  <div class="main main-raised">
    @include('mensajes')
    <div class="section section-basic">
      @yield('operaciones') 
    </div>
  
  </div>
  <!-- Classic Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" style=" display:table;" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body" id="modal-body">
 
        </div>
        <div class="modal-footer">
          {{--<button type="button" class="btn btn-link">Nice Button</button>--}}
          <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">{{trans('welcome.close')}}</button>
        </div>
      </div>
    </div>
  </div>

  
 
  



 <form id="ImagendeFirma"> 
   @csrf
  <div class="row">
    <div class="col-3 center"> 
      <input id="firmaUpl" type="file" style="display:none" name="ImgsTL" accept="image/*" onchange="javascript: subirFirma()">
    </div>
    
    
  </div> 

 </form>

 
  <footer class="row " data-background-color="black">
      <div class="col-lg-2">
        
      </div>
      <div class="col-lg-8" style="font-weight: bold; font-family: 'Times New Roman', Times, serif;">
        <p>
          NEIGHBORHOOD HOME HEALTH SERVICES, INC.  <br> 
          9110 S.W. 72 ST  <br>
          MIAMI, FL 33173  <br>
          TEL: (786) 693-9600 FAX: (305) 305-910-0191  FirmaTabla
        </p>
        <p style="color: gray;">
          COPYRIGHT  &copy; 2020 NEIGHBORHOOD HOME HEALTH SERVICES, INC. - ALL RIGHTS RESERVED.  
        </p>
      </div>
      
       <div  class="col-12 col-lg-2">
        <a href="https://chapinc.org/">
        <img src="{{asset('assets/img/chap.png')}}" style="float: right;">
        </a>
      </div>
    
  </footer>


  <!--   Core JS Files   -->
  <script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{asset('assets/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{asset('assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('assets/js/material-kit.js?v=2.0.7')}}" type="text/javascript"></script>
  @include("modal")
  @include("autenticacion.Funciones_login")
  @include("La_firma")

  <script>
     //$('#pad_firma').hide(); 
    function SubeFirma(){
      
        $('#firmaUpl').click();
    };

      // Cuando el autentico cambia hace cambiar al falso
    $('input[type=file]').on('change', function(e){
      console.log("Subido");
      $(this).next().find('input').val($(this).val());
    });

    function scrollToDownload() {
      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    };

    function subirFirma(){ 
    nombre=$("#firmaUpl").val();

    var miForm=document.getElementById('ImagendeFirma');   

            var dataFile = new FormData(miForm);
           
            $.ajax({ 
                             url: "/guardaFirma",
                            type: "post", 
                        dataType: "html",
                            data: dataFile,
                           cache: false,
                     contentType: false, 
                     processData: false 
                                                           
                  }).done(function(subpage){  
                  //location.href="/forms/5/10/forms.menu";
                                            });
    };  

   $('body').on('click','#firmar', function(){
      console.log('Firmar');
      $('#FirmaTabla').show();
   }); 
    
  </script>
</body>

</html>