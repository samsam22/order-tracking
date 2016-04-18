# Order Tracking with User Authentication in PHP/MySQL

###Introduction
The goal here is to create a simple one page/file authentication system in PHP with a basic bootstrap-themed HTML form inside the .php file that posts the collected infromation from the form back to itself then compares those values with values stored in a MySQL database. The form requires that the user enter 3 pieces of information (a username, an order ID, and a ZIP code) which will then be passed to MySQL to see if there are any rows where all 3 values are a match. Then depending on whether or not there are any matches, certain functions will be checked/performed.

### Flow
The front end is pretty much done, with the exception of the modal(s) mentioned below. Everything in front end must be bootstrap or bootstrap friendly. After the user enters the 3 values into the form and submits them, the flow pretty much goes like this:
 
- 1) Do simple validation on the 3 form fields to prevent basic user error. Any method is fine, requirements would be that username is minimally filled with something, order_id can only contain numbers, zip code can also only contain numbers must be exactly 5 digits long.
- 1a) If form fields are validated, a bootstrap modal appears with a moving progress bar for 2-3 seconds (just for show).
- 2) Check the MySQL database for any row where ALL 3 values are a match.
- 2a/3) If there is a match, then check and compare the last_checked datime to the current datetime for that match.
- 3a) If less than 6 hours have passed then, in the same modal the progress bar was in, display an error notifying user they may only check the tracking once very 6 hours.
- 3b) If exactly or more than 6 hours have passed then save the corresponding tracking number in a PHP variable so it can be passed to the USPS API which will be used to return the tracking information for the order (again, in the same modal). The tracking info is returned in JSON XML/array format and would need to be parsed and formatted into someting readable before being displayed. In the MySQL database, set the last_checked datetiem value for the corresponding order ID to the current time.
- 2b) If there are no rows where all the 3 values from the form match up, then display an (again, in same modal) notifying the user and telling them to check to make sure they entered all the information correctly.
- 1b) If form fields are not all validated, highlight the corresponding form field in red and show error directly beneath frield or at the top of form.

### Example MySQL Table
| id (primary key) | username (varchar 50) | order_id (varchar 10) | zip_code (varchar 5) | tracking_number (varchar 22) | last_checked (datetime) |
| ------------- |:-------------:| -----:|---|---|---|
| 1 | bob123 | 3832043 | 10001 | 940534539482957775698 | 2016-04-18 06:45:32  | 
| 2 | sally343 | 77734172 | 27703 | 9405345397502494204 | 2016-04-18 06:45:32  |
| 3 | john996 | 10353451 | 69001 | 9405345394947569938474 | 2016-04-18 06:45:32  |

### Focus
Probably the most important part of this project: this should all be done in such a way that the tracking number is never actually revealed to the user. Preferrably it would not even be possible for a tech savy user to somehow retrieve or intercept the tracking number somewhere in between when it is pulled from the MySQL database and sent to USPS API. But this is not a requirement, as long as the tracking number doesn't actually physically appear on the page anywhere, and is not easily accessible to the average user, that is fine.

### Other Notes
- The modal(s) should have a close button at the bottom right of the modal (but not when the progress bar is present).
- The ZIP code will kind of act as the password, so the input type on the textbox for the zipcode will be password, but it doesn't really need to be hashed or salted or anything.
- I'm trying to keep this as simple as possible, so I don't *think* any sessions would need to be used, unless maybe to prevent the user from somehow thwarting the check to make sure its been at least 6 hours since the last time the tracking was checked by just refreshing the page or something. Not sure on this one.

### Files
- You can find the complete front end, except for the modal(s) in track.html.
- What's I've done so far to try and compares form submissions against the MySQL databasae is in track.php.
- The PHP code needed to interact with USPS's API and request tracking information for a package is in usps.php.
