@extends('ecommerce/master')
@section('content')

<!-- Header Inner -->
<div class="header-inner">
	<div class="container">
		<div class="cat-nav-head">
			<div class="row">
				<div class="col-lg-9 col-12">
					<div class="menu-area">
						<!-- Main Menu -->
						<nav class="navbar navbar-expand-lg">
							<div class="navbar-collapse">
								<div class="nav-inner">
									<ul class="nav main-menu menu navbar-nav">
										<li class="active"><a href="#">Home</a></li>
										<li><a href="{{ url('shop')}}">Product</a></li>
										<li><a href="{{ url('order/create')}}">Cart</a></li>
										
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

<!-- Slider Area -->
<section class="hero-slider">
	<!-- Single Slider -->
	<div class="single-slider">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-lg-9 offset-lg-3 col-12">
					<div class="text-inner">
						<div class="row">
							<div class="col-lg-7 col-12">
								<div class="hero-text">
									<h1><span>UP TO 50% OFF </span>Shirt For Man</h1>
									<p>Maboriosam in a nesciung eget magnae <br> dapibus disting tloctio in the find it pereri <br> odiy maboriosm.</p>
									<div class="button">
										<a href="#" class="btn">Shop Now!</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Single Slider -->
</section>
<!--/ End Slider Area -->

<!-- Start Small Banner  -->
<section class="small-banner section">
	<div class="container-fluid">
		<div class="row">
			<!-- Single Banner  -->
			<div class="col-lg-4 col-md-6 col-12">
				<div class="single-banner">
					<img src="https://via.placeholder.com/600x370" alt="#">
					<div class="content">
						<p>Man's Collectons</p>
						<h3>Summer travel <br> collection</h3>
						<a href="#">Discover Now</a>
					</div>
				</div>
			</div>
			<!-- /End Single Banner  -->
			<!-- Single Banner  -->
			<div class="col-lg-4 col-md-6 col-12">
				<div class="single-banner">
					<img src="https://via.placeholder.com/600x370" alt="#">
					<div class="content">
						<p>Bag Collectons</p>
						<h3>Awesome Bag <br> 2020</h3>
						<a href="#">Shop Now</a>
					</div>
				</div>
			</div>
			<!-- /End Single Banner  -->
			<!-- Single Banner  -->
			<div class="col-lg-4 col-12">
				<div class="single-banner tab-height">
					<img src="https://via.placeholder.com/600x370" alt="#">
					<div class="content">
						<p>Flash Sale</p>
						<h3>Mid Season <br> Up to <span>40%</span> Off</h3>
						<a href="#">Discover Now</a>
					</div>
				</div>
			</div>
			<!-- /End Single Banner  -->
		</div>
	</div>
</section>
<!-- End Small Banner -->

<!-- Start Product Area -->
<div class="product-area section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2>Produk Kami</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="product-info">
					<div class="nav-main">
						<!-- Tab Nav -->
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							@foreach($category as $data)
							@if($loop->first)
							<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#{{$data->category}}" role="tab">{{$data->category}}</a></li>
							@else
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#{{$data->category}}" role="tab">{{$data->category}}</a></li>
							@endif
							@endforeach
						</ul>
						<!--/ End Tab Nav -->
					</div>
					<div class="tab-content" id="myTabContent">
						<!-- Start Single Tab -->
						@foreach($category as $kategori)
						@php
						$ifCounter = 0;
						@endphp
						@if($loop->first)
						<div class="tab-pane fade show active" id="{{$kategori->category}}" role="tabpanel">
							@else
							<div class="tab-pane fade show" id="{{$kategori->category}}" role="tabpanel">
								@endif
								<div class="tab-single">
									<div class="row">
										@foreach($product as $data)
										@if($data->category == $kategori->category)
										@php
										$ifCounter += 1;
										@endphp
										<div class="col-xl-3 col-lg-4 col-md-4 col-12">
											<div class="single-product">
												<div class="product-img" style="width:262.5px; height:357.95px">
													<a data-toggle="modal" data-target="#{{$data->product_name}}" title="View" href="#">
														<img class="default-img" src="{{Storage::url('product/'.$data->file_name)}}" alt="#">
														<img class="hover-img" src="{{Storage::url('product/'.$data->file_name)}}" alt="#">
													</a>
													<div class="button-head">
														<div class="product-action">
															<a data-toggle="modal" data-target="#{{$data->product_name}}" title="View" href="#"><i class=" ti-eye"></i><span>Shop</span></a>
														</div>
														<div class="product-action-2">
															<a title="Add to cart" href="#">Add to cart</a>
														</div>
													</div>
												</div>
												<div class="product-content">
													<h3><a data-toggle="modal" data-target="#{{$data->product_name}}" title="View" href="#">{{$data->product_name}}</a></h3>
													<div class=" product-price">
														<span>{{$data->price}}</span>
													</div>
												</div>
											</div>
										</div>
										@endif
										@break ($ifCounter == 10)
										@endforeach
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Product Area -->

	<!-- Start Most Popular -->
	<div class="product-area most-popular section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Produk Terbaru</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="owl-carousel popular-slider">
						@foreach($product as $data)
						<!-- Start Single Product -->
						<div class="single-product">
							<div class="product-img" style="width:262.5px; height:357.95px">
								<a data-toggle="modal" data-target="#{{$data->product_name}}" title="View" href="#">
									<img class="default-img" src="{{Storage::url('product/'.$data->file_name)}}" alt="#">
									<img class="hover-img" src="{{Storage::url('product/'.$data->file_name)}}" alt="#">
									<!-- <span class="out-of-stock">Hot</span> -->
								</a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#{{$data->product_name}}" title="View" href="#"><i class=" ti-eye"></i><span>Shop</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h3><a data-toggle="modal" data-target="#{{$data->product_name}}" title="View" href="#">{{$data->product_name}}</a></h3>
								<div class=" product-price">
									<span>{{$data->price}}</span>
								</div>
							</div>
						</div>
						@break ($loop->iteration == 10)
						<!-- End Single Product -->
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Most Popular Area -->



	<!-- Modal -->
	@foreach($category as $kategori)
	@php
	$ifCounter = 0;
	@endphp
	@foreach($product as $data)
	@if($data->category == $kategori->category)
	@php
	$ifCounter += 1;
	@endphp
	<div class="modal fade" id="{{$data->product_name}}" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
				</div>
				<div class="modal-body">
					<div class="row no-gutters">
						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<!-- Product Slider -->
							<div class="product-gallery">
								<img class="default-img" src="{{Storage::url('product/'.$data->file_name)}}" alt="#">
							</div>
							<!-- End Product slider -->
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="quickview-content">
								<h2>{{$data->product_name}}</h2>
								@if($data->status == "Tidak Habis")
								<div class="quickview-stock">
									<span><i class="fa fa-check-circle-o"></i> in stock</span>
								</div>
								@else
								<div class="quickview-stock">
									<span><i class="fa-regular fa-circle-xmark"></i> stock habis </span>
								</div>
								@endif
								<h3>Rp. {{$data->price}}</h3>
								<div class="quickview-peragraph">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
								</div>

								<form action="{{ route('addProduct.to.cart', $data->id)}}" method="">
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Satuan</h5>
												<select name="satuan">
													<option selected="selected" value="pcs">pcs</option>
													<option value="lusin">lusin</option>
												</select>
											</div>
										</div>
									</div>
									<div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="amount">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="amount" class="input-number" data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="amount">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<button type="submit" class="btn">Add to cart</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif
	@break ($ifCounter == 10)
	@endforeach
	@endforeach
	<!-- Modal end -->
	@endsection