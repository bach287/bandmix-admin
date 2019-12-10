@if($type = 'news')
    <img src="{{$avatar}}" style="max-width: 100px" alt="Ảnh đại diện">
@else
    <img src="{{$avatar}}" style="width: 60px;height: 60px" class="img-circle" alt="Ảnh đại diện">
@endif
