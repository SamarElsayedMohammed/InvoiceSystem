
@props(['type' =>'success'])
@if (session()->has($type))
            <div class="col-8 alert alert-{{$type}}">
                {{ session($type) }}
            </div>
@endif
