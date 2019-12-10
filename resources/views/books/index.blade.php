@extends('layouts.master')
@section('content')
    {{--{{ Breadcrumbs::render('members') }}--}}
    @component('layouts.box')
        @slot('box_title','Danh sách mua vé')
        <table class="table table-striped table-hover" id="newsTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Người mua</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt</th>
                <th>Hình thức</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
        </table>
    @endcomponent
@endsection

@push('footer')
    <script>
        $(function () {
            $('#newsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('books.data')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'total', name: 'total'},
                    {data: 'date_order', name: 'date_order'},
                    {data: 'ship_form', name: 'ship_form'},
                    {data: 'status', name: 'status'},
                    {data: 'actions', name: 'actions'},
                ],
                language: {
                    "lengthMenu": "Hiển thị _MENU_ bản ghi mỗi trang",
                    "zeroRecords": "Không tìm thấy kết quả phù hợp",
                    "info": "Hiển thị trang  _PAGE_ trên tổng _PAGES_",
                    "infoEmpty": "Không có bản ghi phù hợp",
                    "infoFiltered": "(Tổng số kết quả _MAX_ )",
                    "search": "Tìm kiếm:",
                }
            });
        });
    </script>
@endpush