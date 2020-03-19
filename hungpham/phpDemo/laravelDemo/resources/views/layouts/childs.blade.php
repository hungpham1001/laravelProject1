<ul>
    @foreach($childs as $child)
        <li>{{$child->categories}}</li>
        @if(count($child->childs))
            @include('layouts.childs',['childs'=>$child->childs])
        @endif
    @endforeach
</ul>