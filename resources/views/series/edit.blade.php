<x-layout title="Editar Série '{{$serie->nome}}'">
    <x-series.form :action="route('series.update', $serie)" :nome="$serie->nome" />
</x-layout>
