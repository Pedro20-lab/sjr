
<div class="overflow-x-auto">
    <table class="table-auto border-collapse border border-gray-300 w-full text-sm text-left text-gray-700">
        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
            <tr>
                @foreach ($headers as $header)
                    <th class="border border-gray-300 px-4 py-2">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $object)
                <tr class="hover:bg-gray-50">                
                    @foreach ($properties as $property)
                        <td class="border border-gray-300 px-4 py-2">{{ $object->$property }}</td>
                    @endforeach                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
