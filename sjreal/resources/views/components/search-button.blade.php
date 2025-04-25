{{-- Componente para hacer busquedas por un identificardor distinto al id --}}
<div class="search-button">
    <form action="{{ route($controller.'.search') }}" method="GET">
        <input type="text" name="{{ $filter }}" placeholder="Buscar por {{ $label }}">
        <input type="submit" value="Buscar">
    </form>
    <!-- He who is contented is rich. - Laozi -->
</div>