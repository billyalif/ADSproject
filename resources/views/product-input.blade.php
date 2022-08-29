<x-app-layout title="Product Data">
    <div class="container">
        <x-card title='Product Data' teks=''>
            <form action = "/product-create" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group" >
                  <label style="font-weight:bold">Product Name</label>
                  <input style="margin-top: 5px" type="text" class="form-control" id="name" name="name"  placeholder="Enter products name">
                </div>

                <div class="form-group" style="padding-top: 20px">
                  <label style="font-weight:bold">Price</label>
                  <input style="margin-top: 5px" type="number" class="form-control" id="price" name="price" placeholder="Price in Rupiah">
                </div>

                <div class="form-group" style="padding-top: 20px">
                    <label style="font-weight:bold">Description</label>
                    <input style="margin-top: 5px" type="text" class="form-control" id="description" name="description" placeholder="Description">
                </div>

                <div class="form-group" style="padding-top: 20px">
                    <label style="font-weight:bold">Product Image</label>
                    <input style="margin-top: 5px" type="file" class="form-control" id="photo" name="photo" placeholder="">
                </div>

                <div class="form-group" style="padding-top: 20px">
                    <label style="font-weight:bold">Store</label>
                    <select class="form-control @error('sup_id') is-invalid @enderror" id="store_id" name="store_id" required>
                            @foreach($store as $v)
                                <option value="" disabled selected hidden> Select Store </option>
                                <option value="{{ $v->id }}">{{ $v->name }}</option>
                            @endforeach
                    </select>

                <button style="margin-top: 20px"type="submit" class="btn btn-primary">Submit</button>
              </form>
        </x-card>
    </div>
</x-app-layout>
