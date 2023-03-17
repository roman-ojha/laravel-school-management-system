<table border="1">
    <tr>
        <th>Book</th>
        <th>Quantity</th>
        <th>Remaining</th>
        <th>Delete</th>
    </tr>
    @foreach ($book_self as $book)
        <tr>
            <td>{{ $book['book']['name'] }}</td>
            <td>{{ $book['quantity'] }}</td>
            <td>{{ $book['remaining'] }}</td>
            <td>
                <button type="button" class="delete-button" onclick="deleteBook({{ $book['id'] }})">Delete</button>
            </td>
        </tr>
    @endforeach
</table>
