# Bhambri Solar Project

## Overview
The Bhambri Solar project is a web-based application designed to manage solar energy projects efficiently. It provides functionalities for project management, financial tracking, and resource allocation. The application is built using PHP, HTML, CSS, and JavaScript, and integrates various third-party libraries and APIs to enhance its capabilities.

## Features
- **Project Management**: Create, update, and delete solar energy projects.
- **Financial Tracking**: Manage and verify financial data related to projects.
- **Resource Allocation**: Allocate and track resources for different projects.
- **User Authentication**: Secure login system for finance and project management users.
- **Interactive UI**: Modern and responsive user interface with animations and dynamic content.

## File Structure
### Root Files
- `index.php`: Main entry point of the application.
- `login.php`: Login page for users.
- `finance.php`: Financial management interface.
- `project.php`: Project management interface.
- `write.php`: Handles data writing operations.

### Assets
- **CSS**: Contains stylesheets for animations, layouts, and themes.
- **Images**: Includes images used across the application, such as banners, logos, and backgrounds.
- **JS**: JavaScript files for interactivity and dynamic content.

### Includes
- `config.php`: Configuration file for database and other settings.
- `read.py`: Python scripts for reading data.
- `write.py`: Python scripts for writing data.

### Vendor
- Contains third-party libraries and dependencies managed via Composer.
- Includes libraries like Google API Client, Guzzle HTTP, and Firebase JWT.

## Installation
### Prerequisites
- PHP 5.6 or greater
- Composer
- Web server (e.g., Apache or Nginx)

### Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/bhambri-solar.git
   ```
2. Navigate to the project directory:
   ```bash
   cd bhambri-solar
   ```
3. Install dependencies using Composer:
   ```bash
   composer install
   ```
4. Configure the database in `includes/config.php`.
5. Start the web server and access the application via the browser.

## Usage
1. Navigate to the login page (`login.php`) and authenticate.
2. Use the project management interface to create or update projects.
3. Access the financial management interface for tracking and verifying finances.

## Technologies Used
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **APIs**: Google APIs, Firebase
- **Libraries**: Guzzle HTTP, phpseclib, Firebase JWT

## Contributing
1. Fork the repository.
2. Create a new branch for your feature or bug fix:
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m "Description of changes"
   ```
4. Push to the branch:
   ```bash
   git push origin feature-name
   ```
5. Create a pull request.

## License
This project is licensed under the MIT License. See the LICENSE file for details.

## Acknowledgments
- [Google API Client Library for PHP](https://github.com/googleapis/google-api-php-client)
- [Guzzle HTTP](https://github.com/guzzle/guzzle)
- [Firebase JWT](https://github.com/firebase/php-jwt)
