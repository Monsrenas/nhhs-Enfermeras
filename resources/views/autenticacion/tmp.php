
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyCUPVDwc-gO4VuD54_247WUaPDYWPaxzL8",
    authDomain: "f1-motriz-3ad57.firebaseapp.com",
    databaseURL: "https://f1-motriz-3ad57.firebaseio.com",
    projectId: "f1-motriz-3ad57",
    storageBucket: "f1-motriz-3ad57.appspot.com",
    messagingSenderId: "597019992229",
    appId: "1:597019992229:web:414961a2949bf283ac6d4c",
    measurementId: "G-WSRZZ50VVD"
  };
  // Initialize Firebase
  var variable=firebase.initializeApp(firebaseConfig);
  firebase.analytics();
  <?php session_start(); ?>
  // Your web app's Firebase configuration
  

autenticado();

function xAutenticarse()
    {   

        acceso();
        if (error=''){
                        
                     }

    } 

function autenticado()
{
    firebase.auth().onAuthStateChanged(function(user) {  
                                                        if (user){
                                                                  $('.fa-user-circle').css("display", "none");
                                                                  $('#operaUser').css("display", "block");
                                                                  $('#dataUser').text(user.email);
                                                                  }
                                                      });
}

// ACCEDEMOS
function acceso(){
    var email = document.getElementById('MIcorreo').value;
    var pass = document.getElementById('palabraSecreta').value;

    firebase.auth().signInWithEmailAndPassword(email, pass).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
        
      if (errorCode) { $('#MnsgError').append('Nombre de usuario o contraseña no validos') } 
      // ...
    }).then(function(user){ 
                              if (user.user.emailVerified) {
                                        $('.fa-user-circle').css("display", "none");
                                        $('#operaUser').css("display", "block");
                                         abrirSeccionCliente(email);
                                        $("[data-dismiss=modal]").trigger({ type: "click" });
                                        location.href="/";
                                      }
                                 else { 
                                        $('#MnsgError').append('Correo no Verificado. Complete el proceso');
                                        cerrar(); 
                                      }
                          });
  }

  function crear(email, pass){
    firebase.auth().createUserWithEmailAndPassword(email, pass)
    .then(function(){
      // VERIFICAMOS EL CORREO
      verificar();
      
    })
    .catch(function(error) {
        var errorCode = error.code;
        var errorMessage = error.message;
        if (errorCode=='auth/email-already-in-use') { alert('Este correo electrónico ya está en uso'); return;} 
    });

  }

// VERIFICAMOS EL CORREO
  function verificar(){
    var user = firebase.auth().currentUser;

    user.sendEmailVerification().then(function() {
      // Email sent.
    }).catch(function(error) {
      // An error happened.
    });
  }

// ACCOUT CON FACEBOOK
function facebook(){
  var provider = new firebase.auth.FacebookAuthProvider();

    firebase.auth().signInWithPopup(provider).then(function(result) {
      
      var token = result.credential.accessToken;
      var user = result.user;

      console.log(user);
      
    }).catch(function(error) {
      
      var errorCode = error.code;
      var errorMessage = error.message;
      var email = error.email;
      var credential = error.credential;
      console.log(error);
    });
}



// CERRAMOS LA session
function cerrar(){
  firebase.auth().signOut()
    .then(function(){
      $('.fa-user-circle').css("display", "block");
      $('#operaUser').css("display", "none");
      $.get('seccionCliente/','', function(subpage){ 
          location.href="/";   
      });
    })
    .catch(function(error){
      console.log(error);
    })
}

function abrirSeccionCliente(email)
{
  $.get('seccionCliente/'+email,'', function(subpage){ 
          console.log(subpage);
    });
}
</script>