@extends('layouts.master')

@section('content')
    @component('layouts.box')
        <section class="content">
            <section class="invoice">
                <form action="{{ route('book.update',$book->id) }}" method="POST">
                {{ @csrf_field() }}
                <!-- title row -->
                    <div class="row">
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
                            Trạng thái:
                            @if( $book->status != 1)
                                <strong>Chưa thanh toán</strong><br>
                            @else
                                <strong>Đã thanh toán</strong><br>
                            @endif

                        </div>

                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Order ID:</b> #{{ $book->id }}<br>
                            <b>Ngày đặt:</b> {{ date('d-m-Y',strtotime($book->bills->date_order )) }}<br>
                            <b>Địa chỉ đặt hàng:</b>  {{ $book->address }}<br>
                            <b>Ghi chú của khách giao hàng:</b>  {{ $book->note }}<br>


                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <h4>Bạn có muốn ship hàng không :</h4>
                    <div id="gender" class="btn-group">
                        <label class="" for="yes">Có</label>
                        <input type="radio" name="status" data-parsley-multiple="yes"
                               {{$book->status == 1 ? 'checked':''}} value="1">

                        <label class="" for="no">Không</label>
                        <input type="radio" name="status"data-parsley-multiple="no"
                               {{$book->status == 0 ? 'checked':''}} value="0">
                    </div>
                    <button type="submit" class="btn btn-danger" style="width: 50%;margin-left: 24%">Lưu lại</button>
                    <br>
                    <br>
                </form>
            </section>
        </section>
    @endcomponent
@endsection