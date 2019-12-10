@extends('layouts.master')
@section('content')
    {{--{{ Breadcrumbs::render('event') }}--}}
    @component('layouts.box')
        @slot('box_title','Danh sách sự kiện')
        <table class="table table-striped table-hover" id="eventsTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên sự kiện</th>
                <th>Ảnh đại diện</th>
                <th>Mô tả</th>
                <th>Giá vé</th>
                <th>Số lượng vé</th>
                <th>Trạng thái</th>
                <th>Người tạo</th>
                <th>Thao tác</th>
            </tr>
            </thead>
        </table>
    @endcomponent
@endsection

@push('footer')
    <script>
        $(function() {
            $('#eventsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('events.data')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'avatar', name: 'avatar'},
                    {data: 'description', name: 'description'},
                    {data: 'price', name: 'price'},
                    {data: 'vacancy', name: 'vacancy'},
                    {data: 'status', name: 'status'},
                    {data: 'member',name:'member'},
                    {data: 'actions', name: 'actions'},
                ],
                language: {
                    "lengthMenu": "Hiển thị _MENU_ bản ghi " +
                        "mỗi trang",
                    "zeroRecords": "Không tìm thấy kết quả phù hợp",
                    "info": "Hiển thị trang  _PAGE_ trên tổng _PAGES_",
                    "infoEmpty": "Không có bản ghi phù hợp",
                    "infoFiltered": "(Tổng số kết quả _MAX_ )",
                    "search":"Tìm kiếm:",
                }
            });
        });
    </script>
@endpush
