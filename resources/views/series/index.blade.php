<x-layout title="Séries">

    @isset($mensagemSucesso)
    <p class="alert alert-success">
        {{$mensagemSucesso}}
    </p>
    @endisset

<ul class="list-group">
    @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">{{$serie->nome}}

            <span class="d-flex g-3">
                <a href="{{route('series.edit', $serie->id)}}" class="btn btn-warning">
                    Editar
                </a>

                <form class="ms-3" action="{{route('series.destroy', $serie->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger" value="Excluir" type="submit">
                </form>
            </span>
        </li>


    @endforeach
</ul>
</x-layout>
