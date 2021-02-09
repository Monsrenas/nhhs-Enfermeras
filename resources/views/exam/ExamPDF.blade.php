
<?php 
          if(!isset($_SESSION)){
                         session_start();
                       } 
         $nombre=$_SESSION['cliente']??"";

          $items=['last','first','middle'];
          $contenido=trans('exam.C');
          $signat=['Signature','Date'];
?>

<style type="text/css">
   ul { list-style-position: outside; } 
   li  { margin-left: 20px; }
</style>


<div class="row">
	<div class=" text-center col-12">
    <table>
      <tr>
        <td><img style="max-width: 100px;" src="./assets/img/nhhsLogo.jpg"></td>
        <td style="text-align: center;" width="400">
          <h3>Neighborhood Home Health Services, Inc. <br>{{trans('exam.anualexam')}}</h3>
        </td>   
      </tr>
    </table>
  
    
    <div class="form-group col-12">
      <table>
        <tr>  
          @foreach($items as $item)
            <td>{{$exa[$item]?? "-"}}</td>   
          @endforeach
          <td>{{$nombre}}</td>
        </tr>
      </table> 
    </div>
  </div>

   <div class="container">
        <h3 class="text-center">{{trans('exam.HAVERECEIVED')}}</h3>
        <ul>
          @foreach($contenido as $i=>$item)
              <li style="color: <?php echo (isset($exa["cnt".$i]))? "black":"gray"; ?>">
                <input type="checkbox" name="pag[cnt{{$i}}]"  <?php if (isset($exa["cnt".$i])) echo "checked"; ?> >
                {{$item}}
              </li>  
          @endforeach 
        </ul>

       <table class="table lm5" style="width: 100%; text-align: center;">
          <tr> @foreach($signat as $item) <td width="100">   {{$exa["sig".$item]?? ""}}</td>  @endforeach </tr>
          <tr> @foreach($signat as $item) <td  width="100"> {{trans('application.'.$item)}}</td> @endforeach </tr>  
       </table>
  </div>

    <div class="container">

      @foreach ($data as $i=>$tema)
        @if (gettype($tema)=="array")
        <ul>
            @foreach ($tema as $key=>$prg)
                @if ($key=="0")
                  <br><strong>{{$prg}}</strong><br>
                @else
                  <li>
                    @if ($exa[$i]==$key)  
                      <span style="color: green; font-weight: bold;">{{$key.")"}}{{$prg}}</span><br> 
                    @else
                      <span style="color: gray;">{{$key.") ".$prg}}</span><br>
                    @endif
                  </li>
                @endif
            @endforeach
         </ul>   
        @else
            <br><br>
            <h3 style="margin-left: 40px;">{{$tema}}</h3>    
        @endif    
      @endforeach
    </div>      <!-- End Container -->
     
 	 </div>

 