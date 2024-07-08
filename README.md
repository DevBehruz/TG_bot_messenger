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

    ```bash
    git clone (https://github.com/DevBehruz/TG_bot_messenger.git)
    cd TG_bot_messenger
    ```

2. **Install dependencies:**

    ```bash
    composer install
    ```

3. **Copy the `.env.example` file to `.env`:**

    ```bash
    cp .env.example .env
    ```
4. **Set up your database:**
    Update the `.env` file with your database credentials:
     ```env
    
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=your_database_name
      DB_USERNAME=your_username
      DB_PASSWORD=your_password

    ```

5. **Run the migrations the database:**

    ```bash
    php artisan migrate
    ```
    
6. **Set up a tunnel**

    ```bash
   ssh -R 80:localhost:8000 serveo.net
    ```

7. **Configure the webhook**

    ```bash
   curl -F "url=<PUBLIC_URL>/webhook/path"         
   "https://api.telegram.org/bot7485923716:AAENIvrkYNBseZM8w5jNyl3ylbJQp3fLW2M/setWebhook"
    ```


8. **Run the Telegram bot**

    
    - https://t.me/messengerbek_bot

    

## Usage

1. Open the application in your browser.
2. Send messages from the web interface.
3. Check your Telegram bot for incoming messages.
4. Reply to messages from the Telegram bot, and they will appear on the web interface.

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.



