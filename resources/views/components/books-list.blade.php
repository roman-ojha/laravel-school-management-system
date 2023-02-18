<div>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Publication</th>
            <th>Released-On</th>
            <th>No. of pages</th>
            <th>Delete</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book['name'] }}</td>
                <td>{{ $book['publication'] }}</td>
                <td>{{ $book['released_on'] }}</td>
                <td>{{ $book['page'] }}</td>
                <td>
                    <button class="delete-button" onclick="deleteBook('{{ $book['id'] }}')"
                        data-id="{{ $book['id'] }}">Delete</button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
