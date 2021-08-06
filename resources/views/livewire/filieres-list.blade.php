@foreach($filieres as $key=>$fil)
    @php
        $disable = date('Y') === '2021' && $key === 'I';
        $bg = $disable ?'bg-red-200':'bg-gray-200';
        $link = $disable?'#':"/notes/$year/?filiere=$key"
    @endphp
    <a @if($disable) disabled @endif class="card" href="{{$link}}">
    <span
        class="focus:bg-gray-400 inline-block {{$bg}} rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
        {{$fil}}
    </span>
    </a>
@endforeach
