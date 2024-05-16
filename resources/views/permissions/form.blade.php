<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th>Module</th>
            <th>Permissions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($available_permissions as $key => $values)
            <tr>
                <td style="width: 20%;">{{ ucfirst($key) }}</td>
                <td>
                    @foreach($values as $value)
                        <p class="m-0">
                            <input id="{{ "{$key}_{$value}" }}"
                                type="checkbox" 
                                value="1"
                                {{ in_array("{$key}_{$value}", $permissions) ? "checked=true" : "" }}
                                name="{{ "{$key}_{$value}" }}" />
                            <span>&nbsp;{{ ucwords($value) }}</span> 
                        </p>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>

</table>