<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
  
    <div class="fixed inset-0 transition-opacity" aria-hidden="true" style="background-color:rgba(0, 0, 0, 0.055)"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        
        <form class="w-3/4">                                   

            <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-4" for="grid-first-name">
                Masukkan Detail Pengembalian
            </label>                                 
            

            <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                Jumlah Rusak
            </label>
            <input required wire:model="jumlahrusak" type="number" placeholder="Masukkan Jumlah Rusak" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">            

            <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                Jumlah Hilang
            </label>
            <input required wire:model="jumlahhilang" type="number" placeholder="Masukkan Jumlah Rusak" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">            

            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button wire:click="store()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Save
                </button>
                <button wire:click.prevent="hideModal()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>

        </form>
      </div>
       
    </div>
  </div>
</div>