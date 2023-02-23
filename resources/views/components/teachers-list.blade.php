<table border="1">
    <tr>
        <th>Name</th>
        <th>Salary</th>
        <th>Teaches</th>
        <th>Faculties</th>
        <th>Delete</th>
    </tr>
    @foreach ($teachers as $teacher)
        <tr>
            <td>{{ $teacher['name'] }}</td>
            <td>{{ $teacher['salary'] }}</td>
            <td>
                @foreach ($teacher['teaches'] as $teaches)
                    {{ $teaches['name'] }}<br />
                @endforeach
            </td>
            <td>
                @foreach ($teacher['faculties'] as $faculty)
                    {{ $faculty['name'] }}<br />
                @endforeach
            </td>
            <td>
                <button class="delete-button" onclick="deleteTeacher({{ $teacher['id'] }})"
                    data-id="{{ $teacher['id'] }}">Delete</button>
            </td>
        </tr>
    @endforeach
</table>
