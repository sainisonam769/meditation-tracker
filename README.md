# Meditation Tracker

This is a simple web application built using Laravel where users can register, log in, and track their meditation sessions.

##  What this project does

- Users can create an account and log in  
- Users can add their meditation sessions  
- Users can view, edit, and delete their sessions  
- Each user can only manage their own data  
- Profile management is also included  

##  Tech Stack

- Laravel (PHP Framework)  
- MySQL Database  
- Blade Templates  
- Tailwind CSS  
- Vite  

##  How to run this project locally

1. Clone the repository  
git clone https://github.com/sainisonam769/meditation-tracker.git  
cd meditation-tracker  

2. Install dependencies  
composer install  
npm install  

3. Setup environment file  
cp .env.example .env  

Update database credentials in .env file:  
DB_DATABASE=your_database_name  
DB_USERNAME=root  
DB_PASSWORD=  

4. Generate application key  
php artisan key:generate  

5. Run database migrations  
php artisan migrate  

(Optional)  
php artisan db:seed  

6. Build frontend assets  
npm run build  

7. Start the server  
php artisan serve  

Open in browser:  
http://127.0.0.1:8000  

## Why Laravel was used

Laravel was chosen because it follows MVC architecture and provides built-in features like authentication, routing, validation, and database management. It helps in building applications faster while keeping the code clean and organized.

##  Code structure

- Controllers handle business logic  
- Models interact with the database  
- Views are built using Blade templates  
- Migrations manage database schema  
- Routes define application endpoints  

## Security

- Passwords are hashed before storing  
- CSRF protection is enabled  
- Input validation is applied  
- Eloquent ORM helps prevent SQL injection  

##  Limitations

- UI is basic and not highly styled  
- No advanced analytics or reporting  
- No API layer  
- Limited testing  

## Future improvements

- Add meditation dashboard with stats  
- Improve UI/UX  
- Add reminders/notifications  
- Build REST APIs  
- Add more test coverage  