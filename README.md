# Dynamic Certificate and Verification

A web-based system for generating and verifying certificates dynamically.

## Features
- Create personalized certificates.
- Secure online certificate verification.
- Customizable certificate templates.
- Responsive design for all devices.
- Built with PHP, MySQL, HTML, CSS, and JavaScript.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/wholeomarfaruk/dynamic-certificate-and-verification.git
Set up the database:

Create a database called certificate in MySQL.
Import the database schema from the database.sql file provided.
Update database connection settings:

Open the db.php file and modify the database connection parameters if necessary:
php
Copy code
  ```bash
  $db = mysqli_connect('localhost', 'root', '', 'certificate');
Make sure to have PHP 7.0 or higher installed on your server.

## Usage
Add student information through the admin panel or directly in the database.
Generate certificates dynamically using the student's details.
Verify certificates by checking the generated certificate's unique ID through the online verification page.

## Technologies Used
PHP (for backend logic and database interaction)
MySQL (for storing student data and certificate details)
GD Library or mPDF (for generating dynamic certificates)
HTML, CSS, and JavaScript (for frontend design)
License
This project is open-source and available under the MIT License.

Author
Omar Faruk