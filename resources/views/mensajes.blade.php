<style type="text/css">
	#contentMSG{
		display: none; 
		top: 25%; 
		left: 30%;
		right: 30%;
		position: fixed; 
		z-index: 5000; 
		justify-content: center; 
		background: gray; 
		padding: 20px;
-webkit-box-shadow: 6px 9px 54px -2px rgba(0,0,0,0.75);
-moz-box-shadow: 6px 9px 54px -2px rgba(0,0,0,0.75);
box-shadow: 6px 9px 54px -2px rgba(0,0,0,0.75);
color: yellow;
font-size: 1.5em;
font-weight: bold;
text-align: center;
	}
</style>

          <div id="contentMSG"> </div>
 

<script type="text/javascript">
  function mensaje(texto)
  {
    $('#contentMSG').html(texto);
    setTimeout(function() {
        $("#contentMSG").fadeIn(500);
    },100);
 
 	setTimeout(function() {
        $("#contentMSG").fadeOut(1500);
    },3000);   
  	 
  }  
</script>