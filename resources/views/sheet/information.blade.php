 
<div class="container">

  <table class="table">
  <tr>
    @if (isset($p))
      <td width="50"><img style="max-width: 100px;" src="./assets/img/nhhsLogo.jpg"></td>
    @endif
    <td style="text-align: center;" width="400">
      <h3>Neighborhood Home Health Services, Inc. <br>{{trans('application.MATCHINGINFORMATIONSHEET')}}</h3>
    </td>   
  </tr>
  </table>



  <div  class="col-lg-9 col-sm-6" style="margin-top: 20px;">
       <?php 
$items=['LYFT','ERRANDS','SEVENDAYSAWEEK','PMONLY','AMONLY','M-FONLY','SATURDAYONLY','SUNDAYSONLY', 'LIFTINGRESTRICTIONS','ANIMALRESTRICTIONS', 'SMOKINGRESTRICTIONS'];
       ?>  
    <table class="table table-striped table-responsive">
      <thead>
         <tr>
           <th>{{trans('application.COMPETENCE')}}</th>
           <th style="text-align: center;">{{trans('application.yes')}}</th>
           <th style="text-align: center;">{{trans('application.no')}}</th>
         </tr>
      </thead>
      <tbody>
        
        @foreach($items as $item)
          <tr>
            <td width="200">
              {{trans('application.'.$item)}}
            </td>
            <td width="150" style="text-align: center;"> 
               <input class="" type="radio" name="pag[{{$item}}]" id="{{$item}}1" value="1" {{($d[$item]??"")==1? "checked":""}}>
            </td>
            <td width="150" style="text-align: center;">
               <input type="radio" name="pag[{{$item}}]" id="{{$item}}2" value="0" {{($d[$item]??"")=="0"? "checked":""}}>       
            </td>
          </tr>
        @endforeach 

        
      </tbody>
    </table>
  
  </div>   
</div> {{-- Fin de CONTAINER --}}
 
 