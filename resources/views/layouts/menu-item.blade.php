@if (is_string($item))
<li class="nav-section">
  <span class="sidebar-mini-icon">
    <i class="fa fa-ellipsis-h"></i>
  </span>
  <h4 class="text-section">{{$item}}</h4>
</li>
@else
    <li class="nav-item parent{{ isset($item['url'])? (request()->is($item['url']) ? 'active' : '') .' '.
                        (( request()->path() == '/' && $item['url'] == '' )? 'active' : '')  : ''  }} ">

      <a @if(isset($item['submenu']))data-toggle="collapse" @endif
         @if(isset($item['submenu']))href="#{{preg_replace('/\s+/', '', $item['text'])}}"
         @elseif(isset($item['url']))href="/{{$item['url']}}"
         @else href="#" @endif class="has-link">
        <i class="fas fa-{{ (isset($item['icon']))?$item['icon']: 'circle-o' }}"></i>
        <span>{{ $item['text'] }}</span>
        <span class="{{(isset($item['submenu']))? 'caret': ''}}"></span>
      </a>
      <div class="collapse" id="{{ preg_replace('/\s+/', '', $item['text']) }}">
        @if(isset($item['submenu']))
            <ul class="nav nav-collapse">
              @foreach ($item['submenu'] as $item)
                <li class="{{ isset($item['url'])? (request()->is($item['url']) ? 'active' : '') : ''}}">
                  <a href="/{{$item['url']}}">
                    <span class="sub-item">{{$item['text']}}</span>
                  </a>
                </li>

              @endforeach
            </ul>
        @endif
      </div>
    </li>
@endif
