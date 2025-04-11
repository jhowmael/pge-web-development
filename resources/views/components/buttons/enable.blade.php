<form action="{{ route($route, ['id' => $id]) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success" title="{{ $text }}">
        <i class="fa-solid fa-check"></i> {{ $message }}
    </button>
</form>