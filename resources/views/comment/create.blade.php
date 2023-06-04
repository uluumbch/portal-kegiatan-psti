<form action="{{ route('comment.store') }}" method="POST">
    @csrf
    <input type="hidden" name="post_slug" value="{{$kegiatan->slug}}">
    <div>
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="isi">Komentar:</label>
        <textarea name="isi" id="isi" required></textarea>
    </div>


    <button type="submit">Kirim Komentar</button>
</form>
