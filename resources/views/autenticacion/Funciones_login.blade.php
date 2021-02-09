
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-auth.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-analytics.js"></script>
<?php 
  if(!isset($_SESSION)){
                           session_start();
                         }  
?>
<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
var firebaseConfig = {
  apiKey: "AIzaSyDtxGTGrJiGWid3EYp6c59j_oQKiVjxewY",
  authDomain: "nhhs-8628d.firebaseapp.com",
  databaseURL: "https://nhhs-8628d.firebaseio.com",
  projectId: "nhhs-8628d",
  storageBucket: "nhhs-8628d.appspot.com",
  messagingSenderId: "265461299542",
  appId: "1:265461299542:web:164333302912502f4fbef7",
  measurementId: "G-0WFB90R9BB"
};
// Initialize Firebase
var variable = firebase.initializeApp(firebaseConfig);
firebase.analytics();
firebase.auth().languageCode = 'es';
  
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
                                                                  abrirSeccionCliente(user.email);
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
        
      if (errorCode) { $('#MnsgError').empty().append(errorMessage) } 
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
                                        $('#MnsgError').empty().append('Unverified Mail. Please complete the process');
                                          abortar(); 
                                      }
                          });
  }

  function crear(email, pass){
    firebase.auth().createUserWithEmailAndPassword(email, pass)
    .then(function(){
      // VERIFICAMOS EL CORREO
      verificar();
      abortar();
    })
    .catch(function(error) {
        var errorCode = error.code;
        var errorMessage = error.message;
        if (errorCode=='auth/email-already-in-use') { $('#MnsgError').empty().append(errorMessage); return;} 
    });

  }

// VERIFICAMOS EL CORREO
  function verificar(){
    var user = firebase.auth().currentUser;

    user.sendEmailVerification().then(function() {
      // Email sent.
      abortar();
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
function abortar(){
  firebase.auth().signOut()
    .then(function(){
      $('.fa-user-circle').css("display", "block") 
      $('#operaUser').css("display", "none");
      $.get('/seccionCliente/','', function(subpage){ 
             
      });
    })
    .catch(function(error){
      console.log(error);
    })
}

function cerrar(){
  firebase.auth().signOut()
    .then(function(){
      $('.fa-user-circle').css("display", "block") 
      $('#operaUser').css("display", "none");
      $.get('/seccionCliente/','', function(subpage){ 
          location.href="/";   
      });
    })
    .catch(function(error){
      console.log(error);
    })
}


function abrirSeccionCliente(email)
{
  $.get('/seccionCliente/'+email,'', function(subpage){ 
        
    });
}
</script>