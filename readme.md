## CI_HMVC_LoReg - Codeigniter Login and Registration System

This Codeigniter Login and Registration System is a work in progress. I developed this with simplicity in mind. I wanted people to be able to use this code and not have to worry about the look of it. So there is no styling at all. Only basic html elements. This allows you to take it and eaisly add your own styles or incorporate it into a bootstrap template or any template for that matter. So it may be ugly, but it's on purpose.

## Setting up HMVC in Codeigniter 2.1

This assumes that you have already installed Codeigniter 2.1.x

1. Download the codeigniter-modular-extensions-hmvc [here](https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc/get/tip.zip).
2. Unzip the archive
3. Move all files from the extracted archive core directory to the /application/core directory of your Codeigniter instance
4. Move the third_party/MX directory and all of it's contents to the /application/third_party directory of your Codeigniter instance.
5. Create a new folder, I called mine modules. This is where you your individual modules for your project.
6. Next open application/config/config.php using your favorite text editor and add this line $config['folder_name']= array(APPPATH.’modules_core/’ => ‘../modules_core/’,);

## Installation

This assumes that you have already set up a connection to a database. The users.sql file will add a table called users to that database.

1. Download and extract the zip file from my github page for [CI_HMVC_LoReg](https://github.com/gqp/CI_HMVC_LoReg).
2. Copy the contents of the application/modules folder to the application/modules directory of your Codeigniter instance.
3. Copy the contents of the users.sql file to your Mysql Database.
4. Open the application/config/autoload.php file of your Codeigniter instance
5. Add database and session to autoload libraries if not alread there - $autoload['libraries'] = array('database','session');
6. Add url and form to autoload helper if not already there - $autoload['helper'] = array('url', 'form');

That should be it!!

Login information:
Username = admin
Password = admin


## Basic Information

### Registration Page:

* Must have unique email address
* Must have unique username
* Must confirm password

### Registration Process:

Upon registration submit:
* User is added db
* Unique 32 character encrypted key is added
* User is set as not active
* User is added with no role
* Confirmation email sent
* Upon Confirmation (User clicks link):
* User is set to active
* User is assigned member role
* Unique 32 character encrypted key is changed
* User is redirect to login page with registration confirmation message
* Redirected to confirm_thanks page asking to check email and confirm the registration

### Members Area:
User are automatically directed to this page if they are NOT admins.

#### Members only Page

* View profile link
* Logout link

#### View Profile Page

* Displays basic user informaion (usernam, email, first and last name)
* Back to Members Area link
* Change Password link
* Edit Profile link
* Logout link

#### Change Password Page

* Password field
* Confirm Password field
* Back to Profile link
* Logout link

#### Edit Profile Page

* Displays username (not editable)
* Displays Email (not editable)
* First Name (editable)
* Last Name (editable)
* Back to Profile link
* Logout link

### Admins Only Area
User are redirected to this page automatically if they have admin role.

#### Admin Only Page

* Add User link
* Users link
* Members Area link
* View Profile link
* Logout link

#### Add User Page

* Page not developed

#### Users Page

* Displays all users and user information (username, first and last name, email, role, Active) in table format
* Each users has Edit link
* Each user has either Activate link or Disable link depeding on if they are active or not.
* Add User link
* Users link
* Members Area link
* View Profile link
* Logout link

#### Members Area Page

* Same as Members Area Page above
* Only difference - Has Admin Area link

#### View Profile Page

* Same as View Profile above