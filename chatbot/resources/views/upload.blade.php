<!DOCTYPE html>
<html>
<head>
    <title>Upload Document</title>
</head>
<body>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <form action="{{ route('upload.document') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="document">Upload Document:</label>
        <input type="file" name="document" id="document" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
