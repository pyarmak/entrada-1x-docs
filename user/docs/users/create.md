#Creating User Accounts
Anyone who wants to access an Entrada installation needs a user account.  To create a user account you must include user groups and roles which define user permissions.

In this section you'll learn:
* How to bulk import users
* How to add individual users
* How to create guest accounts for users to access individual communities
* How to deactivate users

#How to bulk import users
* Navigate to Admin>Manage Users
* Click Import From CSV
* From the popup window you can download a sample CSV file
* Open the file in your preferred spreadsheet manager and complete the columns, noting the following:
* **Institution Number:** This should be the users university id (e.g., staff or student number).
* **Group:** Group defines the user type in the system. Pick from Alumni, Faculty, Medtech, Resident, Staff, and Student.
* **Role:** Different group types have different role availability.  See the table below.
| group     | Role     | System Permissions     |
| :------------- | :------------- | :------------- |
| Alumni      | Year of Graduation       | System Permissions     |
| Faculty      | Admin       | System Permissions     |
| Faculty      | Director       | System Permissions     |
| Faculty      | Faculty       | Basic read-only permission     |
| Faculty      | Lecturer      | Can adjust content in learning events user is linked to |
| Medtech      | Admin       | System Permissions     |
| Medtech      | Staff      | System Permissions     |
| Resident      | Lecturer       | System Permissions     |
| Resident      | Resident       | System Permissions     |
| Staff      | Admin       | System Permissions     |
| Staff      | Pcoordinator       | System Permissions     |
| Staff      | Staff       | Basic read-only permission      |
| Staff      | Translator       | System Permissions     |
| Student      | Year       | Can access learning events if an audience member, can access various modules related to students |
* **Organisation:** This reflects which organisation a user should be added to if there are multiple organisations on an installation (e.g., undergraduate medicine and postgraduate medicine). When logged in as a Medtech Admin you can find the organisation id by navigating to Admin>System Settings and clicking on the organisation.  When the page for that organisation opens the url will include the org id at the end. You can also ask a developer what the organisation ids for your installation are.
* After completing the spreadsheet, you can browse to find the file or drag and drop it in place.  You will be prompted to match the information included in your CSV against the mapped fields available. Decide whether to send user notification emails to new users (uncheck if you don't want emails sent), and click on Import ** users.
* You will see a green success message or be prompted to correct something in the CSV file.

#How to add individual users
* Navigate to Admin>Manage Users
* Click Add New User
* Provide the required information and set Permissions for the user.  Note that you must click Add Permission after you've selected the appropriate group and role for the user.
* Linking a user to a department may mean that certain reports include the user (e.g., faculty reports, work force reporting).  A user can be linked to multiple departments/divisions.
* Leave email notification active or turn it off and click Add User.  You will see a green success message or be prompted to correct something on the page.

#How to create guest accounts for users to access individual communities
* To give someone access to a specific community and its documents, navigate to the desired community.  You must be a community administrator to add a guest member.
* From the Admin Center, click Manage Members.
* Click the Add Guest Members tab.
* Complete the required information and click Add Guest.
* You'll receive a green success message and the guest user will receive an email with further instructions.  The user will only have access to the community.

#How to deactivate users
* Navigate to Admin>Manage Users.
* Search for the appropriate user and click on his/her name.
* From the User Management box on the left, click on Edit Profile.
* Under Account Options set an Access Finish date and time.  To immediately end a user's access, change the account status to Disabled and put in the current date and time.
* Click Save.
