<div class="w-full flex justify-items-center items-center flex-col">
    @section('title')
        Pengembalian
    @endsection 
    <div class="w-4/5 mt-5">        
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                <div class="flex flex-col">                                             
                    
                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                        
                        <!-- card -->
                        <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
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
                                    <th scope="col">Status Pengembalian</th>                                                  
                                    <th scope="col">Aksi</th>                                                            
                                </tr>
                            </thead>
                        <tbody>
                        @foreach ($pesanans as $pesanan)
                        
                        @if ($pesanan->status_pengembalian == 0)
                        <tr>                            
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $pesanan->user->name}}</td>                        
                            <td>{{ $pesanan->barang->nama}}</td>
                            <td>{{ $pesanan->jumlah_pesanan }}</td>
                            <td class="text-red-500 font-bold">Belum Kembali</td>                                                                                                                                                    
                            <td>
                                <button wire:click="showModal({{ $pesanan }})" class="w-full bg-green-500 hover:bg-green-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Kembali
                                </button>
                                @if($isOpen)
                                    @include('livewire.createpengembalian')
                                @endif 
                            </td>                                                                                                                  
                        </tr>
                        @endif 

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
    <div class="w-1/2">        
        <main class="bg-gray-100 flex-1 p-3 overflow-hidden">
            <div class="flex flex-col">                                             
                
                <!-- Card Sextion Starts Here -->
                <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                    
                    <!-- card -->
                    <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                        <div class="px-6 py-2 border-b border-light-grey">
                            <div class="font-bold text-xl">Transaksi</div>
                        </div>
                        <div class="px-6 py-2 border-b border-light-grey">                    
                            
                            
                            <div class="table-responsive">
                                <table class="table text-grey-darkest">
                                    <thead class="bg-grey-dark text-white text-normal">
                                        <tr>
                                            <th scope="col">No</th>                                            
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Jumlah Rusak</th>
                                            <th scope="col">Jumlah Hilang</th>                                                                                                                                                      
                                            <th scope="col">SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($newpengembalian as $data)
                                        
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>  
                                        <td> {{ $data['nama'] }}</td>
                                        <td> {{ $data['jumlah_rusak'] }}</td>
                                        <td> {{ $data['jumlah_hilang'] }}</td>                                      
                                        <td> @money($data['subtotal'])</td>                                                                                                                                                                                                                             
                                    </tr>
                                    @endforeach    
                                    <tr>
                                        <td></td>
                                        <td>Total </td>
                                        <td></td>
                                        <td></td>
                                        <td>@money($total)</td>    
                                    </tr>                   
                                    </tbody>
                                </table>                
                            </div>
                        </div>
        <!-- /card -->
                    </div>
    <!-- /Cards Section Ends Here -->        
                </div>
        </main>
    </div>
</div>

