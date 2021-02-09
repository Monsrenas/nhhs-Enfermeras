@extends('welcome')
@section('operaciones')

	<div class="container">
		    <div class=" text-center col-12">
        	<h2 class="shodow p-9 m-0" style="text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);">Neighborhood Home Health Services, Inc. </h2>
        </div>
     <div  style="margin-top: 20px; overflow: hidden;">
      <br>
   
       <H3><STRONG>{{trans('welcome.Mission')}}</STRONG></H3>
       <p style="text-align: justify; font-size: 1.3em;" >
        {{trans('welcome.Mission1')}}
       </p>
       <p style="text-align: justify; font-size: 1.3em;" >
        {{trans('welcome.Mission2')}}
       </p>
       <img style="margin: 0 auto; max-width: 50%; float: left; margin: 20px;" src="{{asset('assets/img/bg3.jpg')}}">
       <H3><STRONG>{{trans('welcome.Integrity')}}</STRONG></H3>
       <p style="text-align: justify; font-size: 1.3em;" >
        {{trans('welcome.Integrity1')}}
       </p>
       <H3><STRONG>{{trans('welcome.Company')}}</STRONG></H3>
       <p style="text-align: justify; font-size: 1.3em;" >
        {{trans('welcome.Company1')}}
       </p>
       <p style="text-align: justify; font-size: 1.3em;" >
        {{trans('welcome.Company2')}}
       </p>
       <p style="text-align: justify; font-size: 1.3em;" >
        {{trans('welcome.Company3')}}
       </p>

       <br>
       <H3><STRONG>{{trans('welcome.INDIVIDUAL')}}</STRONG></H3>
       <H3><STRONG>{{trans('welcome.Whatcan')}}</STRONG></H3>
         <p style="text-align: justify; font-size: 1.3em;" >
        {{trans('welcome.Whatcan1')}}
       </p>

       <H3><STRONG>{{trans('welcome.Accredited')}}</STRONG></H3>
       <p style="text-align: justify; font-size: 1.3em;" >
        {{trans('welcome.Accredited1')}}
       </p>
        <p style="text-align: justify; font-size: 1.3em;" >
        {{trans('welcome.Accredited2')}}
       </p>
       <p style="text-align: justify; font-size: 1.3em;" >
        {{trans('welcome.Accredited3')}}
       </p>

       <?php 
        $array = explode(",", trans('welcome.Services1'));
       ?>

       <H3><STRONG>{{trans('welcome.Services')}}</STRONG></H3>
       <ul>   
        @foreach ($array as $tm)
        <li>{{$tm}}</li>
        @endforeach
       </ul>  
       <br>
       <H3><STRONG>{{trans('welcome.DELIVERING')}}</STRONG></H3>
       <p style="text-align: justify; font-size: 1.3em;" >
        {{trans('welcome.DELIVERING1')}}
       </p>
        <p style="text-align: justify; font-size: 1.3em;" >
        {{trans('welcome.DELIVERING2')}}
       </p>
       <br>

        <H3><STRONG>{{trans('welcome.NEIGHBORHOOD')}}</STRONG></H3>
       <p style="text-align: justify; font-size: 1.3em;" >
        {{trans('welcome.NEIGHBORHOOD1')}}<br><br>
       </p>
       <p style="text-align: justify; font-size: 1.3em;" >
        {{trans('welcome.NEIGHBORHOOD2')}}<br><br>
       </p>
              <p style="text-align: justify; font-size: 1.3em;" >
        {{trans('welcome.NEIGHBORHOOD3')}}<br><br>
       </p>
              <p style="text-align: justify; font-size: 1.3em;" >
        {{trans('welcome.NEIGHBORHOOD4')}}<br>
       </p><br>
        <p style="text-align: justify; font-size: 1.2em; font-weight: bold;">
         9110 S.W. 72 STREET <br>
         MIAMI, FLORIDA 33173<br>
         PH: (786) 693-9600<br>
         FAX: (305) 910-0191<br>
         Lic. 299993497<br>
       </p>
       
     </div>  
           
	 	 
	</div>
 

@endsection