@extends('adminGMP/master')
@section('content')
<div class="home-tab">
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="overview">
            <div class="row">
                <div class="col-lg-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tabel Order</h4>
                            <div class="table-responsive">
                                <table class="table table-hover" id="table-order">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Harga Satuan</th>
                                            <th>Jumlah</th>
                                            <th>Satuan</th>
                                            <th>Harga Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 0;
                                        $totalSeluruh = 0;
                                        @endphp
                                        @foreach($orders as $data)
                                        <tr>
                                            <td>{{$products[$i]->product_name}}</td>
                                            <td>Rp. {{$products[$i]->price}}</td>
                                            <td>{{$data->amount}}</td>
                                            <td>{{$data->satuan}}</td>
                                            @if($data->satuan == 'lusin')
                                            @php
                                            $total = $products[$i]->price * $data->amount * 12;
                                            $totalSeluruh += $total;
                                            @endphp
                                            @else
                                            @php
                                            $total = $products[$i]->price * $data->amount;
                                            $totalSeluruh += $total;
                                            @endphp
                                            @endif
                                            <td>Rp. {{$total}}</td>
                                        </tr>
                                        @php
                                        $i++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total:</td>
                                            <td>Rp. {{$totalSeluruh}}</td>
                                        </tr>
                                    </tfoot>
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
@section('js')
<script>
    $(function() {
        $("#table-order").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#table-order_wrapper .col-md-6:eq(0)');
        
    });
</script>