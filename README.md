# Ante-natal Care System

A comprehensive web-based platform designed to manage and monitor maternal healthcare, enabling doctors and expectant mothers to track pregnancy progress efficiently.

## Overview
The Ante-natal Care System is a full-stack PHP web application tailored for maternal health clinics. It digitizes the workflow of ante-natal checkups, replacing manual medical records with a centralized database. The system provides role-based access for healthcare professionals (doctors/admins) and patients (mothers). Features include session management, real-time tracking of pregnancy milestones, appointment logging, payment tracking, and a built-in messaging system to facilitate communication between doctors and expecting mothers.

## Features
- **Role-Based Portals**: Distinct dashboards for healthcare providers and expectant mothers.
- **Pregnancy Tracking**: Log and monitor pregnancy progress and significant milestones.
- **Checkup Management**: Schedule, add, edit, and delete medical checkups.
- **Payment Processing**: Manage and record billing and payments for clinical services.
- **Integrated Chat**: Enable direct communication between mothers and doctors.
- **Responsive UI**: Built using Bootstrap 4 for a responsive, mobile-friendly interface.

## Tech Stack
- PHP (Vanilla)
- MySQL
- HTML5 / CSS3
- Bootstrap 4
- JavaScript / jQuery

## Project Architecture
The project follows a traditional monolithic architecture:
```text
light/
  assets/                    # CSS, JS, and image assets (ThemeMakker UI Kit)
  config.php                 # Database configuration file (MySQL)
  login.php / signup.php     # Authentication entry points
  dashboard.php              # Healthcare provider (admin/doctor) dashboard
  motherdashboard.php        # Expectant mother dashboard
  *checkup.php               # CRUD operations for medical checkups
  *pregnancyprogress.php     # CRUD operations for pregnancy tracking
  chat.php                   # Messaging interface
```

## Installation
1. Install a local development server like XAMPP, WAMP, or MAMP.
2. Clone or extract the repository into the `htdocs` (or `www`) directory of your server.
3. Start the Apache and MySQL services.
4. Import the provided database (create a database named `gyn` and import the `.sql` file if available, or manually set up the tables as per the queries in the PHP files).
5. Ensure `light/config.php` has the correct database credentials:
   ```php
   $server = "localhost";
   $username = "root";
   $password = "";
   $database = "gyn";
   ```

## Running the Project
Once the local server is running, navigate to the project directory in your web browser:
```text
http://localhost/Ante-natal-Care-System-master/light/login.php
```

## Usage Examples
- **Patient Registration**: Mothers can register an account via `signupmother.php`.
- **Doctor Login**: Doctors log in via `login.php` using credentials that assign them a `login_rank` of 1.
- **Adding Checkups**: A doctor accesses `addcheckup.php` to insert vital statistics and medical observations directly into the database.
- **Chat**: Users can navigate to `chat.php` or `doctorchats.php` to exchange messages securely within the platform.

## Professional Highlights
- **Developed a role-based access control (RBAC) system** using PHP sessions and secure MD5 password hashing.
- **Engineered a comprehensive CRUD system** for medical records, allowing healthcare providers to maintain accurate patient histories seamlessly.
- **Integrated an interactive communication module** to facilitate remote doctor-patient consultation.
- **Implemented a responsive interface** relying on Bootstrap 4, ensuring accessibility across both desktop and mobile devices.

This project showcases a strong grasp of scalable web application development, database management, and addressing specific business requirements in the healthcare sector.

## Contributing
Contributions are welcome. Feel free to open issues or submit pull requests for enhancements.

## Author
Maintained by the original project author.

