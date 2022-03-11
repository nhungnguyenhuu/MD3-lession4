<form action="{{route('note.update', $note->id)}}" method="post">
    @csrf
    <input type="text" name="title" value="{{$note->title}}">
    <input type="text" name="content" value="{{$note->content}}">
    <button>Create</button>
</form>

