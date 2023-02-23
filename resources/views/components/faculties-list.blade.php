<table border="1">
    <tr>
        <th>Name</th>
        <th>Delete</th>
    </tr>
    @foreach ($faculties as $faculty)
        <tr>
            <td>{{ $faculty['name'] }}</td>
            <td>
                <button class="delete-button" onclick="deleteFaculty('{{ $faculty['id'] }}')">Delete</button>
            </td>
        </tr>
    @endforeach
</table>
