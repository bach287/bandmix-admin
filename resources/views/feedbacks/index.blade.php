@extends('layouts.master')
@section('content')
    {{--{{ Breadcrumbs::render('event') }}--}}
    @component('layouts.box')
        @slot('box_title','Danh sách sự kiện')
        <table class="table table-striped table-hover" id="eventsTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Tiêu đề</th>
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
                ajax: '{{route('feedback.data')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'guest_name', name: 'guest_name'},
                    {data: 'email', name: 'email'},
                    {data: 'feedback_title', name: 'feedback_title'},
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
