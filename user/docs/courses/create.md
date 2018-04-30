#Creating Courses
Creating a course is the first step to populating it with objectives, creating groups, setting up a gradebook, etc.  If your organisation has units enabled, your setup process will be slightly different.

#How to create a new course
* Navigate to Admin>Manage Courses.  

![Admin Manage Course](/img/courses/adminmenu-addcourse-me1.12.png)  

* Click 'Add a New Course'.  

![Add Course Button](/img/courses/courses-addcoursebutton-me1.12.png)  

* Complete each of the required steps noting the following:  

**Course Setup:**  

* Curriculum Layout: This defines where in the curriculum layout this course will live. Your choice of curriculum layout will dictate the curriculum periods available later in the course setup when you set the enrolment for the course.  (If no curriculum layouts are set up, proceed to Admin>Manage Settings>Select Organisation>Curriculum Layout.)
* Course Name: This will display to users on the list of courses and in all associated learning event pages.
* Course Code: This will display as part of the course identification visible to users on individual learning event pages and will also be used in the list of event from the Learning Events tab. The course code is also used in the breadcrumbs when you are managing courses and their different pages so codes should be logical.
* Course Colour: The selected colour will be used to identify learning events that are a part of this course on the learner calendar. (You can further customize the colour of specific events when you create them.)
* Course Type: This presently creates metadata. It doesn’t impact the course template or anything else.  
* Curriculum Tracks - Curriculum Track options will only display if you have curriculum tracks built within an organisation.  These can be configured through Manage Curriculum.  Assigning a course to a curriculum track allows you to identify those courses that share characteristics (e.g. help prepare learner for a specific program, provide a minor, etc.)
* Reminder Notifications:  This is specific to faculty teaching events in the course and allows you to choose whether or not to enable email notifications for this course.  Through the database/settings table you can set when and how often email reminders about teaching responsibilities are sent out.
* Course Permissions: An open course will allow all logged in users to access it.  If you attach the course to a community or course website you'll be able to set permissions for the course website as well.
* Audience Sync: Choose whether or not to automatically sync your audience with the LDAP server.

![Adding Course UI](/img/courses/courses-addingcourse-me1.12.png)  

**Course Enrolment:**

* When selecting an enrolment period, the available options will depend on the Curriculum Period defined in the Course Setup section. You can add multiple curriculum periods, cohorts or individuals to a course enrolment.
* After selecting an enrolment period from the dropdown options, click 'Add Audience'.
* Choose to add a cohort, class list, or individual. Note that a cohort does not need to be assigned to a specific course in order to be added as an audience.  However, a class list must be linked to a course via Manage Cohorts before it will be available to be added as an audience.  (This requires you to save the course without an audience, go to Manage Cohorts and build a class list, and then return to the course setup tab to set the enrolment.)
* Click 'Proceed'.  

You will see a green success message indicating that the course has been created.  You'll be redirected to the full course setup tab to provide additional details about the course.  

# How to delete a course
* Navigate to Admin>Manage Courses.
* Search for the course you want to delete as needed.
* Click the checkbox beside the course information for the course you want to delete.
* Click 'Delete Courses'.
* Confirm your choice.
* You will get a green success message on the screen.
