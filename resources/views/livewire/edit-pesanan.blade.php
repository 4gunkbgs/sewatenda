<div> 
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
                                <th scope="col">Nama Penyewa</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah Pesanan</th>                                
                                <th scope="col">Tanggal Mulai</th>
                                <th scope="col">Tanggal Selesai</th>
                                <th scope="col">Status Konfirmasi</th>
                                <th scope="col">Aksi</th>                          
                            </tr>
                        </thead>
                    <tbody>
                    @foreach ($pesanans as $pesanan)
                    
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $pesanan->user->name}}</td>                        
                        <td>{{ $pesanan->barang->nama}}</td>
                        <td>{{ $pesanan->jumlah_pesanan }}</td>
                        <td>{{ $pesanan->tanggal_mulai }}</td>
                        <td>{{ $pesanan->tanggal_selesai }}</td>
                        @if ($pesanan->konfirm == 0)
                            <td class="text-black font-bold">Belum Dikonfirmasi</td>
                        @elseif ($pesanan->konfirm == 1)
                            <td class="text-green-500 font-bold">Sudah Dikonfirmasi</td> 
                        @else
                            <td class="text-red-500 font-bold">Barang Tidak Bisa Dipesan Karena Terjadi Kendala</td>                         
                        @endif
                        
                        {{-- <td> <button wire:click="konfirm({{$pesanan->id}})" class="@if($pesanan->konfirm) bg-red-500 hover:bg-red-700 @else bg-green-500 hover:bg-green-700 @endif text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"> @if($pesanan->konfirm) Batal @else Konfirm @endif </button> </td>                                                   --}}
                        <td> 
                            <button wire:click="konfirm({{$pesanan->id}})" class=" bg-green-500 hover:bg-green-700 text-white text-sm font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline"> 
                                Konfirm 
                            </button>
                            <button wire:click="batalkan({{$pesanan->id}})" class=" bg-yellow-600 hover:bg-yellow-800 text-white text-sm font-bold py-2 px-2 mt-2 rounded focus:outline-none focus:shadow-outline"> 
                                Batalkan 
                            </button> 
                            <button wire:click="destroy({{$pesanan->id}})" onclick="return confirm('Yakin Hapus Data?')" class=" bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-2 px-2 mt-2 rounded focus:outline-none focus:shadow-outline">
                                Hapus Pesanan
                            </button>
                        </td>                          
                                                                                                                                           
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
