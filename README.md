# Assignment

Note : Database is outside the main data folder (Assignment)
-
DATABASE STRUCTURE : 
-
1. Table- userdata:
   It is used for storing users Sign-up Data.
   Also it is used for Log-in.

2. Table- admindata:
   Admin Data is stored in the Table And for Admin Login.
   username is 'dev', password is '12345678'.

3. Table- imgdata:
   It is used to store image Data i.e name and image path.

4. Table- condata:
   It is used to store users Contact Data.
   and the admin will do operations on it.

FRONTEND :
-
1. index.html:
   It is an Staring page that has 4 Links
   -home.
   -admin.html
   -Login.html
   -contact.html

2. admin.html:
   When user clicks on the link, it will redirect to the Admin Login form
   where the userid and password is stored in the database.
   The admin.php file will validate the admin and redirect to the adminOperations.php page.

3. adminOperations.php:
   When the Admin is logged-in. This page will display Contact data.
   The Admin can can Manipulate by Updating and Deleting the data.
   the Update button will redirect to update.php for updation Form and the Delete button will the Data Based on Table ID.

4. Login.html:
   login link is clicked it is redirected to Login and Signin Form.
   if the user is new they must sign in and the userdata will store in userdata Table.
   Once Signin user can Login. Onece Loggedin they is redirected to home.php

5. home.php:
   Home has 2 link Home and My Account.
   My account is clicked user will redirect to myAccount.php file.

6. myAccount.php:
   This file has form for image upload and displays its database in tabular format.
   When the user uploads image its path will store in the Database as well as the image will be copy pasted
   in the image folder. Then Based on image folder and image path The image will be displayed on the Home page.

   Note: if image file doesnt content Image. Then first upload image from My Account.
   -
