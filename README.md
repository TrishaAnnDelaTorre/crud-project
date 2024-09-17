# CRUD Project

## Overview

This project is a CRUD (Create, Read, Update, Delete) application built using Laravel. It allows users to manage meeting records with functionalities to create, view, update, and delete meeting entries.

### Technologies Used

- **Programming Language:** PHP
- **Framework:** Laravel
- **Database:** MySQL
- **Front-End:** Custom CSS
- **Version Control:** Git

## Installation

### Prerequisites

- PHP 7.4 or higher
- Composer
- MySQL

### Steps to Set Up Locally

1. **Clone the Repository**
   ```bash
   git clone https://github.com/YourUsername/crud-project.git

2. **Clone the Repository**

    cd crud-project

3. **Install Dependencies**
    composer install

4. **Set Up the Database Update the .env file with your database credentials:**
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=crud_db
    DB_USERNAME=root
    DB_PASSWORD=

5. **Run Migrations**
    php artisan migrate

6. **Start the Development Server**
    php artisan serve

Visit http://localhost:8000 in your browser to access the application.




### 2. **Approach**

## Project Structure

- **Front-End:** 
  - Uses Custom CSSS for responsive design and styling.
  - Layout files are stored in `resources/views/layouts`.
- **Back-End:**
  - Built with Laravel, utilizing MVC (Model-View-Controller) architecture.
  - Controllers are located in `app/Http/MeetingController`.
  - Models are in `app/Models`, including the `Meeting` model.
- **Database:**
  - The `meetings` table is used to store meeting records.
  - Migrations are located in `database/migrations`.

## Design Decisions

- **Architecture:** Adopted the MVC pattern for separation of concerns and maintainability.
- **Technology Choices:** Laravel was chosen for its robust feature set and ease of use.
- **Data Modeling:** Simple data structure with `title`, `description`, and `meeting_date`.

## Special Considerations

- **Performance Optimization:** Used Eloquent ORM for efficient database interactions.
- **Security Measures:** Implemented basic validation and sanitation of user inputs.
- **Scalability:** Designed with scalability in mind, leveraging Laravel’s built-in features for future growth.