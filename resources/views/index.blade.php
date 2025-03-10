<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('app.css') }}">
  @livewireStyles

    <!-- CSS librarys -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Chart library -->

  
  @livewireScripts


  
 

  

</head>
<body>
<div class="container mx-auto lg:px-20 2xl:px-30 bg-gray-50">

     <!-- cards -->
     <div class="w-full px-6 py-6 mx-auto">
        <!-- cards row 1 -->
  

        <div class="flex flex-wrap mt-6 -mx-3">

          <div class="w-full max-w-full px-3 mt-0 lg:w-8/12 lg:flex-none">
            <div class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                <h6>BALLANCE ACTIVITY</h6>
               
              </div>
              <div class="flex-auto p-4">
              <div id="graph-container">
                  <canvas id="chart-line" height="400"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full max-w-full px-3 lg:w-4/12 lg:flex-none">
            <div class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
              <div class="flex-auto p-4">
                <div class="py-4 pr-1 mb-4 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-xl">
                  <div>
                    <canvas id="chart-bar" height="170"></canvas>
                  </div>
                </div>
                <h6 class="mt-6 mb-0 ml-2">MY WALLET</h6>
                <!-- <p class="ml-2 leading-normal text-sm">(<span class="font-bold">+32%</span>) than last week</p> -->
                </br>
            
                <div class="flex items-center justify-center ">
                <div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg bar-buttons" role="group">
  <button id="sendBtn" type="button" class="bar-buttons inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-black rounded-l-lg border border-gray-900 hover:bg-gray-900 hover:text-black focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700" onclick="toggleSend()" data-modal-toggle="sendModal">
    <svg aria-hidden="true" class="mr-2 w-4 h-4 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
    Send
  </button>
  <button type="button" class="bar-buttons inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-black border-t border-b border-gray-900 hover:bg-gray-900 hover:text-black focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700" onclick="toggleSettings()" data-modal-toggle="settingsModal">
    <svg aria-hidden="true" class="mr-2 w-4 h-4 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"></path></svg>
    Settings
  </button>
  <button type="button" class="bar-buttons inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-black rounded-r-md border border-gray-900 hover:bg-gray-900 hover:text-black focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700" onclick="toggleRecive()" data-modal-toggle="reciveModal">
    <svg aria-hidden="true" class="mr-2 w-4 h-4 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd"></path></svg>
    Recive
  </button>
</div>
</div>
              

              
      
            
              </div>
            </div>
          </div>
        </div>




        
        <livewire:genwallet /> 
        <livewire:sendwallet /> 

        <!-- cards row 2 -->

        <div class="flex flex-wrap my-6 -mx-3">
          <!-- card 1 -->

          
                <livewire:currencylist/>
                
</div>
          <!-- card 2 -->

          <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none lg:w-1/3 lg:flex-none">
            <div class="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                <h6>TRANSACTIONS</h6>
                <!-- <p class="leading-normal text-sm">
                  <i class="fa fa-arrow-down text-lime-500"></i>
                  <span class="font-semibold">54%</span> this month
                </p> -->
              </div>
              <livewire:transhistory /> 
            </div>
          </div>
        
      
     

<livewire:login />

<!-- Settings modal -->
<div id="settingsModal" tabindex="-1" aria-hidden="true" class="backdrop-blur-sm bg-white/30 mx-auto flex justify-center hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
<div class="container mx-auto max-w-3xl mt-8">

    <form action="" method="POST" enctype="multipart/form-data">
      <!-- @csrf -->
      <div class="w-full bg-white rounded-lg mx-auto mt-8 flex overflow-hidden rounded-b-none">
        <div class="w-1/3 bg-gray-100 p-8 hidden md:inline-block">
          <h2 class="font-medium text-md text-gray-700 mb-4 tracking-wide">Wallet settings</h2>
          <p class="text-xs text-gray-500">Update your basic wallet information such as Address, Name, and other settings</p>
          </br>
          <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="closeModal()">Update</button>
                    
        </div>
        <div class="md:w-2/3 w-full">
          <div class="py-8 px-9">
            <label for="name" class="text-sm text-gray-600">Wallet name</label>
            <input class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500" type="text" value="" name="name">
          </div>
          <hr class="border-gray-200">
          <div class="py-8 px-9">
          <div class="max-w-md mx-auto">
          <label for="name" class="text-sm text-gray-600">Language:</label>

    <div class="relative z-50">
      <div class="h-10 bg-white flex border border-gray-200 rounded items-center z-50">
        <input disabled value="Javascript" name="select" id="select" class="px-4 appearance-none outline-none text-gray-800 w-full"  />   
        <!-- checked -->

        <button class="cursor-pointer outline-none focus:outline-none transition-all text-gray-300 hover:text-gray-600">
          <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
        <label for="show_more" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-gray-600">
          <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="18 15 12 9 6 15"></polyline>
          </svg>
        </label>
      </div>

      <input type="checkbox" name="show_more" id="show_more" class="hidden peer" />
      <div class="absolute rounded shadow bg-white overflow-hidden hidden peer-checked:flex flex-col w-full mt-1 border border-gray-200">
        <div class="cursor-pointer group">
          <a class="block p-2 border-transparent border-l-4 group-hover:border-blue-600 group-hover:bg-gray-100">English</a>
        </div>
        <div class="cursor-pointer group border-t">
          <a class="block p-2 border-transparent border-l-4 group-hover:border-blue-600 border-blue-600 group-hover:bg-gray-100">Romanian</a>
        </div>
        <div class="cursor-pointer group border-t">
          <a class="block p-2 border-transparent border-l-4 group-hover:border-blue-600 group-hover:bg-gray-100">Ukramian</a>
        </div>
      </div>
    </div>
  </div>
          </div>
          <hr class="border-gray-200">
          <div class="grid  px-9 gap-6 mb-6 md:grid-cols-2">
        
        <div>
        <label for="name" class="text-sm text-gray-600">Currenncy:</label>
        <input class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500" type="text" value="" placeholder="USD" name="name">
        </div>
        <div class="py-11">
        <label for="default-toggle" class="inline-flex relative items-center cursor-pointer">
  <input type="checkbox" value="" id="default-toggle" class="sr-only peer">
  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
  <span class="ml-3 text-sm font-medium text-black-400 dark:text-black-300">Dark mode</span>
</label>
        </div>
          



</div>
</div>
        
</form>
</div>

  
  </div>
           
        
</div>








       
      </div>
</div>



<footer class="pt-4">
          <div class="w-full px-6 mx-auto">
            <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
              <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-3/12 lg:flex-none">
                <div class="leading-normal text-center text-sm text-slate-500 lg:text-left">
                  ©
                  <script>
                    document.write(new Date().getFullYear() + ",");
                  </script>
                 CREATIVE.ONES
                </div>
              </div>
              <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-9/12 lg:flex-none">
                <ul class="flex flex-wrap justify-right pl-0 mb-0 list-none lg:justify-end">
                  <li class="nav-item">
                    <a href="#" class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">Rules and regulations</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">Privacy policy</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">Terms and conditions</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="block px-4 pt-0 pb-1 pr-0 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">FAQ</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
            </li>
          </ul>
        </dd>
        
      </div>
    </dl>
  </div>
</div>


<!-- initialize modals and chart base scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script> 
<livewire:walletanalytic /> 
<livewire:walletinfo /> 
<script type="text/javascript" src="{{ asset('modals.js') }}"></script>

</body>

</html>