@extends('layouts.master')

@section('content')
    {{ Breadcrumbs::render('categories') }}
    @component('layouts.box')

        @slot('box_title','Danh sách tin tức')
        <a class="btn btn-primary" href="{{route('categories.create')}}"><i class="fa fa-plus"></i> Tạo mới</a>
        <table class="table table-striped table-hover" id="newsTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
            </thead>
        </table>
    @endcomponent
@endsection
@push('footer')
    <script>
        $(function() {
            $('#newsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('categories.data')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'},
                ],
                language: {
                    "lengthMenu": "Hiển thị _MENU_ bản ghi mỗi trang",
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