                <div class="tab-pane" id="frm1">
                  <form action="javascript: Guardar('pag6')" id="pag6" method="POST" >
                    @include("forms.addendum_".$idm,['d' => $dts[6] ??[] ])
                  </form>
                </div>
                <div class="tab-pane" id="frm2">
                  <form action="javascript: Guardar('pag7')" id="pag7" method="POST" >
                  @include("forms.deposit",['d' => $dts[7] ??[] ])
                </form>
                </div>
                <div class="tab-pane" id="frm3">
                  <form action="javascript: Guardar('pag8')" id="pag8" method="POST" >
                    @include("forms.conflict",['d' => $dts[8] ??[] ])
                  </form>
                </div>   
                <div class="tab-pane" id="frm4">
                  <form action="javascript: Guardar('pag9')" id="pag9" method="POST" >
                    @include("forms.absence",['d' => $dts[9] ??[] ])
                  </form>
                </div>                
                <div class="tab-pane" id="frm5">
                  <form action="javascript: Guardar('pag10')" id="pag10" method="POST" >
                    @include("forms.evaluation",['d' => $dts[10] ??[] ])
                  </form>
                </div>