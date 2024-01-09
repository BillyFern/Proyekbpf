@extends('ecommerce/master')
@section('content')
<!-- End Topbar -->
<!-- Header Inner -->
<div class="header-inner">
    <div class="container">
        <div class="cat-nav-head">
            <div class="row">
                <div class="col-12">
                    <div class="menu-area">
                        <!-- Main Menu -->
                        <nav class="navbar navbar-expand-lg">
                            <div class="navbar-collapse">
                                <div class="nav-inner">
                                    <ul class="nav main-menu menu navbar-nav">
                                        <li><a href="{{ url('\\')}}">Home</a></li>
                                        <li><a href="{{ url('shop')}}">Product</a></li>
                                        <li class="active"><a href="{{ url('order/create')}}">Cart</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <!--/ End Main Menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ End Header Inner -->
</header>
<!--/ End Header -->

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->
                <table class="table shopping-summery">
                    <thead>
                        <tr class="main-hading">
                            <th>PRODUK</th>
                            <th>NAMA PRODUK</th>
                            <th class="text-center">HARGA SATUAN</th>
                            <th class="text-center">JUMLAH</th>
                            <th class="text-center">SATUAN</th>
                            <th class="text-center">HARGA TOTAL</th>
                            <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $AllPrice = 0;
                        @endphp
                        @if(session('cart'))
                        @foreach(session('cart') as $id => $data)
                        <tr rowId={{$id}}>
                            <td class="image" data-title="No"><img src="{{ Storage::url('product/'.$data['file_name'])}}" alt="#"></td>
                            <td class="product-des" data-title="Description">
                                <p class="product-name"><a href="#">{{$data['product_name']}}</a></p>
                            </td>
                            <td class="price" data-title="Price"><span>{{$data['price']}}</span></td>
                            <td class="total-amount" data-title="Amount"><span>{{$data['amount']}}</span></td>
                            <td class="total-amount" data-title="Satuan"><span>{{$data['satuan']}}</span></td>
                            <td class="total-amount" data-title="Total"><span>Rp. {{$data['total_price']}}</span></td>
                            <td class="action">
                                <a class="delete-product"><i class="ti-trash remove-icon"></i></a>
                            </td>
                        </tr>
                        @php
                        $AllPrice += $data['total_price'];
                        @endphp
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <!--/ End Shopping Summery -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <form action="{{ route('order.addOrder', $AllPrice) }}" style="width:100%" method="POST">
                            @csrf
                            <div class="col-lg-8 col-md-5 col-12" style="float:left;">
                                <div class="form-row">
                                    <div class="form-col col-md-4">
                                        <label>Nama Retailer:</label>
                                        <input type="text" placeholder="Nama Pemesan.." class="form-control input-lg" name="retailer_name" required>
                                    </div>
                                    <div class="form-col col-md-4">
                                        <label>No-Telepon</label>
                                        <input type="number" placeholder="123456789000" class="form-control input-lg" name="phone_number" required>
                                    </div>
                                    <div class="form-col col-md-4">
                                        <label>Alamat Retail</label>
                                        <input type="text" placeholder="Alamat.." class="form-control input-lg" name="address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7 col-12" style="float:right;">
                                <div class="right">
                                    <ul>
                                        <li class="last">You Pay<span>Rp. {{$AllPrice}}</span></li>
                                    </ul>
                                    <div class="button5">
                                        <button type="submit" class="btn">Checkout</button>
                                        <a href="{{ url('shop')}}" class="btn">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>
<!--/ End Shopping Cart -->


<!-- Start Footer Area -->
@endsection

@section('js')


<script type="text/javascript">
    $(".delete-product").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Do you really want to delete?")) {
            $.ajax({
                url: "{{ route('delete.cart.product') }}",
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection