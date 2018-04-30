#Creating and Managing a Schedule
To create a schedule of events that can be populated with instructors, learners, resources, etc. you must be logged in with administrator or pcoordinator permissions.  While you can create an entirely new schedule using a CSV or manually (one event at a time), if you have an existing course, the fastest option to make a schedule is to copy an existing schedule.  

You can also create individual events that appear immediately in the schedule.  To do so, navigate to Admin>Manage Events and click 'Add New Event'. At that point, follow the instructions in the Manually Add New Event section below.  Using this method, the event will immediately be live in the system upon saving.

#How to create a new schedule of events
* Navigate to Admin>Manage Events.
* Click 'Manage My Drafts'.
* Click 'Create New Draft'.
* Provide a logical draft name and an optional description, then click 'Create Draft'.

At this point you can import a CSV file or manually add new events.  

**Import CSV File**  

* You will need to have a file prepared with your schedule information.  This could include date, start time, faculty, audience, location, duration (in minutes) attendance required, etc.  For a detailed list of event information please see below.  
* Depending on the events you're scheduling it may be useful to download an existing schedule from elsewhere in Elentra, modify it, and upload it as your new schedule.  
* Click on Import CSV File.  
* Drag and drop or browse your computer to find the required file and then click Import.  
* Use the drag and drop tools to match the information in your CSV with the relevant fields in Elentra.  Suggested matches will display in red. Click 'Import'.

**Manually Add New Event**  

* Click Add New Event.  
* Complete the required information, noting the following:  
**Event Colour**: The colour selected will be displayed on the calendar.  
**Recurring Event**: More detail is available in the Recurring Events help section.  
**Time Release Options**: This controls when the event will be visible to users in the system.  
* Click Save.  

**Draft Schedule Permissions**
If you would like to give additional users access to a draft schedule, you'll need to add them as authors to the draft. Return to Admin>Manage Events, and click 'Manage My Drafts'. Click on the appropriate draft and then click the greyed out Draft Information heading. Add users to Draft Authors by beginning to type a name and clicking on the appropriate name in the displayed options. In stock Elentra you will be able to add staff:admin users to draft schedules but there is a setting for this that can be configured to allow you to add faculty and other staff as draft authors. You'll need a developer to help you change these settings if you'd like to.

Next, **you need to publish or approve your draft;** this will cause the events you created to be imported to the system and make them accessible for adding content.  

* Click Publish Drafts or, if you are returning to a draft you previously worked on navigate to your drafts, tick off the box beside the schedule you want to publish and click Publish Drafts.  
* Confirm your choice.  

Your schedule will now show as approved on your drafts list and **within about an hour**, the scheduled events will be live in your system.  If the events do not appear it's possible the behind the scenes actions required to do this are not turned on so speak to a developer to investigate further.

* If you need to make immediately changes to a recently published draft schedule, you can reset it to open.  
* Click the checkbox beside the schedule you want to open.  
* Click 'Reopen Drafts'.  
* Confirm your choice.  
Your schedule will now show as open again on your drafts list and you can click on it to edit events.

**Calendar Preview**
After you've drafted some events, use this tool to preview the calendar view of drafted events.

**Note that you will be unable to create event content until the drafted events are published.**

#Schedule import column headings and information
Note that if you have exported a schedule there may be some columns that exported which you are not required to import.  These columns can be deleted before uploading data.

* **Date**: Enter the date.  Multiple formats are accepted.  
* **Original Event**: If you are importing a completely new schedule this is unnecessary to complete, as an event id will be generated when the event is created.  If you have exported a CSV of copied draft events, this column will be populated with the unique id numbers of the newly drafted events.  
* **Parent Event**: This column should indicate if the event is a parent event or not (e.g. it is an event of which there are multiple copies in the system for multiple small groups - each event is identical in terms of structure and content but has a unique audience and perhaps teacher/tutor).  Enter 1 if the event is a parent and 0 if it is not.
* **Parent ID**: This column is applicable only if the event is to be linked as a child to a parent event.  If it is, enter the parent event id.  If this is not a child event enter 0.
* **Course Code**: Enter the course code for the course to which this event should belong.
* **Term**: This refers to the curriculum layout the course is a part of.  Curricular layouts are defined at the organisation level and can be found in Admin>Manage Curriculum>Curriculum Layout.  Examples include terms, years, phases, etc.  You can also view curriculum layouts from the Courses tab where the layouts will be the headings above groups of courses.
* **Start Time**: This is what time the event should start.  Enter in 24 hr. format.
* **Total Duration**: This is the total duration for the event. Enter in the number of minutes.
* **Event Type Durations**: If you have multiple event types scheduled in one event, this column can be used to indicate how much time is allotted to each event type.  Enter the time in minutes and separate times with semicolons and a space.  For example, 60; 60.  Put the times in the same order as you list the event types in the next column.  If there are not multiple event types scheduled during an event, this column will be identical to the Total Duration column.
* **Event Types**: If you have multiple event types scheduled in one event, this column can be used to indicate what those events are.  Event types must match the list of event types in your organisation (found in Admin>System Settings>Event Types).  Examples include lecture, lab, small group learning, etc.  Type in an event type and separate it from another with a semicolon and space.  For example, lab; lecture; patient interview. Remember to keep the order the same as the event type duration column.
* **Event Title**: Enter the event title.
* **Event Description**: Enter the event description.
* **Location**: Indicate the location of the event.  (Eventually this will need to match the locations stored in your organisation.)
* **Location Room**: This should indicate the room number is applicable (this should eventually match the buildings and rooms listed in Admin>Manage Locations).
* **Audience (Groups)**: If the course to which the event belongs is using the groups function and one or more groups is the audience for this event, provide the group name here.  Group names can be found via Admin>Manage Courses>*select course*>Groups.
* **Audience (Cohorts)**: If a specific cohort is the audience for this event, enter the cohort here.
* **Audience (Students)**: If individual students need to be added to the audience, provide the names in this column.
* **Attendance Required**: If attendance is required for this event and will be taken via the Elentra attendance feature enter a 1.  If the Elentra attendance feature will not be used for this event, enter 0.
* **Teacher Names**: Enter the names of any teachers to be linked to this event.  Separate multiple teacher names with a semicolon.
* **Teacher Numbers**: Enter the institutional id of any teachers to be linked to this event.  Separate multiple numbers with a semicolon.
* **Objective Release Dates**: If there are specific release dates for the objectives linked to this event, enter 1.  If not, enter 0.
* **Event Tutors**: Enter the name(s) of anyone to be linked to this event as a tutor. Separate multiple names with a semicolon.
* **Recurring Event**:  If this is a recurring event, enter the original event number of the first event in the recurring series.
* **Free Text Objectives**: This can be text and will populate the free text objectives box on the event content page (if such a box is enabled).
