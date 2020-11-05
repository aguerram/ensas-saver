@foreach($filieres as $key=>$fil)
    <a class="card" href="/notes/{{$year}}/?filiere={{$key}}">
                        <span
                            class="focus:bg-gray-400 inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                            {{$fil}}
                        </span>
    </a>
@endforeach
