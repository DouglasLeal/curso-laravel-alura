<form action="{{$action}}" method="post">
    @csrf

    @isset($nome)
        @method('PUT')
    @endisset
    <label class="fw-bold mb-1" for="nome">Nome:</label>
    <input  class="form-control mb-3"
            type="text"
            id="nome"
            name="nome"
            @isset($nome) value="{{$nome}}" @endisset>
    <input type="submit" value="Adicionar" class="btn btn-primary w-100">
</form>
