<form action="{{ route($route, ['id' => $id]) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger" title="{{ $text }}">
        <i class="fa-solid fa-ban"></i> {{ $message }}
    </button>
</form>