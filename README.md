# QUESTION 1
This project is a Laravel-based application  for handling for encryption and decryption of text string. It accept string and encryption it using openssl  AES/256/CBC/PKCS7Padding algorithm in hexadecimal(HEX) output format.
Also decryption back to the original string
 
## Features
Encryption and Decryption of text string

 To run the project
Open your browser and paste the 'http://127.0.0.1:8000/encryption' to your URL


------------------------------------------------------------------------------------------------------------------------------------------------------------
# QUESTION 2
This project is a Laravel-based application using blade for handling user registrations. It accepts name ,phone number and email address as input and stores them in a database.

## Features
Form Validation: Ensures that user inputs meet the required criteria before saving to the database.
Unique Email Check: Prevents duplicate email registrations.
Email Notification: Sends a confirmation email to the user after successful registration.
 To run the project
Open your browser and paste the 'http://127.0.0.1:8000/register' to your URL
## Installation


---------------------------------------------------------------------------------------------------------
# QUESTION 3

This project is a Laravel-based API for handling user registrations. It accepts phone numbers, mobile networks, messages, and reference codes as input and stores them in a database.

## Features

- Accepts phone number, mobile network, message, and unique reference code as input.
- Validates input data.
- Stores registration data in a MySQL database.
- Returns JSON responses.
How to run 
Use Postman to run the project using the url 'http://127.0.0.1:8000/api/create'
use raw as request body find sample below
{
"phone_number": "12345678901",
"mobile_network": "mtn",
"message": "Hello, this is a test message.",
"ref_code": "unique_ref_code_12333"
}

-------------------------------------------------------------------------------------

## Installation requirements

- PHP 8.0 or higher
- Composer
- MySQL
- Git

### Installation

#1 git clone the repo to your local machine https://github.com/manquadry/novajitestanswer

#2 change directory to the application folder novajitestanswer

#3 run composer update to  install the necessary dependency

#4 create a database novaji_test on your localhost 'Check the env file for details' about this.

#5 run all the application as describe 



