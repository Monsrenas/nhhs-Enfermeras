 
<div class="container">
	<div class=" text-center col-12">
    <h2 class="shodow p-9 m-0" style="text-align: center; text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);">{{trans('application.MATCHINGINFORMATIONSHEET')}}</h2>
  </div>
  <div  class="col-lg-9 col-sm-6" style="margin-top: 20px;">
       <?php 
$items=['LYFT','ERRANDS','SEVENDAYSAWEEK','PMONLY','AMONLY','M-FONLY','SATURDAYONLY','SUNDAYSONLY', 'LIFTINGRESTRICTIONS','ANIMALRESTRICTIONS', 'SMOKINGRESTRICTIONS'];
       ?>
    <form  action="javascript: Guardar('pag3')" id="pag3" method="POST" >   
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
               <input class="" type="radio" name="pag[{{$item}}]" id="{{$item}}1" value="1" {{($d3[$item]??"")==1? "checked":""}}>
            </td>
            <td width="150" style="text-align: center;">
               <input type="radio" name="pag[{{$item}}]" id="{{$item}}2" value="0" {{($d3[$item]??"")=="0"? "checked":""}}>       
            </td>
          </tr>
        @endforeach 

        
      </tbody>
    </table>
    <button class="fa fa-save btn btn-success"> {{trans('application.save')}}</button>
    </form>
  </div>   
</div> {{-- Fin de CONTAINER --}}
 
 