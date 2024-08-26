<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatGPT Integration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">ChatGPT Integration</h2>
            <form id="chat-form" class="mt-4">
                <div class="mb-3">
                    <label for="prompt" class="form-label">Enter your prompt:</label>
                    <input type="text" class="form-control" id="prompt" name="prompt" required>
                </div>
                <button type="submit" class="btn btn-primary">Generate</button>
            </form>

            <h2 class="mt-5">Response:</h2>
            <pre id="response" class="bg-light p-3 border rounded"></pre>
        </div>
    </div>
</div>

<!-- Thêm jQuery từ CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#chat-form').on('submit', function(e) {
            e.preventDefault();
            let prompt = $('#prompt').val();

            $.ajax({
                url: '/chat',
                method: 'POST',
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: JSON.stringify({ prompt: prompt }),
                success: function(data) {
                    $('#response').text(data.response);
                }
            });
        });
    });
</script>
</body>
</html>
