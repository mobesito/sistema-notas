@props(['active' => false])
<li class="nav-item">
    <a
        class="{{$active ? 'nav-link active' : 'nav-link text-white'}}"
        aria-current="{{$active ? 'current' : 'false'}}" {{$attributes}}
        >
      {{$slot}}
    </a>
</li>
