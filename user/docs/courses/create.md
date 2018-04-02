#Creating Courses and Course Setup Tab
Creating a course is the first step to populating it with objectives, creating groups, setting up a gradebook, etc.  If your organisation has units enabled, your setup process will be slightly different.

#How to create a new course
* Navigate to Admin>Manage Courses.
* Click 'Add a New Course'.
* Complete each of the required steps noting the following:  

**Course Setup:**  

* Curriculum Layout: This defines where in the curriculum layout this course will live. Your choice of curriculum layout will dictate the curriculum periods available later in the course setup when you set the enrolment for the course.  (If no curriculum layouts are set up, proceed to Admin>Manage Settings>Select Organisation>Curriculum Layout.)
* Course Name: This will display to users on the list of courses and in all associated learning event pages.
* Course Code: This will display as part of the course identification visible to users on individual learning event pages and will also be used in the list of event from the Learning Events tab. The course code is also used in the breadcrumbs when you are managing courses and their different pages so codes should be logical.
* Course Colour: The selected colour will be used to identify learning events that are a part of this course on the learner calendar. (You can further customize the colour of specific events when you create them.)
* Course Type: This presently creates metadata. It doesn’t impact the course template or anything else.  
* Reminder Notifications:  This is specific to faculty teaching events in the course and allows you to choose whether or not to enable email notifications for this course.  Through the database you can set when and how often email reminders about teaching responsibilities are sent out.
* Course Permissions: An open course will allow all logged in users to access it.  If you attach the course to a community or course website you'll be able to set permissions for the course website as well.
* Audience Sync: Choose whether or not to automatically sync your audience with the LDAP server.

**Course Enrolment:**

* When selecting an enrolment period, the available options will depend on the Curriculum Period defined in the Course Setup section. You can add multiple curriculum periods, cohorts or individuals to a course enrolment.
* After selecting an enrolment period from the dropdown options, click 'Add Audience'.
* Choose to add a cohort, class list, or individual. Note that a cohort does not need to be assigned to a specific course in order to be added as an audience.  However, a class list must be linked to a course via Manage Cohorts before it will be available to be added as an audience.  (This requires you to save the course without an audience, go to Manage Cohorts and build a class list, and then return to the course setup tab to set the enrolment.)
* Click 'Proceed'.  

You will see a green success message indicating that the course has been created.  You'll be redirected to the full course setup tab to provide additional details about the course.  

**Course Setup:** This first section of the page is complete with the information you already provided.  If you need to edit any of the information you can do so here.

* Curriculum Tracks - Curriculum Track options will only display if you curriculum tracks built.  These can be configured through Manage Curriculum.  Assigning a course to a curriculum track allows you to identify those courses that share characteristics (e.g. help prepare learner for a specific program, provide a minor, etc.)

**Course Contacts:**  

* Assigning someone as a course/program director or curricular/program coordinator will allow that person to edit the course content, including all associated learning events.  Their contact information will also be displayed on the course background page if you create a course community/website for the course.  
* Assigning someone as associated faculty will allow that person to be assigned as a grader to exams. Their contact information will also be displayed on the course background page if you create a course community/website for the course.  
* Assigning someone as a teaching assistant can result in that person's information being displayed on the relevant course page (if the appropriate setting is turned on) but will not give the user any additional permissions.

The list of course contact options can be modified by a developer in the language file of the Entrada installation if, for example, you want Course Director to say Program Director.

**Course Keywords:**  
This is an optional feature that can or cannot be used in Entrada; by default it is not enabled.  Keywords allows you to assign Medical Subject Headings (MeSH) to courses and later to specific learning events.  The Course Keyword feature is separate from curriculum tag sets and as such has limited reporting abilities when compared to a tag set.  If your organisation has a list of keywords to be tracked it is recommended you make those words a curriculum tag set.  Course Keywords should only be used with MeSH terms.  To effectively use the MeSH keywords feature a developer will need to import the MeSH database to your installation of Entrada.  To hide the keywords feature entirely, a developer will need to delete some tables from your installation.

**Course Objectives:**  
If you are using the Unit/Weeks feature of Entrada, assigning curriculum tags functions slightly differently; please see below in the Course Tags section.

Map curriculum tag sets or individual curriculum tags to a course by clicking 'Show Curriculum Tag Sets' and clicking through to the appropriate tag set or tag and checking it off. Assigned curriculum tags will be accessible to tag at the event level and in gradebook assessments.  They will also display on the course page and be visible to learners.

For your primary tag set displaying under 'Curriculum Objectives' you may see the option to designate a tag as primary, secondary or tertiary.  If you use this feature the objectives will be displayed under primary, secondary and tertiary headings on the course page visible to learners.

The curriculum tag set designated as Curriculum Objectives will be immediately visible on the right side.  All other curriculum tag sets will appear under "Other Objectives".

Note that if you want students to be able to log specific objectives they should be assigned to the course.

**Course Tags:** For use if your installation of Entrada has weeks/unit enabled.
* Select the appropriate Curriculum Period from the dropdown menu.  
* Select the appropriate Curriculum Map Version from the dropdown menu.  (Configure a curriculum map via Admin>Manage Curriculum if necessary.  More information can be found in the Curriculum>Map Versions help section.)  
* Select curriculum tags from the dropdown menu.  Whatever is added as a Course Tag will display on the course page.  
* If you choose to, you can click on a curriculum tag added as a course tag and map it to another curriculum tag.  This is context-based linking.  The linkages you create will be reflected in the map of the curriculum tag if you have enabled the tag set to be mappable to the appropriate tag set; however, the link will not be automatically recorded in the history of the tag.  
* The course tags and any context-based linkages you create will be displayed on the course page.

**Course Reports:**  

Indicate which reports should be available to be generated from this course by selecting them from the available options.  In stock Entrada you will see Report Card and My Teachers as available report types.  There is no user interface to control which reports are available to which organisations within an installation of Entrada, but the database can be configured to allow specific reports to be accessible to specific organisations.

* Report Card does not fully function right now but it is intended to allow users to select a learner, and view a table showing curriculum tags as rows, and learning events, simulations, and logbook across the top.  In each grid matrix you see a completion rate (e.g. 1/3, 2/5) in terms of attendance and completion.  For the learning events the denominator is the number of events where attendance was required and that curriculum tag was applied.  The numerator is how many times the learner was present at those events (this tool assumes you are using attendance tracking in Entrada).
* My Teachers will provide a report displaying the names and email addresses of all teachers active in the course.

**Course Enrolment:** This will appear near the bottom of the screen but was already completed during the initial course build.  If you need to edit the enrolment you can do so from here.  

**Course Syllabus:**  

If this feature is enabled users will be able to generate a PDF summarizing the course information provided in the course website tabs.

* After completing the required fields in Course Setup, click Save.

# How to delete a course
* Navigate to Admin>Manage Courses.
* Search for the course you want to delete as needed.
* Click the checkbox beside the course information for the course you want to delete.
* Click 'Delete Courses'.
* Confirm your choice.
* You will get a green success message on the screen.
