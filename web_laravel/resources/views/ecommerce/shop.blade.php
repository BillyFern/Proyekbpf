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
										<li class="active"><a href="{{ url('shop')}}">Product</a></li>
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

<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="blog-single.html">Shop Grid</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Product Style -->
<section class="product-area shop-sidebar shop section">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-12">
				<form action="{{url('shop')}}" method="GET">
					<div class="shop-sidebar">
						<!-- Single Widget -->
						<div class="single-widget range" style="padding-bottom:60px">
							<h3 class="title">Search Product</h3>
							<div class="price-filter">
								<div class="price-filter-inner">
									<div id="slider-range"></div>
									<div class="price_slider_amount">
										<div class="input-search" style="margin-top: 10px;">
											<input name="product_name" placeholder="Search Products Here....." type="search">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="single-widget category">
							<h3 class="title">Categories</h3>
							<ul class="categor-list">
								@foreach($category as $data)
								<li>
									<label class="checkbox-inline" for="{{$data->category}}">
										<input name="category[]" value="{{$data->category}}" id="{{$data->category}}" type="checkbox">
										<span> {{$data->category}} </span>
									</label>
								</li>
								@endforeach
							</ul>
						</div>
						<!--/ End Single Widget -->
						<!-- Shop By Price -->
						<div class="single-widget range">
							<h3 class="title">Shop by Price</h3>
							<ul class="check-box-list">
								<div class="form-row">
									<div class="form-group col-md-6">
										<label>MIN</label>
										<input type="number" placeholder="Rp.0" class="form-control" name="min_price">
									</div>
									<div class="form-group col-md-6">
										<label>MAX</label>
										<input type="number" placeholder="Rp.0" class="form-control" name="max_price">
									</div>
								</div>

							</ul>
						</div>
						<!--/ End Shop By Price -->
						<div class="single-widget" style="text-align:center">
							<button type="submit" class="btn btn-primary">Filter</button>
						</div>
					</div>
				</form>
			</div>
			<!--END FILTER-->

			<div class="col-lg-9 col-md-8 col-12">
				<div class="row">
					<div class="col-12">
						<!-- Shop Top -->
						<div class="shop-top">
							<div class="shop-shorter">
								<div class="single-shorter">
									<label>Showing {{$product->count()}} products</label>
								</div>
							</div>
							<!--/ End Shop Top -->
						</div>
					</div>
				</div>
				<div class="row">
					@foreach($product as $data)
					<div class="col-lg-4 col-md-8 col-12">
						<div class="single-product">
							<div class="product-img">
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
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Product Style 1  -->

@foreach($product as $data)
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
@endforeach

@endsection