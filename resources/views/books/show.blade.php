@extends('layouts.master')

@section('content')
    @component('layouts.box')
        <section class="content">
            <section class="invoice">
                <form action="" method="POST">
                    <!-- title row -->
                    <div class="row">
                        <a class="btn btn-success" href="{{ route('books.index') }}">Trở về</a>
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i>
                            </h2>
                        </div>
                        <!-- /.col -->
                    </div>

                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            Người mua :
                            <strong>  {{ $book->name }}</strong><br>
                            SĐT :
                            <strong> {{ $book->number_phone }}</strong><br>
                            Email :
                            <strong> {{ $book->email }}</strong><br>
                        </div>

                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Order ID:</b> #{{ $book->id }}<br>
                            <b>Ngày đặt:</b>  {{ date('d-m-Y',strtotime($book->bills->date_order )) }}<br>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <br>
                    <br>
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sự kiện</th>
                                    <th>Số lượn vé đặt</th>
                                    <th>Giá vé</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bill_detail as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->events->name }}</td>
                                        <td>{{ $item->number_of_ticket }}</td>
                                        <td>{{ number_format($item->events->price) }}đ</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                </form>
            </section>
        </section>
    @endcomponent
@endsection