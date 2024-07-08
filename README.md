# Laravel Telegram Messenger Bot Project

This is a Laravel project that integrates with the Telegram Bot API to send and receive messages.

## Prerequisites

- PHP 7.3 or higher
- Composer
- MySQL
- Terminal / Bash
- Laravel 8.x or higher
- Open Server Panel (recommended)

## Installation

1. **Clone the repository:**

    ```
    Download ZIP file of the project via this link:  
    Extract the file and open it on VScode (recommended)
    ```

2. **Install dependencies:**

    ```
    composer install: https://getcomposer.org/download/
    ```

3. **Save the `laravel.sql` file from `\database\laravel.sql`:**

    ```
    Import the sql file via PhpMyAdmin;
    ```

4. **Generate the code**

    ```bash
    php artisan serve
    ```

5. **Set up a tunnel**

    - Put the link on terminal: **ssh -R 80:localhost:8000 serveo.net**

6. **Configure webhook**

    - Insert the new link taken from Serveo.net and start on new terminal:
    **curl -F "url=<PUBLIC_URL_SERVEO>/webhook/path" "https://api.telegram.org/bot7485923716:AAENIvrkYNBseZM8w5jNyl3ylbJQp3fLW2M/setWebhook"**


7. **Run the Telegram bot and the web page provided by Serveo.net service:**

    ```
    - https://t.me/messengerbek_bot

    ```

## Usage

1. Open the application in your browser.
2. Send messages from the web interface.
3. Check your Telegram bot for incoming messages.
4. Reply to messages from the Telegram bot, and they will appear on the web interface.

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License


