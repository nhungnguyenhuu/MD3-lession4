<form action="{{route('note.store')}}" method="post">
    @csrf
    <input type="text" name="title" placeholder="title">
    <input type="text" name="content" placeholder="content">
    <button>Create</button>
</form>
