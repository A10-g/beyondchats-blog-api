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

beyondchats-blog-api/
├── app/
├── bootstrap/
├── config/
├── database/
├── routes/
│ ├── api.php
│ └── web.php
├── scraper/
│ └── scrape.php
├── storage/
├── tests/
├── vendor/
├── README.md
├── .env.example
├── composer.json
├── composer.lock
└── artisan


---

## ⚙️ Setup Instructions

### 1️⃣ Clone the Repository
```bash
git clone <your-repository-url>
cd beyondchats-blog-api

### Install Dependencies

composer install

## Environment Configuration
cp .env.example .env
