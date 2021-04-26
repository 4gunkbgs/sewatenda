@section('title')
    Edit Barang {{ $barang->nama }}
@endsection

<x-master-layout>
    @section('main')
        <main class="bg-white-300 flex-1 justify-center p-3 overflow-hidden mt-5">
            <div class="flex justify-center">            
                <form class="w-3/4" action="/edit/{{ $barang->id_barang }}" method="post">
                    @csrf                   {{-- csrf token untuk tombol edit --}}
                    @method('PUT')            

                    <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                        Id Barang
                    </label>
                    @if ($errors->has('id_barang'))
                        <p class="text-red-500 text-xs italic">{{ $errors->first('id_barang') }}</p>
                    @endif
                    <input value="{{ $barang->id_barang }}"name="id_barang" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">

                    <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                        Nama Barang
                    </label>
                    @if ($errors->has('nama'))
                        <p class="text-red-500 text-xs italic">{{ $errors->first('nama') }}</p>
                    @endif
                    <input required value="{{ $barang->nama }}" type="text" placeholder="Msl. Tenda Lipat" name="nama_barang" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">

                    <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                        Jenis Barang
                    </label>
                    @if ($errors->has('jenis_barang_id'))
                        <p class="text-red-500 text-xs italic">{{ $errors->first('jenis_barang_id') }}</p>
                    @endif
                    <div class="relative inline-flex">
                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                        <select name="jenis_barang_id" class="border border-gray-300 text-gray-600 h-10 pl-5 pr-10 mb-2 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                            <option disabled> Pilih Jenis Barang</option>                           
                            <option value="{{ $barang->jenis_barang_id }}">{{ $barang->jenisBarang->jenis_barang }}</option>                           
                            @foreach ($jenisbarang as $jenis)
                            
                            <option value="{{ $jenis->id }}">{{ $jenis->jenis_barang }}</option>

                            @endforeach
                        </select>
                    </div>

                    <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                        Stok
                    </label>
                    <input required value="{{ $barang->stok }}" type="number" placeholder="1-1000" name="stok" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">

                    <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                        Harga Barang
                    </label>
                    <input required value="{{ $barang->harga }}" type="number" placeholder="Rp. 10.000 Ditulis 10000 Saja." name="harga" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">

                    <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                        Harga Ganti Rusak
                    </label>
                    <input required value="{{ $barang->ganti_rusak }}" type="number" placeholder="Rp. 10.000 Ditulis 10000 Saja." name="ganti_rusak" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">

                    <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-first-name">
                        Harga Ganti Hilang
                    </label>
                    <input required value="{{ $barang->ganti_hilang }}" type="number" placeholder="Rp. 10.000 Ditulis 10000 Saja." name="ganti_hilang" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">

                    @csrf
                    <div class="flex justify-end">
                        <button name="submit" type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit Data</button>
                    </div>
                </form>
            </div>
        </main>
    @endsection
</x-master-layout>