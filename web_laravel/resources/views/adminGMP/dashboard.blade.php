@extends('adminGMP/master')
@section('content')

@if(session()->has('success'))
<div class="alert alert-primary">
    {{session()->get('success')}}
</div>
@endif
<div class="home-tab">
    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Order</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#Produk" role="tab" aria-selected="false">Produk</a>
            </li>
        </ul>
    </div>
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <!-- <div class="row">
                <div class="col-sm-12">
                    <div class="statistics-details d-flex align-items-center justify-content-between">
                        <div>
                            <p class="statistics-title">Bounce Rate</p>
                            <h3 class="rate-percentage">32.53%</h3>
                            <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                        </div>
                        <div>
                            <p class="statistics-title">Page Views</p>
                            <h3 class="rate-percentage">7,682</h3>
                            <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                        </div>
                        <div>
                            <p class="statistics-title">New Sessions</p>
                            <h3 class="rate-percentage">68.8</h3>
                            <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                        </div>
                        <div class="d-none d-md-block">
                            <p class="statistics-title">Avg. Time on Site</p>
                            <h3 class="rate-percentage">2m:35s</h3>
                            <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                        </div>
                        <div class="d-none d-md-block">
                            <p class="statistics-title">New Sessions</p>
                            <h3 class="rate-percentage">68.8</h3>
                            <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                        </div>
                        <div class="d-none d-md-block">
                            <p class="statistics-title">Avg. Time on Site</p>
                            <h3 class="rate-percentage">2m:35s</h3>
                            <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="tab-pane fade show" id="Orders" role="tabpanel" aria-labelledby="Orders">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tabel Order</h4>
                                <p class="card-description">
                                    Add class <code>.table-hover</code>
                                </p>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="table-order">
                                        <thead>
                                            <tr>
                                                <th>Retailer</th>
                                                <th>Total Order</th>
                                                <th>No Telepon</th>
                                                <th>Status</th>
                                                <th>Lihat Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order as $data)
                                            <tr>
                                                <td>{{$data->retailers_name}}</td>
                                                <td>{{$data->total_price}}</td>
                                                <td>{{$data->phone_number}}</td>
                                                <td>{{$data->status}}</td>
                                                @csrf
                                                <td><a href="{{url('order/detail', $data->id)}}"><i class="fa-regular fa-eye"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade show" id="Produk" role="tabpanel" aria-labelledby="Produk">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tabel Produk</h4>
                            <p class="card-description">
                                Add class <code>.table-hover</code>
                            </p>
                            <a href="{{route('product.create')}}" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i> Tambah Produk</a>
                            <div class="table-responsive">
                                <table class="table table-hover" id="table-product">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Gambar</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product as $data)
                                        <tr>
                                            <td>{{ $data->product_name }}</td>
                                            <td>{{ $data->category }}</td>
                                            <td>{{ $data->price }}</td>
                                            <td>
                                                <a href="{{Storage::url('product/'.$data->file_name)}}">
                                                    <img class="img-sm rounded-10" src="{{Storage::url('product/'.$data->file_name)}}">
                                                </a>
                                            </td>
                                            @if($data->status == 'Habis')
                                            <td class="text-danger"> {{$data->status}} </td>
                                            @else
                                            <td> {{$data->status}} </td>
                                            @endif
                                            <td>
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('product.destroy', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>
                                                </form>
                                                <a href="{{ route('product.edit', $data->id) }}" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection