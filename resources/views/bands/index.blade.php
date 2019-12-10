@extends('layouts.master')
@section('content')
    {{ Breadcrumbs::render('bands') }}
    @component('layouts.box')
        @slot('box_title','Danh sách bands')
        <table class="table table-striped table-hover" id="newsTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh đại diện</th>
                <th>Tên Band</th>
                <th>Người tạo</th>
                <th>Xác minh</th>
                <th>Ngày tạo</th>
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
                ajax: '{{route('bands.data')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'avatar', name: 'avatar'},
                    {data: 'name', name: 'name'},
                    {data: 'member',name:'member'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
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