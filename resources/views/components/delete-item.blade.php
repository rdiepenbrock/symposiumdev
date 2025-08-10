<form method="POST" action="{{ $route }}">
    @csrf
    @method('DELETE')

    <a href="#"
       class="text-sm/6 font-semibold text-gray-900 hover:underline"
       onclick="event.preventDefault();
       this.closest('form').submit();">
        {{ $text }}
    </a>
</form>
