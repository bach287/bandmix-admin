{{--<a href="{{route($route.'.show',$id)}}" class="btn btn-primary btn-xs" > <i class="fa fa-eye btn-xs"></i></a>--}}


@if(!isset($type))
    <a href="{{route($route.'.show',$id)}}" class="btn btn-primary btn-xs" > <i class="fa fa-eye btn-xs"></i></a>
    <a href="{{route($route.'.edit',$id)}}" class="btn btn-primary btn-xs" > <i class="fa fa-pencil btn-xs"></i></a>
    <form method="POST" style="display: inline" action="{{route($route.'.destroy',$id)}}">
        @method('DELETE')
        @csrf
        <button  class="btn btn-danger btn-xs btn-delete"> <i class="fa fa-trash"></i></button>
    </form>

@else
    @if(in_array('s', $type))
        <a href="{{route($route.'.show',$id)}}" class="btn btn-primary btn-xs" > <i class="fa fa-eye btn-xs"></i></a>
    @endif

    @if(in_array('e', $type))
        <a href="{{route($route.'.edit',$id)}}" class="btn btn-primary btn-xs" > <i class="fa fa-pencil btn-xs"></i></a>
    @endif
    @if(in_array('d', $type))
        <form method="POST" style="display: inline" action="{{route($route.'.destroy',$id)}}">
            @method('DELETE')
            @csrf
            <button  class="btn btn-danger btn-xs btn-delete"> <i class="fa fa-trash"></i></button>
        </form>

    @endif
@endif
