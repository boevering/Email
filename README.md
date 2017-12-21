# Email

Make sure python is installed with smtplib & pymysql

Besides that, there are two files that can be used.

## sendemail.py
Is the script that is used for sending the email.

Make sure you have two files in the same directory (test.txt and example.txt) and make sure that 'test.txt' contains one (and only one) emailadres per row. The 'test.txt' is used for testing where 'example.txt' is used as the actual list (name can be changed in the variables).

This script has the option to load the number of send email into a database. Please profide valiad cridentials for that task and make sure that on line 106 the correct sql statement is given. The database wil only be updated when the option 2 is used in the first input, so it can be tested by using option 2 and then option 1 (test server)

Please make sure all variables are set corectly before sending the email.

## convert.py
If you have a list of names wich you want te convert to emailadresses you can use this script. 

Please make sure that the input file has the following structure: Firstname;Lastname;Infix
Example: Ko;Kraker;de 
will be converted into: ko.de.kraker@example.com

## count.php
Used for the Joomla installation the count the amount of clicks. It checks the URL for 'index.php?count=1'.
If the count has a other value then 1 it wil not work. Make sure the content_id had the value of a article.

Download the mod_phishing as a zip file to display the amount of clicks on the administrator page.
