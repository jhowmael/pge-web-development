<form action="{{ route($route, ['id' => $id]) }}" method="GET">
    <button type="submit" class="btn btn-secondary" title="{{ $text }}">
        <i class="fa-solid fa-pencil-alt"></i> {{ $message }}
    </button>
</form>
