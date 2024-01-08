@extends('adminGMP/master')
@section('content')
<div class="home-tab">
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="overview">
            <div class="row">
                <div class="col-lg-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Ubah Produk</h4>
                            <p class="card-description">
                                Mengubah detail atau informasi produk
                            </p>
                            <form class="forms-sample" action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="NamaProduk">Nama Produk</label>
                                    <input type="text" class="form-control" id="NamaProduk" value="{{$product->product_name}}" placeholder="Nama Produk" name="product_name">
                                </div>
                                <div class="form-group">
                                    <label for="Kategori">Kategori</label>
                                    <input type="text" class="form-control" id="Kategori" value="{{$product->category}}" placeholder="Kategori" name="category">
                                </div>
                                <div class="form-group">
                                    <label for="Harga">Harga</label>
                                    <input type="number" class="form-control" id="Harga" value="{{$product->price}}" placeholder="Harga" name="price" step=".01">
                                </div>
                                <div class="form-group">
                                    <label for="InputFile">Gambar Produk</label>
                                    <input type="file" class="form-control" id="file_name" name="file_name">
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Update</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection