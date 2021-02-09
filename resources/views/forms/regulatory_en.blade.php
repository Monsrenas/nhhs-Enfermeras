<style type="text/css">
  
   .firma {
          width: 200px;

          height: 130px;
          max-height: 135px;
          max-width: 200px;
          text-align: center;
          padding: 0px;
          margin-top: -60px;

          overflow: hidden;
          background: none;
          position: absolute;
         }

  @supports(object-fit: cover){
    .firma img{
              height: 50px;
              object-fit: cover;
              object-position: center center;
              padding: 2px;
          }
        }

</style>

<?php
     if (isset($p)) { $firma=$frm['firma']??""; } else { $firma=$dts["frm"]['firma']??"";}
?>

<div style="text-align: left;">
 
<h4>Regulatory Requirements:</h4>

<ul>
<li>Certification and experience:</li>
	<ul>
		<li>Home Health Aide certificate obtained by:</li>
			<ul>
				<li>Completion of a certified home health aide course.</li>
				<li>Certified by State Department of Health Services.</li>
			</ul>
		<li>On-the-job instruction relative to specific patient needs and continuing inservice training, so that patient safety may be assured and the personal care and homemaking needs of the patient are adequately met.</li>
	</ul>

<li>General qualifications:</li>
	<ul>
		<li>Emotional and mental maturity.</li>
		<li>Valid state driver’s license and reliable automobile, current automobile insurance and be willing to operate personal car necessitated by nature of job.</li>
		<li>Current health certificate/physical examination and TB testing.</li>
		<li>Current CPR card.</li>
		<li>Good verbal and written communication skills.</li>
	</ul>
</ul>
<h4>Language Skills:</h4>
<ul>	
	<li>Ability to read and communicate effectively in English.</li>
	<li>Additional languages preferred.</li>
</ul>

<h4>Physical Demands:</h4>
<ul>
	<li>For physical demands of position, including vision, hearing, repetitive motion and environment, see following description.</p>
		<p>Reasonable accommodations may be made to enable individuals with disabilities to perform the essential functions of the position without compromising patient care.</p>
	</li>
</ul>

<p>
=======================================================================================
</p>
<p>
I have received, read and understand the Position Description/Performance Evaluation above.
</p>
@if (isset($p))
	<br><br><br>
@endif

<table class="table" style="width: 100%;">
	<tr>
		<td width="50%">
			@if (($firma!=""))
		       <div class="firma">
		        <img src="data:image/png;base64,{{$firma}}" id="imgFirma" width="150" height="60">
		       </div> 
      		@endif			
      		@if (isset($p))
				{{$d["RegulatorySignature"]?? ""}} <br>
			@else
				<input type="text" name="RegulatorySignature" class="form-control" value="{{$d["RegulatorySignature"]?? ""}}" required>
			@endif
			<label style="color:gray;">Name/Signature</label>
		</td>
		<td>
			
			@if (isset($p))
				{{$d["RegulatoryDate"]?? ""}} <br>
			@else
				<input type="date" name="RegulatoryDate" class="form-control" value="{{$d["RegulatoryDate"]?? ""}}" required>
			@endif
			<label style="color:gray;" >Date</label>
		</td>
	</tr>
</table>
</div>