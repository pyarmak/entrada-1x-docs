#Course Setup Tab  

**Course Setup:** The first section of this page is complete with the information provided when creating the course.  If you need to edit any of that information you can do so here.

**Course Contacts:**  

* Assigning someone as a course/program director or curricular/program coordinator will allow that person to edit the course content, including all associated learning events.  Their contact information will also be displayed on the course background page if you create a course community/website for the course.  
* Assigning someone as associated faculty will allow that person to be assigned as a grader to exams. Their contact information will also be displayed on the course background page if you create a course community/website for the course.  
* Assigning someone as a teaching assistant can result in that person's information being displayed on the relevant course page (if the appropriate setting is turned on) but will not give the user any additional permissions.

The list of course contact options can be modified by a developer in the language file of the Elentra installation if, for example, you want Course Director to say Program Director.

**Course Keywords:**  
This is an optional feature that can or cannot be used in Elentra; by default it is not enabled.  Keywords allows you to assign Medical Subject Headings (MeSH) to courses and later to specific learning events.  The Course Keyword feature is separate from curriculum tag sets and as such has limited reporting abilities when compared to a tag set.  (The MeSH keywords are reported on in the Curriculum Inventory Reporting tool if you use it.)  If your organisation has a list of keywords to be tracked across the curriculum it is recommended you make those words a curriculum tag set.  

To effectively use the MeSH keywords feature a developer will need to import a connection to the the MeSH database to your installation of Elentra.  To hide the keywords feature entirely, a developer will need to delete some tables from your installation.

**Course Objectives:**  
If you are using the Unit/Weeks feature of Elentra, assigning curriculum tags functions slightly differently; please see below in the Course Tags section.  If you don't see any option to add Course Objectives or Curriculum Objectives it may be because there are no tag sets built for your organisation.  Go to Admin>Manage Curriculum to build tag sets (for more information see ![here](https://docs.entrada.org/learn/curriculum/tags/)).

![Assign Objectives](/img/courses/assigningcourseobjectives-me1.12.png)  

Map curriculum tag sets or individual curriculum tags to a course by clicking 'Show Curriculum Tag Sets' and clicking through to the appropriate tag set or tag and checking it off. Assigned curriculum tags will be accessible to tag at the event level and in gradebook assessments.  They will also display on the course page and be visible to learners.

For your primary tag set displaying under 'Curriculum Objectives' you may see the option to designate a tag as primary, secondary or tertiary.  If you use this feature the objectives will be displayed under primary, secondary and tertiary headings on the course page visible to learners.

The curriculum tag set designated as Curriculum Objectives will be immediately visible on the right side.  All other curriculum tag sets will appear under "Other Objectives".

Note that if you want students to be able to log specific objectives they should be assigned to the course.

**Course Tags:** Only for use if your installation of Elentra has weeks/unit and context-based linkages enabled.  If you don't have these features enabled you won't see this section of the page.

* Select the appropriate Curriculum Period from the dropdown menu.  
* Select the appropriate Curriculum Map Version from the dropdown menu.  (Configure a curriculum map via Admin>Manage Curriculum if necessary.  More information can be found in the Curriculum>Map Versions help section.)  
* Select curriculum tags from the dropdown menu.  Whatever is added as a Course Tag will display on the course page.  
* If you choose to, you can click on a curriculum tag added as a course tag and map it to another curriculum tag.  This is context-based linking.  The linkages you create will be reflected in the map of the curriculum tag if you have enabled the tag set to be mappable to the appropriate tag set; however, the link will not be automatically recorded in the history of the tag.  
* The course tags and any context-based linkages you create will be displayed on the course page.

**Course Reports:**  

Indicate which reports should be available to be generated from this course by selecting them from the available options.  In stock Elentra you will see Report Card and My Teachers as available report types.  There is no user interface to control which reports are available to which organisations within an installation of Elentra, but the database can be configured to allow specific reports to be accessible to specific organisations.

* Report Card does not fully function right now but it is intended to allow users to select a learner, and view a table showing curriculum tags as rows, and learning events, simulations, and logbook across the top.  In each grid matrix you see a completion rate (e.g. 1/3, 2/5) in terms of attendance and completion.  For the learning events the denominator is the number of events where attendance was required and that curriculum tag was applied.  The numerator is how many times the learner was present at those events (this tool assumes you are using attendance tracking in Elentra).
* My Teachers will provide a report displaying the names and email addresses of all teachers active in the course.  You can select the teachers you want and generate an email list to quickly communicate with people.

![My Teachers Report](/img/courses/myteachersreport-me1.12.png)  

**Course Enrolment:** This will appear near the bottom of the screen but was already completed during the initial course build.  If you need to edit the enrolment you can do so from here.  

**Course Syllabus:** If this feature is enabled users will be able to generate a PDF summarizing the course information provided in the course website tabs.  There is a default undergrad template that comes with stock Elentra.  Syllabi will be accessible from the Courses tab where all courses are listed.  Syllabi will only display while a course is running (i.e., as in during the course's defined curriculum period).  Please note that there may be up to a 24-hour delay between enabling a syllabus for a course and it being visible to users because of a required behind-the-scenes action that runs every 24 hours.

![Accessing Course Syllabust](/img/courses/syllabusicon-me1.12.png)

* After completing the required fields in Course Setup, click 'Save'.
