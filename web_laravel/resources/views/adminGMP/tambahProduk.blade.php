@extends('adminGMP/master')
@section('content')
<div class="home-tab">
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="overview">
            <div class="row">
                <div class="col-lg-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Produk</h4>
                            <p class="card-description">
                                Tambahkan Produk Baru
                            </p>
                            <form class="forms-sample" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="NamaProduk">Nama Produk</label>
                                    <input type="text" class="form-control" id="NamaProduk" placeholder="Nama Produk" name="product_name">
                                </div>
                                <div class="form-group">
                                    <label for="Kategori">Kategori</label>
                                    <input type="text" class="form-control" id="Kategori" placeholder="Kategori" name="category">
                                </div>
                                <div class="form-group">
                                    <label for="Harga">Harga</label>
                                    <input type="number" class="form-control" id="Harga" placeholder="Harga" name="price" step=".01">
                                </div>
                                <div class="form-group">
                                    <label for="InputFile">Gambar Produk</label>
                                    <input type="file" class="form-control" id="file_name" name="file_name">
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
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