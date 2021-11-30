<table>
    <thead>
        <th>STT</th>
        <th>ID</th>
        <th>Name</th>
        <th>
            <a href="{{route('category.add')}}">Add new</a>
        </th>
    </thead>
    <tbody>
        @foreach ($categories as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <a href="{{route('category.edit', ['id' => $item->id])}}">Edit</a>
                    <a href="{{route('category.remove', ['id' => $item->id])}}" onClick="return confirm('Bạn muốn xóa chứ?');">Remove</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>