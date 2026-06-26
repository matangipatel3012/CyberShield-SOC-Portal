# CyberShield: Security Operations Center (SOC) Portal

## Project Overview

CyberShield is a web-based Security Operations Center (SOC) portal developed to simulate cybersecurity monitoring, incident investigation, and defensive response operations. The application provides a centralized interface for user authentication, incident tracking, malware detection, and investigation management using PHP and MySQL.

## Project Objectives

* Develop a secure user authentication system.
* Simulate Security Operations Center (SOC) monitoring workflow.
* Manage security incidents and investigation records.
* Store and retrieve cybersecurity data using MySQL.

## Technologies Used

* PHP
* MySQL
* HTML
* CSS
* XAMPP

## Key Features

* User Registration and Login Authentication
* Security Dashboard
* Incident Monitoring
* Incident Details Management
* Investigation Module
* Malware Detection Module
* Database Integration
* Logout Functionality

## Project Structure

```text
CyberShield-SOC-Portal/
│
├── dashboard.php
├── db.php
├── incident_details.php
├── investigation.php
├── login.php
├── logout.php
├── malware_scan.php
├── register.php
├── soc.sql
├── style.css
├── README.md
└── screenshots/
    ├── Dashboard.png
    ├── Incidents Details( Malware Alert).png
    ├── Investigation page.png
    ├── Login Page.png
    └── Malware Detection.png
```

## Installation & Execution

1. Install XAMPP.
2. Copy the project folder into the `htdocs` directory.
3. Start **Apache** and **MySQL** from the XAMPP Control Panel.
4. Open **phpMyAdmin** and import the `soc.sql` file.
5. Update the database credentials in `db.php` if required.
6. Open your browser and navigate to:

```text
http://localhost:8080/<project-folder-name>/login.php
```

> Replace `<project-folder-name>` with the name of your project folder inside the `htdocs` directory.

## Screenshots

### Login Page

<img width="1366" height="619" alt="Image" src="https://github.com/user-attachments/assets/acda6dc7-ff03-46e1-83cf-aa531698ea15" />

### Dashboard

<img width="1366" height="628" alt="Image" src="https://github.com/user-attachments/assets/4ecba76f-be7d-4429-88c1-4c6e55307c3f" />

### Incident Details

<img width="1366" height="629" alt="Image" src="https://github.com/user-attachments/assets/243e91b9-391e-4102-96c8-3fdee1bbd15e" />

### Investigation Module

<img width="1366" height="639" alt="Image" src="https://github.com/user-attachments/assets/2c3eed88-f8c0-40b6-9f2e-27f4fcb9a77e" />

### Malware Detection

<img width="1366" height="618" alt="Image" src="https://github.com/user-attachments/assets/d96652e0-e690-4758-90d9-62cde81f7246" />

## Future Scope

* Real-time threat monitoring
* Automated alert notifications
* Dashboard analytics
* Role-based user access
* SIEM integration

## Author

**Matangi Patel**

Diploma Engineering (ICT)


