**Team 15 - Museum** <br>
Team 15 Museum link: http://mfah3380.com/ <br>
Project Code Files: https://github.com/parzival-3x/MuseumDBProject <br>

In the root folder, all .php files have code that is displayed to the end user except for the following: db_conn, insert, login, and logout. The ‘contact us’, ‘parking’, ‘tickets’, ‘css’ and ‘tours’ pages have their own folder. Any page with “insert” in the name in those folders is not shown to the end user. Any other .html and .php file does have code that is shown to the end user. All .js and .php files that are not shown to the end user process data from forms and send it to the database. The ‘artworks’, ‘gifticons’, ‘img’, and ‘posters’ folder contain the images used throughout the site.
The database is being hosted using Google Cloud. 

User accounts <br>
Manager <br>
Username: manager@mfah.org <br>
Password: qsxcgy$45 <br>
Visitor <br>
Username: phobias17@gmail.com <br>
Password: test@123 <br>

* How to Purchase General Admission Tickets<br>
As a VISITOR: Select ‘Tickets’ in the navigation bar and enter the required information.<br>
* How to Purchase Tour Admission Tickets<br>
As a VISITOR: Select ‘Tours’ in the navigation bar and select which ‘Tour’ the visitor would like to visit. Then enter the required information.<br>
* How to Purchase Parking Pass<br>
As a VISITOR: Select ‘Parking Pass’ in the navigation bar and select which ‘Zone’ the visitor would like to choose. Then enter the required information.<br>
* How to Email Contact Us<br>
As a VISITOR: Select ‘Contact Us’ in the navigation bar and enter the required information.<br>
* How to Update Zip Code<br>
After logging in as a visitor, and going to “my account” page, you will see a field to update the zip code.<br>
* How to Set Membership Status as a VISITOR<br>
After logging in as a visitor, and going to “my account” page, you will be able to change the check box. You will have to check the status that you want, remove the check from the other box by clicking on it, and then click on update.<br>
* How to Add Artwork to an Exhibit as MANAGER<br>
Login as the manager to go to the manager page<br>
Fill out the Add Artwork form<br>
Artwork Id is a 6-digit number, the most significant digits represent the exhibit number and the least significant digits represent the artwork number. For example, piece #69 in exhibit 9 has an artwork id of 900069.<br>
If the creator date is unknown, put January 1st of the year it was created.<br>
Description can be of the artwork or the materials used<br>
If the exhibit is ending in the next 3 days, an email will be generated for each active subscription informing them that the exhibit is ending soon (Trigger 3)<br>
* How to Add Exhibit as MANAGER<br>
Login as the manager to go to the manager page<br>
Fill out the Add Exhibit form<br>
Exhibit ID must be entered manually, and in order. For example, the 7th exhibit created will need an Exhibit ID of 7.<br>
Visits can be 0 if it has not opened yet, or non-zero if the exhibit is open and only now being added to the database.<br>
* How to Add Movie as MANAGER<br>
Login as the manager to go to the manager page<br>
Fill out the Add Movie form<br>
Runtime is in minutes<br>
To add showtimes, type how many showtimes will there be in when prompted, and the appropriate amount of boxes will appear<br>
* How to Add Subscriptions as MANAGER<br>
Login as the manager to go to the manager page<br>
Fill out the Add Subscription form<br>
If there is an attempt to add an active subscription where the expiration date has already passed, the subscription will have its status changed to expired (Trigger 1). When this occurs, an alert will be generated for that member id with the message “Your subscription has ended.” This alert is placed in the alerts table (Trigger 2).<br>
* How to View Reports as MANAGER<br>
Login as the manager to go to the manager page<br>
At the bottom of the page, select the desired report <br>
Income Report instructions: Select a start date and an end date for the report and submit. For the time span specified, a report will be generated displaying the gross income of the museum during that time span, showing the income from the gift shop, the donations, the restaurants, the parking, and the tickets.<br>
Gift Shop Report instructions: Select a start date and an end date for the report and submit. For the time span specified, a report will be generated displaying the item by item breakdown of the gift shop. Listing each item, how much of that item was sold in the time period, and the income generated from that specific item.<br>
Visitors Report instructions: In this page you first have to decide the time window that you want to filter the result. Then you will click on submit and you will see the average time that users spent in the museum based on their age in the specific time frame.

Running our Project Locally<br>
If you would like to install our project onto your machine to run it locally, follow these steps:<br>
Install XAMPP, a software to host local web servers.<br>
Once XAMPP is installed, open the software and go to ‘Manage Servers’ and start the ‘MySQL Database’ and ‘Apache Web Server’.<br>
Go back to this github page and download the zip file with all the files under “releases”<br>
Locate the ‘htdocs’ subfolder in the XAMPP folder and unzip the project files into the ‘htdocs’ folder. <br>
In a web browser, go to localhost, where you will see the local project.<br>
In a web browser, go to localhost/phpmyadmin, which will be the page from which you access the locally-hosted project’s database information.<br>
Under ‘Databases’, create a database. Then click that new database. From here, click ‘Import’. You can then choose the dump file located inside of the Team 15 Project Submission folder, to import into the database.<br>

Taylor Rogers<br>
Benjamin Guzman<br>
Wyatt Fernandez<br>
Yahya Ghazanfar<br>
Arvin Nezamololamaei
