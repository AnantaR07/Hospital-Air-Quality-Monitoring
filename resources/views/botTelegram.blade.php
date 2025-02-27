<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bot Telegram</title>
    <link rel="icon" href="img/logo_RSUD_soedomo_trenggalek.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Send Message to Telegram Bot</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('sendMessage') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="chat_id">Chat ID</label>
                <input type="text" name="chat_id" class="form-control" placeholder="Enter Chat ID" required>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" class="form-control" rows="3" placeholder="Enter your message" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
