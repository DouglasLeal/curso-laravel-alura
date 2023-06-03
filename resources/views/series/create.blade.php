<x-layout title="Nova Série">
    <form action="/series/salvar" method="post">
        @csrf
        <label class="fw-bold mb-1" for="nome">Nome:</label>
        <input class="form-control mb-3" type="text" id="nome" name="nome">
        <input type="submit" value="Adicionar" class="btn btn-primary w-100">
    </form>
</x-layout>
