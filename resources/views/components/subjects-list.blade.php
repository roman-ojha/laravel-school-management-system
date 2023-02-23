<table border="1">
    <tr>
        <th>Name</th>
        <th>Delete</th>
    </tr>
    @foreach ($subjects as $subject)
        <tr>
            <td>{{ $subject['name'] }}</td>
            <td>
                <button class="delete-button" onclick="deleteSubject({{ $subject['id'] }})"">Delete</button>
            </td>
        </tr>
    @endforeach
</table>
