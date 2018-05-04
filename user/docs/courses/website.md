#Course Websites (aka Course Communities)
When you add a new course, you are adding information to the database about that course and users will be able to see a simple course page. However, to make a more robust online course community for learners and faculty you should also create a course website for a course.  This is done using the Communities feature of Elentra.  Using a community template for a course offers a more robust view of a course and its contents and allows for additional features like discussion boards, polls, file sharing, etc.  Often we refer to the community for a course as its course website.

Here is how a course without a website will appear to users:

![Course No Website](/img/courses/course-nowebsite-me1.12.png)  

Here is how a course with a website will appear to users:

![Course Website](/img/courses/coursewebsite-me1.12.png)  

Note that the course website relies on a templated set of pages (e.g., background, calendar, prerequisites, etc.).  The template shown and described below comes with stock Elentra but if your organization requires a different template, or you want different templates for different courses, e.g., clinical and nonclinical, that is customization work that can be done.

#How to create a course website using the communities module
* Note that you must create a course via Manage Courses before you can create a course community.  

* From the main menu, click on the Communities tab.
* Click 'Create a Community' and then click on 'Courses, etc.' in the Official Communities section.
* Fill in the required information and under Community Type, select ‘Course Website’ from the dropdown menu.
* When you select this community type a default list of pages will appear.  You can not deselect any pages.  When the course website is created these will be visible.  (If you'd like to have a course website template that allows users to deselect or later hide templated pages you'll need help from a developer.)
* Under Community Courses, select the appropriate course to link this community to.  You can connect multiple courses to one website and they will share a student-facing web presence.  If you do this, some pages will display information from both courses (e.g. Learning Objectives, MCCs) whereas some pages will only show information from one course (e.g. the course description and course director's message populate from the first course).
* Set the appropriate access permission and registration options and click 'Create'.

* **If you get an error saying you must specify a Community Type but don't have the option to do so on the screen**, this is a known problem.  You are likely working in a second organisation (e.g., you're working in postgraduate medicine and the first organisation in your installation was undergraduate medicine).  When a second organisation is created through the user interface, community types are not automatically copied into the new organisation.  A developer can copy the community types for you and you'll be able to use communities properly.



#How to populate additional sections of the course website
* Once a course community or website is created, users who are designated as Community Administrators can manage the pages just like any other community.  When viewing a course website, switch to Administrator view if necessary, and then look for the Admin Center box on the sidebar.  Click Manage Pages to adjust content, reorder pages, or add a new page.  For quick editing access, click the Edit Page button from any community page at any point.

The following pages are included in the course website community template:  

* Background: Add any background information as needed.  Turn on additional information to populate the page with announcements, upcoming events, and community history (e.g., new members joining). Click Save when done.  (Feb. 12, 2018: Note that the display of announcements and events is currently not working and only community history will show up.)
* Course Calendar: You can add customized text to the top of this page; by default it displays learning events scheduled in the course via Manage Events (change the date range from day, month, week, year etc. to change your view). If you add free text, click 'Save' when done.  Note that this is different from the learner's customized calendar accessible from the dashboard.  From the course website, you'll see all events scheduled for this course in a list format.
* Prerequisites: You can add customized text to this page. Click 'Save' when done.
* Course Aims: You can add customized text to this page. Click 'Save' when done.
* Learning Objectives: You can add customized text to the top of this page; by default it displays the learning objectives/curriculum tag sets assigned to the course through the Content tab under Manage Courses. If you add text, click 'Save' when done.
* MCC Presentations: You can add customized text to the top of this page; by default it displays the Clinical Learning Objectives assigned to the course through the Content tab under Manage Courses. If you add text, click 'Save' when done.
* Teaching Strategies: You can add customized text to this page. Click 'Save' when done.
* Assessment Strategies: You can add customized text to this page. Click 'Save' when done.
* Resources: You can add customized text to the top of this page. If you add text, click 'Save' when done.
Note that course communities are associated with all enrolment periods tied to the course and are not currently cohort specific.  If you attach resources to a community, all learners across multiple cohorts will be able to view them.  If you added resources to a course when you created it via Manage Courses, those resources will not automatically populate this page (updated February 12 - we are considering changing this in ME 1.12).
* Expectations of Students: You can add customized text to this page. Click 'Save' when done.
* Expectations of Faculty: You can add customized text to this page. Click 'Save' when done.

#How to manage community, community members, and community reports
When you build a course website and associate it with a course, individuals listed on the course contacts page (e.g., course director, curriculum coordinator, associated faculty) will automatically be made administrators of the course website.  As admins. they will be able to edit page content, add additional pages, etc.  Managing additional members is similar to other communities so please see the Communities help section for more detail.

Managing a course website in terms of permission settings, statistics and details is also like other communities so please see the Communities help section for more detail.

**Community Reports** is a tool unique to course websites that allows you to review which community members have viewed pages, taken specific actions, etc.

* From the Admin Center, click 'Community Reports'.
* Click on 'Select Filter' and select the appropriate filter (member, module type, page, action).
* Click the checkbox beside the appropriate member/module/page/action and click 'Apply'.  You can select filters from different filter types to further refine your results.
* To delete a filter, click the small x beside it.
