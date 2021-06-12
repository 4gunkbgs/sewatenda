<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
  
    <div class="fixed inset-0 transition-opacity" aria-hidden="true" style="background-color:rgba(31, 31, 31, 0.568)"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        
        <form class="w-3/4">
            @if($formStatus == 'edit')
                <img width="100px" src="{{ url('storage/photos/'.$gambar) }}">
                @if ($errors->has('gambar'))
                    <p class="text-red-500 text-xs italic">{{ $errors->first('gambar') }}</p>
                @endif
                <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mt-3 mb-2" for="grid-first-name">
                    Edit Gambar
                </label>           
                <input type="file" class="mb-3" wire:model="gambar">
            @else
            @if ($errors->has('gambar'))
                <p class="text-red-500 text-xs italic">{{ $errors->first('gambar') }}</p>
            @endif
            <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mt-3 mb-2" for="grid-first-name">
                Masukkan Gambar
            </label>           
            <input type="file" class="mb-3" wire:model="gambar">      
            @endif                            

            <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                Id Barang
            </label>
            @if ($errors->has('id_barang'))
                <p class="text-red-500 text-xs italic">{{ $errors->first('id_barang') }}</p>
            @endif
            @if($formStatus == 'edit')
                <input disabled required wire:model="id_barang" type="text" placeholder="Msl. T001 P001 L001" name="id_barang" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
            @else
                <input required wire:model="id_barang" type="text" placeholder="Msl. T001 P001 L001" name="id_barang" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
            @endif

            <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                Nama Barang
            </label>
            @if ($errors->has('nama'))
                <p class="text-red-500 text-xs italic">{{ $errors->first('nama') }}</p>
            @endif
            <input required wire:model="nama" placeholder="Msl. Tenda Lipat" name="nama_barang" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">
            

            <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                Jenis Barang
            </label>
            @if ($errors->has('jenis_barang_id'))
                <p class="text-red-500 text-xs italic">{{ $errors->first('jenis_barang_id') }}</p>
            @endif
            @if ($formStatus == 'edit')                
                <div disabled class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">
                    {{ $namajenisbarang }}
                </div>
            @else
            <div class="relative inline-flex">
                <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                <select wire:model="jenis_barang_id" class="border border-gray-300 text-gray-600 h-10 pl-5 pr-10 mb-2 bg-white hover:border-gray-400 focus:outline-none appearance-none">                           
                    <option selected value="">Pilih Jenis Barang</option>
                    @foreach ($jenisbarang as $brg)
                    
                    <option value="{{ $brg->id }}">{{ $brg->jenis_barang }}</option>
                    
                    @endforeach
                </select>
            </div>
            @endif
                            
            <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                Stok
            </label>
            @if ($errors->has('stok'))
                <p class="text-red-500 text-xs italic">{{ $errors->first('stok') }}</p>
            @endif
            <input required type="number" wire:model="stok" placeholder="1-1000" name="stok" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">
            

            <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                Harga Barang
            </label>
            @if ($errors->has('harga'))
                <p class="text-red-500 text-xs italic">{{ $errors->first('harga') }}</p>
            @endif
            <input required wire:model="harga" type="number" placeholder="Rp. 10.000 Ditulis 10000 Saja." name="harga" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">
            

            <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                Harga Ganti Rusak
            </label>
            @if ($errors->has('ganti_rusak'))
                <p class="text-red-500 text-xs italic">{{ $errors->first('ganti_rusak') }}</p>
            @endif
            <input required wire:model="ganti_rusak" type="number" placeholder="Rp. 10.000 Ditulis 10000 Saja." name="ganti_rusak" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">
            

            <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                Harga Ganti Hilang
            </label>
            @if ($errors->has('ganti_hilang'))
                <p class="text-red-500 text-xs italic">{{ $errors->first('ganti_hilang') }}</p>
            @endif
            <input required wire:model="ganti_hilang" type="number" placeholder="Rp. 10.000 Ditulis 10000 Saja." name="ganti_hilang" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">
            
            @if ($errors->has('deskripsi'))
                <p class="text-red-500 text-xs italic">{{ $errors->first('deskripsi') }}</p>
            @endif
            <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                Deskripsi Barang
            </label>
            <textarea wire:model="deskripsi" type="text" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" rows="4"> </textarea>

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