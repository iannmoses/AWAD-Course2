|# Student Management System
 A web application built with Laravel for Makerere University Business School that manages students, courses, lecturers and course registrations.

 Administrators manage students, courses, registrations and user access.
 Lecturers view assigned courses and the students that have registered for the different courses.
 Students view available courses, register for courses and also view their own registrations.

 Laravel 12 . PHP 8.2+ . MySQL . Spatie Laravel Permission . Blade . Tailwind CSS (CDN) . Lucide icons

**-----------INSTALLATION-------------**
Requirements PHP 8.2 or newer, Composer, MySQL (Xampp), Git

Create DATABASE studentMgtSystem
Create the tables and load sample data:
``bash
  php artisan migrate:fresh --seed
``
Start the application:
``bash
  php artisan serve
``
Open <http://127.0.0.8000>.

The seeders can be run safely. This is because they use `firstOrCreate` therefore eliminate creation of duplicate records.

**-------USER ROLES AND SAMPLE LOGINS---------**
ROLE: Administrator
EMAIL: admin@mubs.ac.ug 
PASSWORD: Admin@2026

ROLE: Lectcurer
EMAIL: felix.bukenya@mubs.ac.ug
PASSWORD: Felix@2026

ROLE: Student
EMAIL: aisha.namuli@mubs.ac.ug
PASSWORD: Student@2026

New students can create their own accounts on the "Create account page"
Lecturers and administrators are added by an administrator under "User and roles"

**-------PERMISSIONS--------**
ADMINISTRATOR - Views dashboard, manages students, manage courses, registrations and users.
LECTURER - Views dashboard, views assigned courses and students under different courses.
STUDENT - Views dashboard and courses, register for a course and view own registrations