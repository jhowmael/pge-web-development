<form action="{{ route($route, $parameters) }}" method="GET">
    <button type="submit" class="btn btn-success" title="{{ $text }}">
        <i class="fa-solid fa-forward"></i>  {{ $text }}
    </button>
</form>
