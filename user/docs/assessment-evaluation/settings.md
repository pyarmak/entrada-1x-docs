#Assessment and Evaluation Settings

To effectively use the various assessment tools in Entrada some initial setup is required.  Organisations can define assessment characteristics (within existing assessment types), grading scales and response categories for assessment and evaluation forms.

#How to manage assessment characteristics

Assessment characteristics should be configured if you plan to use course gradebooks.

When using the course gradebook you will need to define the assessment characteristic for each assessment added.  Each assessment type has different extended options for recording data (e.g. the type of included questions for quizzes and exams, or whether to track late submissions for papers and projects).  
![Assessment Characteristics in Gradebook](/img/assessment-evaluation/assessment-characteristics-gradebookdisplay-me1.11.png)

Entrada comes with a set of assessment types.  These include assessment, exam, paper, presentation, project, quiz, rat, rating, and reflection.  Within each assessment type you can further specify assessment characteristics (e.g. oral exam, written exam, OSCE).  While there is no user interface to change the list of assessment types, the assessment characteristics list is completely configurable through the user interface.  Assessment characteristics can also be mapped to MedBiquitous Assessment Methods if required by an organisation. Whatever is created as an assessment characteristic can later be applied to the assessments listed in a course gradebook (see image above).

* Navigate to Admin>System Settings.
* Click the name of the organisation for which you want to manage assessment characteristics.
* Click 'Assessment Types' from the left sidebar.  A list of existing assessment characteristics grouped by assessment type will be displayed.
* Click 'Add Characteristic' to add a new assessment characteristic.
* Complete the required fields.  The description is optional and is not often seen in other parts of Entrada.  (It's possible that in the future if you mouseover an assessment characteristic you'll see it's definition but that is not a current feature.)
* Click 'Save'.
* The newly added assessment characteristic will now appear on the Assessment Types list.

* To modify an existing assessment characteristic click on it.
* Edit it as needed and click 'Save'.

* To delete existing assessment characteristics click the checkbox beside the characteristic you wish to delete.
* Click 'Delete Selected'.
* Confirm your choice.
* You will be returned to the list of Assessment Types.

#How to manage the grading scale  

The grading scale is not a required feature of Entrada and does not currently link with other modules.  Eventually, this could be used to configure display options and to show students their grades using the grade scale instead of a raw score.  For example, if a learner scores 14/20 they would see the corresponding grading scale grade (e.g. 70% or 2.7).

* Navigate to Admin>System Settings.
* Click the name of the organisation for which you want to manage the grading scale.
* Click 'Grading Scale' from the left sidebar.
* A default grading scale is provided and it may be fastest to modify the existing scale to suit your organisation's needs.  If so, click on the default scale to edit it.
* To add an entirely new scale, click 'Add New Grading Scale'.
* Complete the required information noting the following:  
**Applicable Date:** Set the applicable date for the relevant grading scale.  This ensures that learners see the grading scale relevant to their enrolment and experience.
**Ranges:** Click 'Add Range' to add additional rows. Begin with the lowest range because the system is set up to require a range that starts at zero (you will be able to reverse the display order later).  Note that you do not enter a number to denote the top of the range.  After you've added a range starting at zero you'll be able to add additional ranges at various starting percentages and the starting values defines the end of the previous range.  
* To delete a range click the red minus icon in the remove column of the appropriate row.
* When you've added all the required information, click 'Save'.
* To reverse the display order of the range start values, click the arrow beside Start %.  

* To **edit an existing grading scale** click on its title.
* Make the necessary changes.
* Click 'Save'.  
* To **delete an existing grading scale** click the checkbox beside its title.
* Click 'Delete Selected'.

#How to manage assessment response categories
Assessment response categories (e.g., excellent, good, needs improvement) are used to populate rubrics when creating items in the Assessment and Evaluation Module.  The categories can also be applied to specific rating scales and when those rating scales are applied to items the response categories will pre-populate.

* Navigate to Admin>System Settings.
* Click the name of the organisation for which you want to manage assessment response categories.
* Click 'Assessment Response Categories' from the left sidebar.
* Click 'Add Category'.
* Enter the response category.
* By default, all categories will be available in reports so uncheck the box if you don't want the category to be available in reports.
* If multiple categories have been created and are overly similar, you can merge selected categories *and any previously logged data will be preserved in the newly merged category*.  To do this, click the checkboxes beside the categories to merge, then scroll down and click 'Merge Selected'.
* To delete categories, click the checkbox beside the category you wish to delete and then scroll down and click 'Delete Selected'.
* Response categories are displayed in the order they were added so use the search function to quickly look for existing categories.  Results will appear as you type.

#How to manage rating scales in assessment and evaluation  
When you create assessment and evaluation items you will have the option of applying rating scales to certain item types.  You can build rating scales through the Assessment and Evaluation module.

* Navigate to Admin>Assessment and Evaluation.
* Click the Scales tab from the A&E tabs list.  Any existing rating scales will be displayed.
* Click the green 'Add Rating Scale' button.
* Complete the required information, noting the following:  
**Title:** Title is required and is what users will see when they build items and add scales so make it clear.  
**Description:** This is optional and is not often seen though the platform.  
**Rating Scale Type:** This defines the type of rating scale you are creating.  Later, if you add rating scales to items, or add standard scales to form templates, you will first have to select a scale type.  There is no user interface to configure rating scale types.  
* Add or remove response categories by clicking the plus and minus icons.
* For each response category, select a descriptor (these are configured through the assessment response categories).  Note that you can search for descriptors by beginning to type the descriptor in the search box.

* To edit an existing rating scale click on the scale title, make changes as needed, and click 'Save'.
* To delete a rating scale click the checkbox beside the rating scale and click 'Delete Rating Scale'.

Once scales are created, they will become visible options when creating items and forms (if using form templates).

#How to manage evaluation response descriptors
Evaluation response categories are used to create rubrics in a relatively old Clerkship Evaluation feature.  It is **strongly** recommended that instead of the Clerkship Evaluations feature you use the more recent Assessment and Evaluation module.

* Navigate to Admin>System Settings.
* Click the organisation for which you want to manage the evaluation response descriptors.
* Click 'Evaluation Response Descriptors' from the sidebar.
* Click 'Add Descriptor' to add a new descriptor.
* Add the response descriptor and set the display order (required).
* By default, response descriptors are not made available in reports so tick off the box if you wish to make them available in reports.
* Click 'Save'.
* To delete descriptors, tick off the box beside the descriptor you wish to delete and then scroll down and click 'Delete Selected'.
* Use the search function to quickly look for existing descriptors.  Results will appear as you type.
