<div>
    @section('title')
        Pengembalian
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
                                <th scope="col">Nama Penyewa</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah Pesanan</th>                                
                                <th scope="col">Tanggal Mulai</th>
                                <th scope="col">Tanggal Selesai</th>
                                <th scope="col">Tanggal Kembali</th>
                                <th scope="col">Status Pengembalian</th>
                                <th scope="col">Aksi</th>                          
                                <th scope="col">Denda</th>   
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
                        <td>{{ $pesanan->tanggal_kembali }}</td> 
                        <td>{{ $pesanan->status_pengembalian}}</td>                                               
                                                                                                                                           
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

