# backend-news-aggregator - README
News Aggregator Backend API's

## Prerequisites

To run this project, you must have **git**, **PHP**, **MySql**, and **Composer** installed on your machine. 
Versions on my machine are:

-   **PHP version** 8.2.3
-   **MySql** 8.2.35
-   **composer version** 2.6.6

## Installation & Setup
1. **Clone the Repository**
    ```sh
    git clone git@github.com:babuLBDeans/backend-news-aggregator.git
    cd backend-news-aggregator
    ```

2. **Install Dependencies**
    ```sh
    composer install
    ```

3. **Configure Environment**

    Copy the .env.example file to .env and configure following variables and API keys:
    ```sh
    NEWS_API_URL=https://newsapi.org/v2/everything
    GUARDIAN_API_URL=https://content.guardianapis.com/search
    NEWYORK_TIMES_API_URL=https://api.nytimes.com/svc/search/v2/articlesearch.json

    NEWS_API_KEY=your_newsapi_key
    GUARDIAN_API_KEY=your_guardian_api_key
    NY_TIMES_API_KEY=your_newyork_times_api_key

    NEWS_API_INTERVAL=10  # Fetch interval in minutes

    CATEGORY='sports or election'
    LANGUAGE=en
    PAGE_SIZE=10
    PAGE=1

    NEWS_API_INTERVAL=10
    GUARDIAN_API_INTERVAL=12
    NY_TIMES_INTERVAL=14
    ```

4. **Generate Application Key**
    ```sh
    php artisan key:generate
    ```

5. **Run Migrations**
    ```sh
    php artisan migrate
    ```
6. **Start the Application**
    ```sh
    php artisan serve
    ```

    This will start the server at: http://127.0.0.1:8000

## API Endpoints

1. **Fetch Articles by Category & Author**

    **Endpoints:**
    ```sh
    GET /news?source={source}
    GET /news?source={source}&author={author}
    GET /news?source={source}&author={author}&news_date={news_date}
    ```
    **Note**

    You can try any combination of source, category, author and news_date
