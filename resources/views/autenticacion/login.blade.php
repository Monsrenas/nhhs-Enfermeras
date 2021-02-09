
<main role="main" class="container my-auto">
    <div class="row" style="width: 300px">
        <div id="login" class=" col-12">
            <form action="javascript: xAutenticarse()">
                <div id='MnsgError' style="color:red;"></div>
                <div class="form-group">
                    <label for="MIcorreo">{{trans('application.email')}}</label>
                    <input type="email" id="MIcorreo" name="correo"
                        class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="palabraSecreta">{{trans('welcome.passw')}}</label>
                    <input id="palabraSecreta" name="palabraSecreta"
                        class="form-control" type="password" required> 
                </div> 
                <button id="seCierra" type="submit" class="btn btn-primary mb-2">
                    {{trans('welcome.signin')}}
                </button>
                <br>
                <a href="javascript: ResetPassword()">{{trans('welcome.forgotpassw')}}</a>
                <br><br>
                <button id="seRegistra" type="button" class="btn btn-success mb-2" 
                    onclick="Modal('autenticacion.registro','anc','asd')" >
                    {{trans('welcome.bookin')}}
                </button>

            </form>
        </div>
    </div>
</main>


<script type="text/javascript">
    $("body").on('change','input', function(){
 
  //$('#MnsgError').empty();
});

function ResetPassword()
{

    firebase.auth().sendPasswordResetEmail($('#MIcorreo').val()).then(function() {
    // Email sent.
    }).catch(function(error) {
      // An error happened.
      $('#MnsgError').empty().append(error.message);
    });
}    
</script>