@section('title')
    Tambah Barang
@endsection

<x-master-layout>
    @section('main')
        <main class="bg-white-300 flex-1 justify-center p-3 overflow-hidden mt-5">
            <div class="flex justify-center">            
                <form class="w-3/4" action="{{ route('tambah') }}" method="post">           
                    <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                        Id Barang
                    </label>
                    @if ($errors->has('id_barang'))
                        <p class="text-red-500 text-xs italic">{{ $errors->first('id_barang') }}</p>
                    @endif
                    <input required type="text" placeholder="Msl. T001" name="id_barang" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">
                    

                    <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                        Nama Barang
                    </label>
                    @if ($errors->has('nama'))
                        <p class="text-red-500 text-xs italic">{{ $errors->first('nama') }}</p>
                    @endif
                    <input required type="text" placeholder="Msl. Tenda Lipat" name="nama_barang" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">
                    

                    <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                        Jenis Barang
                    </label>
                    @if ($errors->has('jenis'))
                        <p class="text-red-500 text-xs italic">{{ $errors->first('jenis') }}</p>
                    @endif
                    <input required type="text" placeholder="Msl. Tenda" name="jenis_barang" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">
                    

                    <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                        Stok
                    </label>
                    @if ($errors->has('stok'))
                        <p class="text-red-500 text-xs italic">{{ $errors->first('stok') }}</p>
                    @endif
                    <input required type="number" placeholder="1-1000" name="stok" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">
                    

                    <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                        Harga Barang
                    </label>
                    @if ($errors->has('harga'))
                        <p class="text-red-500 text-xs italic">{{ $errors->first('harga') }}</p>
                    @endif
                    <input required type="number" placeholder="Rp. 10.000 Ditulis 10000 Saja." name="harga" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">
                    

                    <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                        Harga Ganti Rusak
                    </label>
                    @if ($errors->has('ganti_rusak'))
                        <p class="text-red-500 text-xs italic">{{ $errors->first('ganti_rusak') }}</p>
                    @endif
                    <input required type="number" placeholder="Rp. 10.000 Ditulis 10000 Saja." name="ganti_rusak" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">
                    

                    <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                        Harga Ganti Hilang
                    </label>
                    @if ($errors->has('ganti_hilang'))
                        <p class="text-red-500 text-xs italic">{{ $errors->first('ganti_hilang') }}</p>
                    @endif
                    <input required type="number" placeholder="Rp. 10.000 Ditulis 10000 Saja." name="ganti_hilang" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">
                   

                    @csrf
                    <div class="flex justify-end">
                        <button name="submit" type="submit" class="my-3 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tambah Data</button>
                    </div>
                </form>
            </div>
        </main>
    @endsection
</x-master-layout>