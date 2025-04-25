
<div class="overflow-x-auto">
    <table class="table">
        <thead >
            <tr>
                @foreach ($headers as $header)
                    <th class="thead">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $object)
                <tr class="">                
                    @foreach ($properties as $property)
                        <td class="td">{{ $object->$property }}</td>
                    @endforeach                    
                    <td class="td">
                        <a href="{{ route($route.'.edit', [$route => $object->id])}} " class="nav__item">
                            <label for=""></label>
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                        </a>
                    </td>
                    <td class="td">
                        <a href="{{ route($route.'.destroy', [$route => $object->id]) }}" class="nav__item">
                            <label for=""></label>
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
