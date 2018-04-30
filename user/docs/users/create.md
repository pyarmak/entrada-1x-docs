#Creating User Accounts
Most users require an account to access Elentra.  While there are some exceptions to this in that you can create a public community and share it with others, add a guest member to a specific community, or add an external assessor to a distribution of an assessment and evaluation form, most users will have accounts.  To create a user account you must include user groups and roles which define user permissions.  Only those with admin roles within Elentra are able to manually create users.

Although there is a user interface to manually add individual users, it is strongly recommended that your developers or technical team set up a relay of information from a central, authoritative database (e.g., an existing student information system) to feed users into Elentra.

#How to bulk import users
* Navigate to Admin>Manage Users.
* Click 'Import From CSV'.
* From the popup window you can download a sample CSV file.
* Open the file in your preferred spreadsheet manager and complete the columns.  Required fields are listed first followed by optional fields.  
**First Name:** Provide the user's given name.  If you have multiple users with the same first and last name we recommend including their middle initial with their first name.  
**Last Name:** Provides the user's last name.  
**Username:** This will be the username for your Elentra installation.  
**email:** This should be the user's email and must be distinct for each user.  
**Group:** Group defines the user type in the system. Pick from Alumni, Faculty, Medtech, Resident, Staff, and Student. You can only use additional groups if you have added them to the database.  
**Role:** Different group types have different role availability as shown in the table below.  Many group and role configurations carry different permissions.  For more detail about user permissions please see the Permissions help section.  Similar to groups, you can only use additional roles if you have added them to the database.  

| Group     | Role     |
| :------------- | :------------- |
| Alumni      | Year of Graduation       |
| Faculty      | Admin       |
| Faculty      | Director       |
| Faculty      | Faculty       |
| Faculty      | Lecturer      |
| Medtech      | Admin       |
| Medtech      | Staff      |
| Resident      | Lecturer       |
| Resident      | Resident       |
| Staff      | Admin       |
| Staff      | Pcoordinator       |
| Staff      | Staff       |
| Staff      | Translator       |
| Student      | Year       |  

**Organisation:** This should be a numeric id and reflect which organisation a user should be added to if there are multiple organisations on an installation (e.g., undergraduate medicine and postgraduate medicine). When logged in as a Medtech>Admin you can find the organisation id by navigating to Admin>System Settings and clicking on the organisation.  When the page for that organisation opens the url will include the org id at the end. You can also ask a developer what the organisation ids for your installation are.  
**Gender:** Gender is a required field in your upload but you can leave the cells blank if you don't want to define uesrs' genders.  If you do want to provide gender enter M or F.  A blank cell will display as Gender:Unknown in the user interface.

* Optional fields:  
**Institution Number:** The user's university id (e.g., staff or student number).  
**Entry Year:** The year the learner entered/will enter a program.  
**Grad Year:** The anticipated graduation year. (Make sure your database includes the years you intend to enter.)  
**Notes:** Information provided here will display in the General Comments section of the Personal Information section.  
**Account Status:** You can enter active or disabled in this column, you'll be able to change this setting in UI after the user is created.  
**Access Start:** Unix timestamp (e.g. 1512086400) or date-time format (2017-12-01 12:35) are accepted.  
**Access Finish:** Unix timestamp (e.g. 1512086400) or date-time format (2017-12-01 12:35) are accepted.  
**Department:**  To enter a department affiliation for a user you must have department's Elentra id code.  This is information you can request from a developer or you can find it by looking at a url.  To discover the department id for yourself, you must be able to access Admin>System Settings.  When you do, click on the name of the organisation you are working with and then click Departments in the left sidebar. Click on a department name and when the page for that department displays the url will include the department id at the end.  
**Password:** Passwords can be set using an import but we recommend only importing existing passwords if you exported them from elsewhere.  
**Salt:** This is a way to make a password more secure.  It is recommended that you use this field only if you've exported a list of users and already have the salt information (and the password).  
**Prefix:**  Accepted prefixes are Dr., Mr., Mrs., Ms., Prof., Assoc. Prof., and Asst. Prof.  
**Alt Email:** This is a second or alternative email the user can provide.  
**Telephone, Fax, City, Address, Postal Code, Country, Province:** Provide contact information as desired.  

* Every column header included in your file must be completed.  If there is a column header with no information present delete that column before you upload the file.  
* It is recommended that you use different files for different groups (e.g. faculty and learners) as they may not required the same fields and partially complete columns will result in errors.  
* If you are importing a significant number of users we recommend limiting your file size to 1000 users or less.

* After completing the spreadsheet, you can browse to find the file or drag and drop it in place.  You will be prompted to match the information included in your CSV against the mapped fields available.  Fields that display highlighted with green are required.
* At this stage, you can scroll through the imported users to check their data.  In the top right, click on the small arrows beside the Row counter.  You'll see a summary of the information being uploaded for each user.
* Decide whether to send user notification emails to new users (uncheck if you don't want emails sent), and click on Import Users.
* You will see a green success message or be prompted to correct something in the CSV file.

#Uploading revised records for users
You are able to upload revised user records to the system.  When you do the system will compare the records and in some circumstances ask you to confirm which record you want to use.

The system will respond the following way when you update records:
If the user has the same group but a new role compared to their previous record - system will update the role and everything else (start and end date, and account status).  You will be asked to confirm whether you want to update the user record.
If the user has a different group from their previous record that group will be added to the user's account and all other information will be updated.
If the user has the same group and same role as their previous record the system will automatically update everything included in the csv.  

When the system finds two records for the same user it will display the two records.  Currently, these lines look identical but we are working on adding a popover card to display the conflicting information so users can more easily decide which record to import.

Note that you can choose to update no records, update all records, or individually select which records you'd like to update.

When you look at a list of users note that records displaying in red indicate users with disabled accounts.

#How to add individual users
* Navigate to Admin>Manage Users.
* Click 'Add New User'.
* Provide the required information and set Permissions for the user.  Note that you must click Add Permission after you've selected the appropriate group and role for the user.
* Linking a user to a department may mean that certain reports include the user (e.g., faculty reports, work force reporting).  A user can be linked to multiple departments/divisions.
* Leave email notification active or turn it off and click Add User.  You will see a green success message or be prompted to correct something on the page.

#How to create guest accounts for users to access individual communities
* To give someone access to a specific community and its documents, navigate to the desired community.  You must be a community administrator to add a guest member.
* From the Admin Center of the specific community, click 'Manage Members'.
* Click the Add Guest Members tab.
* Complete the required information and click 'Add Guest'.
* You'll receive a green success message and the guest user will receive an email with further instructions.  The user will only have access to the specific community.

#How to deactivate users
* Navigate to Admin>Manage Users.
* Search for the appropriate user and click on his/her name.
* From the User Management box on the left, click 'Edit Profile'.
* Under Account Options set an Access Finish date and time.  To immediately end a user's access, change the account status to Disabled and put in the current date and time.
* Click 'Save'.
