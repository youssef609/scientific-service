<!DOCTYPE html>
<html>
<head>
    <title>Ask a Question</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Ask a Question</h1>

    <div id="response"></div>

    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="askForm">
        @csrf
        <div>
            <label for="document_id">Select Document:</label>
            <select name="document_id" id="document_id" required>
                @foreach($documents as $document)
                    <option value="{{ $document->id }}">{{ $document->path }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="question">Your Question:</label>
            <textarea name="question" id="question" required></textarea>
        </div>
        <button type="submit">Ask</button>
    </form>

    <script>
        document.getElementById('askForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('{{ route('ask.question') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                let responseDiv = document.getElementById('response');
                responseDiv.innerHTML = `<p>Answer: ${data.answer}</p>`;
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
