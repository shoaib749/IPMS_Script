<!-- ⚠️ This README has been generated from the file(s) "blueprint.md" ⚠️-->
[![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/aqua.png)](#ipms-internship-and-placement-management-system)

# ➤ IPMS (Internship and Placement Management System)

This repository contains the backend code for IPMS (Internship and Placement Management System), which provides necessary connections with phpMyAdmin and serves as the backend API endpoints for the Android application.


[![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/colored.png)](#setting-up)

## ➤ Setting Up

To set up the backend code for IPMS, follow the steps below:

### Prerequisites

1. Make sure you have PHP installed on your system. You can download PHP from the official PHP website: https://www.php.net/downloads.php.

2. Ensure that you have a web server (such as Apache or Nginx) installed and running on your machine. You can install Apache and PHP together using packages like XAMPP or WAMP, or you can install them separately.

3. Create a database in phpMyAdmin to store the data for IPMS. You can access phpMyAdmin through your web server's administration panel or directly through the phpMyAdmin website: https://www.phpmyadmin.net/.

[![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/colored.png)](#setting-up)

### Installation

1. Clone the IPMS repository by running the following command:

   ```bash
   git clone https://github.com/shoaib749/IPMS.git
    ```

2.  Navigate to the cloned repository:

    ```bash
    cd IPMS
    ```

3.  Open the `config.php` file located in the `api` directory and modify the database connection details according to your setup. Update the following lines with your database credentials:

    ```bash
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'your_database_name');
    define('DB_USER', 'your_username');
    define('DB_PASSWORD', 'your_password');
    ```

4.  Once you have updated the database connection details, save the `config.php` file.

5.  Move the entire `IPMS` folder to the appropriate directory of your web server. For Apache, you can usually place it in the `htdocs` directory.

6.  Start your web server and make sure it is running correctly.

7.  Now you can access the backend API endpoints for IPMS by visiting `http://localhost/IPMS/api/` in your web browser.

[![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/colored.png)](#setting-up)

### Dependencies

The backend code for IPMS has the following dependencies:

- PHP (version 5.6 or higher)
- MySQL (or any other compatible database supported by PHP)
- Web server (such as Apache or Nginx)
  
 [![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/colored.png)](#setting-up)

### License

This project is licensed under the MIT License.

Thank you for your interest in IPMS (Internship and Placement Management System)! If you have any questions or need further assistance, please don't hesitate to contact us.
