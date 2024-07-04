<!DOCTYPE html>
<html>
<head>
    <title>Laravel Encryption</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Encryption and Decryption of text string</h2>
    <form method="POST" action="{{ route('encrypt') }}">
        @csrf
        <div class="form-group">
            <label for="text">Text to Encrypt:</label>
            <input type="text" class="form-control" id="text" name="text" placeholder="Enter a text or string to encrypt" required>
        </div>
        <button type="submit" class="btn btn-primary">Encrypt</button>
    </form>

    @if (isset($encrypted))
        <div class="mt-3">
            <h4>Encrypted Text:</h4>
            <p>{{ $encrypted }}</p>
        </div>
        <form method="POST" action="{{ route('decrypt') }}">
            @csrf
            <input type="hidden" name="ciphertext" value="{{ $encrypted }}">
            <button type="submit" class="btn btn-secondary">Decrypt</button>
        </form>
    @endif

    @if (isset($decrypted))
        <div class="mt-3">
            <h4>Decrypted Text:</h4>
            <p>{{ $decrypted }}</p>
        </div>
    @endif
</div>
</body>
</html>
