@foreach (config('master.menu') as $v)
@if($v['child'])
<li class="nav-item">
    <a class="nav-link {{ Request::is($v['route'] . '*') ? 'active' : '' }}" href="#navbar-{{$v['route']}}" data-toggle="collapse" role="button" aria-expanded="{{ Request::is($v['route'] . '*') ? 'true' : 'false' }}" aria-controls="navbar-{{$v['route']}}">
        {!! $v['icon'] !!}
        <span class="nav-link-text font-weight-bold">{{$v['name']}}</span>
    </a>
    <div class="collapse {{ Request::is($v['route'] . '*') ? 'show' : '' }}" id="navbar-{{$v['route']}}">
        <ul class="nav nav-sm flex-column">
            @foreach ($v['child'] as $vv)
            <li class="nav-item pl-3 pr-3 pb-1 pt-1">
                <a style="border-radius: 10px" href="{{url($v['route'] . '/' . $vv['route'])}}" class="nav-link ml-2 font-weight-bold {{ Request::is($v['route'] . '/' . $vv['route'] . '*') ? 'bg-white text-dark' : 'text-white' }}">{{$vv['name']}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</li>
@else
<li class="nav-item">
    <a class="nav-link {{ Request::is($v['route']) ? 'active' : '' }}" href="{{url($v['route'])}}">
        {!! $v['icon'] !!}
        <span class="nav-link-text font-weight-bold">{{$v['name']}}</span>
    </a>
</li>
@endif
@endforeach
