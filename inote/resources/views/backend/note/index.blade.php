
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="{{route('note.create')}}">Create</a>
<a href="{{route('logout')}}">Logout</a>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Content</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($notes as $key=>$note)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$note->title}}</td>
            <td>{{$note->content}}</td>
            <td ><a href="{{route('note.detail', $note->id)}}">Detail</a></td>
            <td ><a href="{{route('note.edit', $note->id)}}">Update</a></td>
            <td ><a onclick="return confirm('Are you sure?')" href="{{route('note.delete', $note->id)}}">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
