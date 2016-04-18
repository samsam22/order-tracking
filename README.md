# order-tracking

There will be a PHP page with an HTML form that requires the user to enter 3 variables (Username, order ID, and ZIP code) which will be checked against a MySQL database.
The ZIP code will kind of act as the password, so the input type on the textbox for the zipcode will be password.
The front end is pretty much done, with the exception of the modal(s) mentioned below. Everything must be done using bootstrap.
After the user enters the 3 variables and presses submit, the flow pretty much goes like this:
 
-> Do simple validation on the 3 form fields (any method is fine- requirements are order id must be a number of any length, zip code must be a number no longer than 5 digits, otherwise just make sure all 3 boxes have been filled).
    -> If form fields are validated, a modal appears with a moving progress bar for 2-3 seconds.
        -> Check database for any entry with ALL 3 matching variables. Progress bar finises/disappears.
            -> If there's a match, then check current time against time last checked.
                -> If less than 6 hours have passed then in same modal*, display error notifying user they may only check the tracking once very 6 hours.
                    -> If exactly or more than 6 hours have passed then call the USPS tracking API and return the tracking info in the same modal* formatted so it at least looks similar to tracking on USPS website (i.e. not a single ugly line of plaintext for 6-7 tracking updates, etc).
            -> If there's no match, then display error in same modal* notifying user to please check to make sure they entered all the order info in correctly.
    -> If form fields are not all validated, highlight the corresponding box in red and show error directly beneath box or at the top of form.
 
*The modal should have a close button at the bottom right of the modal (but not when the progress bar is present).
 
Probably the most important part of this project: this should all be done in such a way that the tracking number is never actually revealed to the user.
Preferrably it would not even be possible for a tech savy user to somehow retrieve or intercept the tracking number somewhere in between when it is pulled from the mysql database and sent to USPS API.
But this is not required, as long as the tracking number doesn't actually physically appear on the page anywhere, and is not accessible to the average user, that is fine.
 
I'm trying to keep this as simple as possible, so I don't *think* any sessions would need to be used, unless maybe to prevent the user from somehow thwarting the check to make sure its been at least 6 hours since the last time the tracking was checked. Not sure on this one.
 
The MySQL databasae would have 6 columns:
- id (auto incrementing unique primary key)
- username (varchar 25)
- orderid (varchar 25)  
- zipcode (int 5)
- trackingnumber (int 22)
- lastchecked (datetime)
 
You can find the complete front end except for the modal(s) here.
 
The PHP code needed to interact with USPS's API and request tracking information for a package is here.
The tracking info is returned in JSON XML/array format and would need to be parsed and formatted into someting readable before being displayed.
