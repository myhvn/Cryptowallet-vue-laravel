
<div class="flex-auto p-4" style="100%; height:80px; overflow:auto;">
                <div class="before:border-r-solid relative before:absolute before:top-0 before:left-4 before:h-full before:border-r-2 before:border-r-slate-100 before:content-[''] before:lg:-ml-px">
                  <table cellspacing="0" cellpadding="1" width="300" >
      
                    <tbody >
                         @foreach($transactions as $key => $value)
                         
                      <tr>
                      <div class="relative mb-4 mt-0 after:clear-both after:table after:content-['']">
                    <span class="w-6.5 h-6.5 text-base absolute left-4 z-10 inline-flex -translate-x-1/2 items-center justify-center rounded-full bg-white text-center font-semibold">
                      <i class="relative z-10 text-transparent ni leading-none ni-bell-55 leading-pro bg-gradient-to-tl from-green-600 to-lime-400 bg-clip-text fill-transparent"></i>
                    </span>
                    <div class="ml-11.252 pt-1.4 lg:max-w-120 relative -top-1.5 w-auto">
                      <h6 class="mb-0 font-semibold leading-normal text-sm text-slate-700">
                      @if ($value->type == 'deposit') 
                      +
                      @endif
                      @if ($value->type == 'send')
                      -
                      @endif
                    {{ $value->sum }}, {{ $value->currency }}
                      </h6>
                      <p class="mt-1 mb-0 font-semibold leading-tight text-xs text-slate-400">{{ $value->created_at }}</p>
                    </div>
                    <hr/>
                  </div>
                  
                      </tr>
                      @endforeach
                     
                      

                    </tbody>
                  </table>
                 <!-- end table -->
                  
                </div>
              </div>