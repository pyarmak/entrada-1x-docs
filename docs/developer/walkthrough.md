# Entrada Walkthrough

## Dashboard
The dashboard greets users when they first log in and includes a customizable sidebar.

Multiple items can appear on the sidebar.

| Item | Purpose |
| ----------- | ------- |
| My Organisations | Displays the different roles or permissions a user has if s/he has multiple roles. Users can switch between roles to accomplish different tasks. |
| My Bookmarks | Users can bookmark frequently visited pages. |
| Helpful Links | Preset and customized to a user's role in the system. |
| My Communities | Lists the communities a user is a part of. |
| Podcasts | A link to podcasts. |
| Give Feedback | Offers users a chance to provide feedback. |

Additional items that can be on the dashboard include a message centre, a calendar or list of upcoming teaching and learning events, and RSS feeds (customizable by user).

## Communities
Communities can be built by any system user.  Communities offer a place for users to share files, have online discussion groups, make announcement, etc.

Official Community (e.g. academic, institutional committees) and Other Community (e.g. sports and leisure, arts and entertainment) folders are preset to help organize any communities users create.

## Curriculum Tab
The Curriculum tab stores three tools available to search and view the curriculum: Curriculum Search, Curriculum Explorer, and Curriculum Matrix.  The Curriculum tab also links to Curriculum Reports.

### Curriculum Search
Curriculum Search allows users to search the curriculum using boolean operators.  Advanced options allow users to filter results by cohort, academic year, curriculum tags, course, and field (e.g. event title, event description, course, etc.).

### Curriculum Explorer
Curriculum Explorer allows users to select a curriculum tag and view the courses, learning events, and assessment where the tag is applied.  Results can be filtered by course, cohort, and academic year.

### Curriculum Matrix
The Curriculum Matrix provides a visual representation of where curriculum objectives are assigned to courses.

### Curriculum Reports
This tab provides links to a curriculum tag mapping report, curriculum review report, and learning event type report among others.

## Courses Tab
The Courses tab links users to a list of courses.

## Learning Events
This tab links to a calendar of events which can be filtered by teacher, course, cohort, etc.

## Clerkship
The Clerkship tab provides access to clerkship schedules, learner logs, and evaluations.  Faculty Directors can view learner progress within their specific program.

## People Search
This link allows users to search for other users and includes a browse users option.

## Admin
The Admin tab provides users with access to tools to manage things like curriculum, users, quizzes, gradebook, etc. and run reports depending on their role in the organization.

## System Settings
Accessing Admin>System Settings allows an authorized user to manage organizations within an installation, and within a selected organization to manage a variety of settings.  The default settings include Assessment Types, Assessment Flag Severity, Assessment Response Categories, Location Management, Clinical Rotation Categories, Grading Scale, Departments, Evaluation Response Descriptors, Hot Topics, Learning Event Types, Medbiq Assessment Methods (prepopulated), Medbiq Instructional Methods (prepopulated), Medbiq Resources (prepopulated), Restricted Days, User Disclaimers, User Meta Data.

It is recommended that you be mindful of how many users have access to System Settings.  In the default user roles, only Medtech>Admin can access System Settings.

## Manage Users
Authorized users can navigate to Admin>Manage Users to manually add a single user or import multiple users using a CSV file. To import multiple users from a CSV file, access a sample file by clicking the “Import From CSV” button.

## Manage Curriculum
The Manage Curriculum tab allows authorized users to modify curriculum layout, curriculum tracks, curriculum maps and curriculum tags.

### Dashboard
Coming soon.  This may eventually display information about where curriculum tags are in use.

### Curriculum Layout
In the Curriculum Layout section a user can define the curricular structure of the institution (e.g. terms, semesters, years, etc.).  Within each curriculum layout users can add curriculum periods with specific start and end dates.  These curriculum periods will be relevant to creating enrollment and audiences for specific courses/programs.  Within curriculum periods, users can automate the creation of block schedules.

### Curriculum Tracks
Curriculum Tracks can be used to identify courses that belong to or contribute to a specialization or concentration.  For example, within a Bachelor of Health Science program, you could create a nursing track. Then, during course setup, a course can be linked to an existing curriculum track.

### Curriculum Map Versions
Curriculum Map Versions allows you to link curriculum tags from different curriculum tag sets to each other for a specific period.

### Curriculum Tags
Through the Curriculum Tag tab institutions can customize their list of curriculum tag sets and the accompanying tags.  The tag sets and tags can be applied to courses, events, assessment items, assessment forms, etc.

## Manage Courses
Manage Courses allows authorized users to add and delete courses, and to manage course settings like course director, assigned curriculum tag sets, enrollment (which includes audience), available reports, etc.

### Creating a New Course
Navigate to Admin>Manage Courses.  Click the green Add Course button to add a new course.

#### Course Setup
Select a curriculum layout category (if this has not been set-up proceed to Admin>Manage Settings>Select Organisation>Curriculum Layout). Complete the available fields, noting the following:
* The colour selected will be used to identify learning events that are a part of this course on the learner calendar.
* If you indicate a course type, it presently creates metadata. It doesn’t impact the course template or anything else.

#### Course Contacts
This list can be modified in the language file of the Entrada installation if, for example, you want Course Director to say Program Director. Specific roles have certain preset permissions (e.g. Course Directors will be able to edit all learning events within the course).

#### Course Objectives
Map curriculum tag sets or individual curriculum tags to a course by drilling down to the appropriate tag set or tag and checking it off. These curriculum tags will be accessible to tag at the event level and in gradebook assessments. The curriculum tag set designated as Curriculum Objectives will be immediately visible on the right side.  All other curriculum tag sets will appear under "Other Objectives".

#### Course Reports
Indicate which reports should be available to this course by selecting them from the available options.

#### Course Enrolment
When selecting an enrolment, the available options will depend on the Curriculum Period defined in the Course Setup section. You can add multiple curriculum periods and cohorts or individuals to a course enrolment.

#### Course Syllabus
If this feature is enabled users will be able to generate a PDF summarizing the course information.

## Manage Events
From Admin>Manage Events, a user can add, delete and copy events, or create a draft schedule to publish multiple events.

### Adding A Single Event
When adding events note that the Recurring Events tool can be used to create multiple events that will regularly repeat. Users will be able to bulk change the characteristics of recurring events including event title, location, faculty, audience, etc. You can also designate the recurring events as having a child-parent relationship.

### Time Release Options
This allows you to restrict when the event will be visible to system users.

### Event Content
Complete the required fields using dropdown menus and text boxes as needed. Check off which curriculum tags mapped to the course apply to this learning event.  The curriculum tags assigned to the course through the course setup page will automatically be available.  All objectives within the system are accessible to be mapped through the Map Additional Objectives button.

### Event Attendance
Through this tab attendance can be manually recorded or moved into kiosk mode which allows users to swipe an id card to indicate their presence.

### Event History and Statistics
These tabs displays information about the event and its editing including who made what changes, when, and the number of times an event has been viewed.

## Manage Rotation Schedules
As rotation schedules are inherently time based, you are required to set up curriculum periods and their associated block schedules for the organisation you are looking to manage rotations for. Schools that have been using Entrada for a while will most likely have already set up most of the required data in order to utilize other aspects of the application.

### Setting Up Required Data Points

1. Log in as an administrator and navigate to "Admin > System Settings". Create or select the organisation you want to add rotations to.

2. Once you are managing the appropriate organisation, select "Curriculum Layout" from the sidebar. Select or create a curriculum layout for your organisation.

3. From the curriculum layout, we can see a list of curriculum periods. If you have not set up any periods, you must do so to set up a block schedule. Next to the curriculum periods, you will see a "Block Schedule" link. Follow this link for the desired curriculum period.

4. From here, click "New" to begin setting up the block schedules for the curriculum period.

### Setting Up Block Schedule Templates

A block schedule is a set of time "blocks" within the overall rotation schedule. The most typical sets of block lengths are 12 four-week blocks, 26 two-week blocks, and 52 one-week blocks. Block types are pulled from the `cbl_schedule_lu_block_types` table. Upon saving a block schedule, you will see new controls to set the day of the week that blocks will end on, what type of blocks they will be, and an option to manually add blocks. Select the desired options and save your changes. Afterwards, press the dropdown on the save button and select "Auto-generate Blocks". This will create all of the blocks that should exist for the date range provided. You will need to repeat the process for each block schedule type you want within your rotations.

### Creating Rotation Schedules

At this point you should be able to set up rotation schedules within the organisations and curriculum periods that you have set up block schedules for. To accomplish this, navigate to "Admin > Rotation Schedule". You will need to begin by creating an unpublished draft and selecting a curriculum period that has block schedules. A draft is a set of rotation schedules belonging to a course for the curriculum period. After creating the draft, click the "Add Rotation" button. Upon saving the rotation, it will inherit blocks based on the block schedule templates that you have set up for that curriculum period.

### Scheduling Learners

To add a learner to a slot, navigate to the "Learners" tab. You will see a visual representation of all of the blocks over the curriculum period. To schedule a learner, click on a corresponding block beside their name. From here you will be able to select any rotation that has blocks that fall into that time frame.
