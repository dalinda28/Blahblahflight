# Laravel Project
A group project during our first year at ECV Digital school, for the PHP Framework course we had to develop a website with Laravel.

# Initialisation of the projet
Before to use this project you have to do :

"npm install"
"npm run watch" --> for the css of the tailwind
"composer install" --> to install all independces
"php artisan migrate" --> to initialise database
"php artisan db:seed" --> to fill database with fake data
"php serve artisan" --> to execute the projet in you don't have apache server


# Fonctionalities

As logged-in Admin = you have access to a dashboard where you can :
-- see all flights, update a flight, add/delete a flight
-- see all users, update an user, add/delete an user
-- see all messages, answer to a message
-- see all books, update a book, delete a book
Login/Register as a pilot or a passenger
Contact form + Captcha
Search a flight
See a single flight
Pay and book a flight with Stripe
As logged-in passenger, you can see all your booked flights
As logged-in pilot, you can create a flight
