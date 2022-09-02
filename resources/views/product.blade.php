<x-app-layout title="Product Data">
    <div class="container">
        <x-card title='Product Data' teks=''>
            <a class="btn btn-primary float-right" href="/product-input" >Add Product</a>
            <a class="btn btn-primary float-right" href="/product-export" >Export</a>
            <table class="table table-hover">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th style="width: 250px">Slug</th>
                    <th style="width: 100px">Price</th>
                    <th style="width: 250px">Description</th>
                    <th>Photo</th>
                    <th>Store</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @empty(!$product)
                        @foreach ($product as $key=> $pro)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $pro['name'] }}</td>
                            <td>{{ $pro['slug'] }}</td>
                            <td>Rp {{ $pro['price'] }}</td>
                            <td>{{ $pro['description'] }}</td>
                            <td> <a href="{{ asset('img/uploads/'.$pro['photo']) }}" target="blank" rel="noopener noreferrer">Lihat Foto</a> </td>
                            <td>{{ $pro->Store->name }}</td>
                            <td>
                                <a href="/product-edit/{{ $pro['id'] }}">Update</a>
                                <a href="/product-delete/{{ $pro['id'] }}" class="text-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">
                                <div class='text-center'>
                                    Data not found
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </x-card>
    </div>
</x-app-layout>
