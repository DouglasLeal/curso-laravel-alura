<x-layout title="Séries">

    @isset($mensagemSucesso)
    <p class="alert alert-success">
        {{$mensagemSucesso}}
    </p>
    @endisset

<ul class="list-group">
    @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">{{$serie->nome}}

            <form class="ms-3" action="{{route('series.destroy', $serie->id)}}" method="post">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger" value="X" type="submit">
            </form>
        </li>


    @endforeach
</ul>
</x-layout>
