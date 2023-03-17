<table border="1">
    <tr>
        <th>Name</th>
        <th>Roll</th>
        <th>Batch</th>
        <th>Faculty</th>
        <th>Borrowed Books</th>
        <th>Delete</th>
    </tr>
    @foreach ($library_students as $library_student)
        <tr>
            <td>{{ $library_student['user']['name'] }}</td>
            <td>{{ $library_student['roll'] }}</td>
            <td>{{ $library_student['batch'] }}</td>
            <td>{{ $library_student['faculty']['name'] }}</td>
            <td>
                @foreach ($library_student['library'] as $library)
                    <p>{{ $library['book']['name'] }}</p>
                @endforeach
            </td>
            <td>
                @foreach ($library_student['library'] as $library)
                    <button class="delete-button"
                        onclick="deleteStudentRecord({{ $library['pivot']['id'] }})">Delete</button><br />
                @endforeach
            </td>
        </tr>
    @endforeach
</table>
