<template>

    <div class="table-responsive">
        <table class="table text-grey-darkest">
        <thead class="bg-grey-dark text-white text-normal">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Id Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Jenis Barang</th>
            <th scope="col">Stok</th>
            <th scope="col">Harga</th>
            <th scope="col">Harga Ganti Rusak</th>
            <th scope="col">Harga Ganti Hilang</th>
            <th scope="col">Aksi</th>
            
            </tr>
        </thead>
        <tbody v-for="(list, index) in lists" v-bind:key="list.id_barang">
            <tr>
                <th> {{ index+1 }}</th>
                <td>{{ list.id_barang }}</td>
                <td>{{ list.nama }}</td>
                <td>{{ list.jenis_barang.jenis_barang }}</td>
                <td>{{ list.stok}} </td>
                <td>{{ list.harga}} </td>
                <td>{{ list.ganti_rusak }} </td>
                <td>{{ list.ganti_hilang }} </td>
                <td>
                    <a href="/sewa" class="w-2 bg-green-500 hover:bg-green-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Sewa</a>
                </td> 
            </tr>                                   
        </tbody>
        </table>
        <hr>              
       
    </div>

</template>

<script>
    export default {
        data: function(){
            return {
                lists: []
            }
        },

        mounted() {
            this.getData()
            console.log('Component mounted.')
        },
        methods: {
            getData() {
                this.axios
                    .get('/api')
                    .then(response => {
                        this.lists = response.data;
                        console.log(response.data)
                    })
                    .catch((err) => {
                        console.log('ada error')
                    })
            }
        }
    }
</script>
