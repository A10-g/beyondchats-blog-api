# BeyondChats Blog Scraper & REST API (Laravel)

## 📌 Overview
This project scrapes the **5 oldest blog articles** from the BeyondChats website,
stores them in a **MySQL database**, and exposes **RESTful CRUD APIs** using **Laravel**.

The application demonstrates:
- Web scraping with Guzzle and Symfony DomCrawler
- Data persistence using MySQL
- REST API development with Laravel
- Handling real-world edge cases such as HTML structure differences and routing configuration in Laravel 12

---

## 🛠 Tech Stack
- PHP 8.2+
- Laravel 12
- MySQL
- Guzzle HTTP Client
- Symfony DomCrawler
- Postman (for API testing)

---
## 📂 Project Structure

```text
beyondchats-blog-api/
├── app/
├── bootstrap/
├── config/
├── database/
├── routes/
│   ├── api.php
│   └── web.php
├── scraper/
│   └── scrape.php
├── storage/
├── tests/
├── vendor/
├── README.md
├── .env.example
├── composer.json
├── composer.lock
└── artisan

```

---

## ⚙️ Setup Instructions

1️⃣ Clone the Repository
```bash
git clone <your-repository-url>
cd beyondchats-blog-api
```
2️⃣ Install Dependencies
```bash
composer install
```
3️⃣ Environment Configuration
```bash
cp .env.example .env
```

## Update database credentials in .env:
```text
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=beyondchats
DB_USERNAME=root
DB_PASSWORD=
```

Adjust DB_PORT, username, or password based on your local MySQL setup.

4️⃣ Generate Application Key
```bash
php artisan key:generate
```

5️⃣ Run Database Migrations
```bash
php artisan migrate
```

6️⃣ Scrape BeyondChats Blog Articles
```bash
php scraper/scrape.php
```

7️⃣ Start the Laravel Server
```bash
php artisan serve
```

Application will be available at:
```text
http://127.0.0.1:8000

```
