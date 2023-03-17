<table border="1">
    <tr>
        <th>Roll</th>
        <th>Name</th>
        <th>Email</th>
        <th>Batch</th>
        <th>Faculty</th>
        <th>Delete</th>
    </tr>
    @foreach ($students as $student)
        <tr>
            <td>{{ $student['roll'] }}</td>
            <td>{{ $student['user']['name'] }}</td>
            <td>{{ $student['user']['email'] }}</td>
            <td>{{ $student['batch'] }}</td>
            <td>{{ $student['faculty']['name'] }}</td>
            <td>
                <button class="delete-button" onclick="deleteStudent('{{ $student['id'] }}')"
                    data-id="{{ $student['id'] }}">Delete</button>
            </td>
        </tr>
    @endforeach
</table>
