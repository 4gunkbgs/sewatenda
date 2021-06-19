@section('title')
    Sewa Tenda
@endsection

<x-master-layout>
  
    <!--Main-->
    <main class="bg-white-300 flex-1 p-3 overflow-hidden">
      <div class="flex flex-col">                                             
        
        <!-- Card Sextion Starts Here -->
        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

          <!-- card -->
          <div
            class="rounded overflow-hidden shadow bg-white mx-2 w-full"
          >
            <div class="px-6 py-2 border-b border-light-grey">
              <div class="font-bold text-xl">List Barang</div>
            </div>
            <div class="px-6 py-2 border-b border-light-grey">
              {{-- search bar --}}
              <div class="pt-2 relative mx-auto text-gray-600 flex justify-between">                
                    <form action="{{ route('search2') }}" method="get">
                    <input placeholder="Cari Barang .." type="search" name="search" placeholder="Search" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                    <button type="submit" class="relative left-0 top-0 mt-5 ml-4">
                    <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"></path>
                    </svg>                          
                  </button>
                </form>
                @if (session()->has('message'))
                  <div class="text-center bg-green-500 hover:bg-green-700 text-white w-1/2 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">                   
                    {{ session('message') }}
                  </div>
                @endif                               
              </div>
              
              {{-- end search bar --}}
              
            </div>
            <div class="table-responsive">
              <table class="table text-grey-darkest">
              <thead class="bg-grey-dark text-white text-normal">
                  <tr>
                  <th scope="col">No</th>
                  <th scope="col">Gambar</th>
                  <th scope="col">Nama Barang</th>                      
                  <th scope="col">Harga</th>
                  <th scope="col">Stok</th>
                  <th scope="col" class="text-center">Aksi</th>
                  
                  </tr>
              </thead>
              <tbody>
                  @foreach ($barang as $brg)
                                              
                  <tr>
                      <th scope="row">{{ $loop->iteration }}</th>                        
                      <td> <img width="100px" src="{{ url('storage/photos/'.$brg->gambar) }}"> </td>
                      <td>{{ $brg->nama }}</td>                                    
                      <td> @money($brg->harga)</td> 
                      <td> {{ $brg->stok }}</td>                                     
                      <td class="text-center">
                        <a href="/sewa/{{ $brg->id_barang }}" class="w-2 bg-green-500 hover:bg-green-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Sewa</a>
                        {{-- <button class="w-1/3 bg-green-500 hover:bg-green-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Detail</button> --}}
                      </td>                                                                                 
                  </tr>
                  @endforeach                       
              </tbody>
              </table>
              <hr>              
                {{-- <div class="m-4 ">
                  {{ $barang->links() }}
                </div> --}}
              </div>
            </div>
          </div>
          <!-- /card -->
        </div>
        <!-- /Cards Section Ends Here -->  
      </div>
    </main>

</x-master-layout>