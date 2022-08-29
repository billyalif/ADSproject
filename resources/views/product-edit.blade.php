<x-app-layout title="Product Data">
    <div class="container">
        <x-card title='Product Data' teks=''>
            <form action = "/product-update/{{ $product->id }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group" >
                  <label style="font-weight:bold">Product Name</label>
                  <input style="margin-top: 5px" type="text" class="form-control" id="name" name="name"  value="{{ $product->name }}">
                </div>

                <div class="form-group" style="padding-top: 20px">
                  <label style="font-weight:bold">Price</label>
                  <input style="margin-top: 5px" type="number" class="form-control" id="price" name="price" value="{{ $product->price}}">
                </div>

                <div class="form-group" style="padding-top: 20px">
                    <label style="font-weight:bold">Description</label>
                    <input style="margin-top: 5px" type="text" class="form-control" id="description" name="description" value="{{ $product->description}}">
                </div>

                {{-- <div class="form-group" style="padding-top: 20px">
                    <label style="font-weight:bold">Product Image</label>
                    <input style="margin-top: 5px" type="file" class="form-control" id="photo" name="photo" placeholder="">
                </div> --}}

                <div class="form-group" style="padding-top: 20px">
                    <label style="font-weight:bold">Store</label>
                    <select class="form-control @error('sup_id') is-invalid @enderror" id="store_id" name="store_id" required>
                            @foreach($store as $v)
                                <option value="{{ $v->id }}" selected >{{ $v->name }}</option>
                            @endforeach
                    </select>

                <button style="margin-top: 20px"type="submit" class="btn btn-primary">Submit</button>
              </form>
        </x-card>
    </div>
</x-app-layout>
