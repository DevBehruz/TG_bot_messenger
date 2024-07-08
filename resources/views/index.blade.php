<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MessageMe</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ '/style.css' }}">

    <style>
        .app {
            width: 100%; /* Full width for responsiveness */
            max-width: 800px; /* Limit maximum width for readability */
            margin: auto; /* Center align */
            padding: 10px; /* Add padding for better spacing */
        }
        .msgcard {
            border: none; /* Remove border from card */
        }
        .textarea {
            resize: none; /* Disable textarea resizing */
        }
    </style>

</head>
<body>
    <div class="app">
        <div class="card my-5 msgcard">
            <div class="card-body">
                <div class="container-fluid">
                  
                <div id="messages_container" class="chat-log">
                    @foreach($messages as $message)
                        @if($message->incoming == 0)
                            <!-- Sent messages -->
                            <div class="chat-log_item chat-log_item-own z-depth-0">
                                <hr class="my-1 py-0 col-8" style="opacity: 0.5">
                                <div class="chat-log_message">
                                    <p>{{ $message->content }}</p>
                                </div>
                                <hr class="my-1 py-0 col-8" style="opacity: 0.5">
                                <div class="row chat-log_time m-0 p-0 justify-content-end">
                                    {{ $message->created_at }}
                                </div>
                            </div>
                        @else
                            <!-- Received messages -->
                            <div class="chat-log_item chat-log_item z-depth-0">
                                <hr class="my-1 py-0 col-8" style="opacity: 0.5">
                                <div class="chat-log_message">
                                    <p>{{ $message->content }}</p>
                                </div>
                                <hr class="my-1 py-0 col-8" style="opacity: 0.5">
                                <div class="row chat-log_time m-0 p-0 justify-content-start">
                                    {{ $message->created_at }}
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                </div>

                <form action="/send_message" method="POST">
                    @csrf
                    <div class="card-footer border-0 bottom-rounded z-depth-0" style="background-color: #97E3C2">
                        <div class="row">
                            <div class="col-12 col-md-9 my-2">
                                <textarea rows="2" id="content" name="content" placeholder="Type your message here!" class="form-control textarea resize-ta"></textarea>
                            </div>
                            <div class="col-12 col-md-3 my-2 d-flex justify-content-md-end">
                                <input type="hidden" name="chat_id" value="{{ $latestChatId }}">    
                                <button type="submit" class="btn btn-success"><i class="bi bi-send-fill"></i> Send</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js" integrity="sha384-QGVvH/YhA+kwEewo7hEihpex/xcTkAx8V6UEfV8JlPbpGtnJ5rELNHpNwJYXDjH3" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-5rS+STkA7G8t1Mzr4tRwvoF9ETLC2F7/Z4hQR9DH7J5gi/6FfYnJj5gkFvfBLYmm" crossorigin="anonymous"></script>
    <script src="{{ asset('/script.js') }}"></script>
</body>
</html>
