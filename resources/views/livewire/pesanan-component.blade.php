<div> 
    @section('title')
        Pesanan
    @endsection
        <main class="bg-white-300 flex-1 p-3 overflow-hidden">
            <div class="flex flex-col">                                             
                
                <!-- Card Sextion Starts Here -->
                <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                    
                    <!-- card -->
                    <div
                    class="rounded overflow-hidden shadow bg-white mx-2 w-full"
                    >
                    <div class="px-6 py-2 border-b border-light-grey">
                        <div class="font-bold text-xl">List Pesanan</div>
                    </div>
                    <div class="px-6 py-2 border-b border-light-grey">                    
                    
                    
                    <div class="table-responsive">
                    <table class="table text-grey-darkest">
                        <thead class="bg-grey-dark text-white text-normal">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah Pesanan</th>                                
                                <th scope="col">Tanggal Mulai</th>
                                <th scope="col">Tanggal Selesai</th>
                                <th scope="col">Konfirmasi</th>                                                              
                                <th scope="col">Aksi</th>                                                       
                            </tr>
                        </thead>
                    <tbody>
                    @foreach ($pesanans as $pesanan)
                    
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>                        
                        <td>{{ $pesanan->barang->nama}}</td>
                        <td>{{ $pesanan->jumlah_pesanan }}</td>
                        <td>{{ $pesanan->tanggal_mulai }}</td>
                        <td>{{ $pesanan->tanggal_selesai }}</td>
                        @if ($pesanan->konfirm == 0)
                            <td class="text-black font-bold">Belum Dikonfirmasi</td>
                            <td> 
                                <button wire:click="destroy({{ $pesanan->id }})" class=" bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-2 px-2 mt-2 rounded focus:outline-none focus:shadow-outline">
                                    Hapus Pesanan
                                </button>
                            </td>
                        @elseif ($pesanan->konfirm == 1)
                            <td class="text-green-500 font-bold">Sudah Dikonfirmasi</td>
                            <td class="text-red-500 font-bold">Silahkan ambil barang</td> 
                        @else
                            <td class="text-red-500 font-bold text-md">Barang Tidak Bisa Dipesan Karena Terjadi Kendala</td>
                            <td> 
                                <button wire:click="destroy({{ $pesanan->id }})" class=" bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-2 px-2 mt-2 rounded focus:outline-none focus:shadow-outline">
                                    Hapus Pesanan
                                </button>
                            </td>                         
                        @endif                     
                                                                                              
                    </tr>
                    @endforeach                       
                </tbody>
            </table>
            {{-- <div class="p-4">
                {{ $barang->links() }}
            </div> --}}
        </div>
        </div>
        <!-- /card -->
    </div>
    <!-- /Cards Section Ends Here -->        
</div>
</main>

</div>