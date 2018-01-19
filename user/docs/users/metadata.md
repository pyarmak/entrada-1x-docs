#User Meta Data
Entrada provides administrators with the option to keep track of any information about users, for example immunization records, police checks, mask and gown size, etc.  At present, there is no interface for users to adjust these records about themselves.

In this section you'll learn:
* How to create a meta data field
* How to complete a meta data field
* How to see user meta data
* How users can see their own meta data

#How to create a meta data field
* Navigate to Admin>System Settings
* Select the organisation you want to create meta data for
* Select User Meta Data from the sidebar
* Click Add Meta Data
* Complete the required fields, noting the following:
* **Parent:** You can created a nested hierarchy of meta data fields (e.g. immunizations: tetanus, measles, influenza, etc.).  To do this, you must first create the parent meta data category, then when you create the nested fields, select the parent from the dropdown menu.
* **Restricted to Public:**  Select Public Viewable if you want users to be able to see their own meta data.  Select Restricted to hide the meta data fields from users and allow only administrators to see the information (these items will appear with [Admin view only] on the list of meta data fields).
* **Group:** Select the group(s) to apply this meta data to.  To delete a group from an existing list, click the minus button beside the group name.
* Click Save

#How to complete a meta data field
* Navigate to Admin>Manage Users
* Select Manage User Meta Data from the sidebar
* Set the required fields to reflect the information you want to input
* Click Show Table
* Click Export/Load
* Click Export CSV to download a file with the list of users and other relevant column headings
* Complete the file, noting the following:
* **Type:** Type reflects the meta data you are entering.  You do not need to file this in on the file unless you are uploading multiple meta data categories using one file.
* **Value:** Make this the main data (e.g. shoe size: value=10)
* **Notes:** This can be used to record any additional information (e.g. Received record from health unit on Jan. 16, 2015)
* **The fields for this import are optional so unused columns can be deleted before importing the file**
* Click Import CSV to upload the file
* You will be prompted to map the CSV columns you've included with the meta data fields available in the system.  Click on any unmapped fields and drag them to the appropriate place as needed.
* Choose whether to replace existing data with information in the spreadsheet, and whether or not to delete existing records if information is empty in the spreadsheet (tick off each box as needed).
* Click Import.
* Alternatively, you can add individual records one by one by clicking on Add record for an individual from the meta data category main screen.

#How to see user meta data
To view user meta data for a group:
* Navigate to Admin>Manage Users
* Select Manage User Meta Data from the sidebar
* Set the required fields to reflect the information you want to view
* Click Show Table
* You'll see a list of all users and their existing records
* This information can be exported as a csv

To view all meta data for an individual:
* Navigate to Admin>Manage Users
* Search for the required user and click on his/her name
* Select Edit Meta Data from the sidebar User Management section
* You'll see a list of meta data records for the user

#How users can see their own meta data
* Users can view their own profiles by clicking on their names at the top of the Entrada screen
* If meta data is required/logged for the user s/he will see an **Extended Profile** tab
* By clicking on this tab users will see any meta data collected for them AND which is set to **Public Viewable**
* At present, there is no interface for users to adjust these records about themselves.
