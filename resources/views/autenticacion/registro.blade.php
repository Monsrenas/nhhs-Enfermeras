         <main role="main" class="container my-auto">
            <div class="row" style="width: 300px;">
                <div id="login" class=" col-12">
        <form action="javascript: RegistrarCliente()" id="RegPersona"  method="POST" >
                        <div id='MnsgError' style="color:red;"></div>

                    <input type="text" name="clase" value="Persona" hidden>
                    <input type="text" name="externo" value="externo" hidden>
                    <input type="text" id="rol" name="rol" value="1" hidden>


               <div class="form-group" style="margin-top: 30px; ">
                  <label for="correo">{{trans('application.email')}}:</label>
                  
                    <input type="email" class="form-control form-control-sm" id="MIcorreo" name="email" required>
                  
              </div>

                <div class="form-group">
                    <label for="palabraSecreta">{{trans('welcome.passw')}}</label>
                    <input id="palabraSecreta" name="palabraSecreta"
                        class="form-control form-control-sm" type="password" required>
                </div>
                <div class="form-group">
                    <label for="repiteSecreta">{{trans('welcome.reppassw')}}</label>
                    <input id="repiteSecreta" name="repiteSecreta"
                        class="form-control form-control-sm" type="password" required>
                </div> 

                <button id="seRegistra" type="submit" class="btn btn-success mb-2">
                    {{trans('welcome.bookin')}}
                </button>

        </form>
                </div>
            </div>
        </main>

<script type="text/javascript">
    $("body").on('change','input', function(){
 
  $('#MnsgError').empty();
});

function RegistrarCliente() {
     
    if ($('#repiteSecreta').val()!=$('#palabraSecreta').val()) { $('#MnsgError').empty().append('Passwords must match'); return; }
    
    var email = document.getElementById('MIcorreo').value;
    var pass = document.getElementById('palabraSecreta').value;
    firebase.auth().useDeviceLanguage();
     firebase.auth().createUserWithEmailAndPassword(email, pass)
    .then(function(){
      // VERIFICAMOS EL CORREO
      verificar();
      GuardarPersona();

      $("#modal-body").html("A message was sent to your email for confirmation");

      //$("[data-dismiss=modal]").trigger({ type: "click" });
      
    })
    .catch(function(error) {
        var errorCode = error.code;
        var errorMessage = error.message;
        //if (errorCode=='auth/email-already-in-use') { $('MnsgError').empty().append('Este correo electrónico ya está en uso');}
        $('#MnsgError').empty().append(errorMessage); 
    });

}

function GuardarPersona()
{
  var data=$('#RegPersona').serialize();
     var data="_token={{ csrf_token()}}&"+data;
     
      $.post('RegistrarUsuario', data, function(subpage){ 
      console.log(subpage); 
       cerrar();        
    });
}

  
  
</script>