<div class="w-full max-w-full px-3 mt-0 mb-6 md:mb-0 md:w-1/2 md:flex-none lg:w-2/3 lg:flex-none">
            <div class="border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                <div class="flex flex-wrap mt-0 -mx-3">
                  <div class="flex-none w-7/12 max-w-full px-3 mt-0 lg:w-1/2 lg:flex-none">
                    <h6>MY CRYPTOCURRENCY</h6>
                   
                  </div>
                  <div class="flex-none w-5/12 max-w-full px-3 my-auto text-right lg:w-1/2 lg:flex-none">
                    <div class="relative pr-6 lg:float-right">
                    <button id="dropdownMenuIconButton" onclick="toggleWalletDots()" data-dropdown-toggle="dropdownDots" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 " type="button"> 
                      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                    </button>
  
                     <!-- Dropdown menu -->
                    <div id="dropdownDots" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 z-50 absolute">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                          <li>
                            <a href="#" wire:click="deposit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Give 1 ETH</a>
                          </li>
                        </ul>
                        <div class="py-1">
                          <a href="#" wire:click="remove" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Clear list</a>
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex-auto p-6 px-0 pb-2">
                <div class="overflow-x-auto">
          <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">Name</th>
                  <th class="px-6 py-3 pl-2 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">My Ballance</th>
                  <th class="px-6 py-3 font-bold tracking-normal text-center uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">Value</th>
                  <th class="px-6 py-3 font-bold tracking-normal text-center uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">Market Price</th>
                </tr>
              </thead>
    @foreach($cryptolist as $key => $value)
                    <tbody>
                      <tr>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                          <div class="flex px-2 py-1">
                            <div>
                              <img width="35" height="35" src="https://img.icons8.com/external-modern-lines-kalash/344/external-cryptocurrency-currency-and-cryptocurrency-signs-modern-lines-kalash-4.png" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-sm h-9 w-9 rounded-xl" alt="xd" />
                            </div>
                            <div class="flex flex-col justify-center">
                              <h6 class="mb-0 leading-normal text-sm">{{$value->name}}</h6>
                            </div>
                          </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                       
                            <p>{{$value->sum_crypto}} {{$value->tiker}}</p>
                            
                           
                        </td>
                        <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap">
                          <span class="font-semibold leading-tight text-xs"> ${{$this->ethprice($value->sum_crypto)}}</span>
                        </td>
                        <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap">
                        <span class="font-semibold leading-tight text-xs">${{$this->ethprice(1)}}</span>
            
                        </td>
                      </tr>
                      <tr>
                      @endforeach
<section class="hero container max-w-screen-lg mx-auto pb-10 flex justify-center">
  <button onclick="addCurrenncyModal()"><img src="https://img.icons8.com/android/344/plus.png"  width="25" height="25"/></button>
  
</section>


</tr>
    </tbody>
    
</table>

</div>

              </div>
              
            </div>

            <div id="currencyModal" tabindex="-1" aria-hidden="true" class="backdrop-blur-sm bg-white/30 mx-auto flex justify-center hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
      
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal" onclick="closeModal()">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="py-6 px-6 lg:px-8" >
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Find your currency or enter</h3>
                <div class="space-y-6"  >
             
             <div>
                 <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ticker name</label>
                 <input type="text" name="TickerName" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" wire:model.defer="tiker" placeholder="Enter tiker" required>
             </div>
             <div>
                 <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Full name</label>
                 <input type="text" name="FullName" id="FullName" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" wire:model.defer="name" placeholder="Enter name" >
             </div>
             <div>
                 <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Decimals</label>
                 <input type="text" name="Decimals" id="Decimals" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" wire:model.defer="decimals" placeholder="" >
             </div>
             <div>
                 <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contract adress</label>
                 <input type="text" name="ContractAdress" id="ContractAdress" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" wire:model.defer="contract" placeholder="Contract adress"  required>
             </div>
    
             <div class="flex justify-between">
                
             <button class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" wire:click="save" type="submit">Submit</button>
           
</div>
            </div>
        </div>

    </div>
    
    </div>
  
  </div>
  <script>
function toggleWalletDots() {
  if (document.getElementById('dropdownDots').innerHTML.includes("hidden")){
  document.getElementById('dropdownDots').classList.remove('hidden')
  }
  else{
    document.getElementById('dropdownDots').classList.toggle('hidden')
  }
  }  
</script>



