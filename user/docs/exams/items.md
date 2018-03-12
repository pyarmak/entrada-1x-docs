#Exam Items
Exam items include the questions, prompts, etc. that are included on an exam.  Items are stored in folders and can be created through the Questions tab, while creating an exam, or can be imported.  To allow other users to access questions to edit them or use them on exams, you must add permissions to the questions.  This is done after the question is created.

#How to manage question folders
* Only users with **Admin roles** can create question folders.  This is be design to limit the duplication of folders and promote consistent methods in storing items.  Note that non admin users *will* be able to add questions to existing folders.  
* Navigate to Admin>Manage Exams and click 'Questions' from the left sidebar.
* If a new folder is needed, click 'Add New Folder'.  
* Complete the required information, noting the following:
* Click 'Select Parent Folder' if you want to create a subfolder within an existing folder.  The permission settings of the subfolder will automatically match the permission settings of the parent folder.  Click on the desired parent folder and click 'Move'.
**Folder Text:** Provide the folder title here.  This will display when you click 'Questions' and see a list of folders.  
**Folder Description:** You will only see this if you open the folder to edit it.  
**Folder Color:** The system requires you to select a color.  
* Click 'Save' to create the folder.

* To copy, delete, edit and manage folder authors, or move a folder, click the the gear icon to the right of the folder name.  You will only have the ability to do this if you created the folder or are listed as a folder author.
* To add permission for other users to access a folder, select the user type (individual, organisation or course), begin to type in a name and click on the name you want.  The selected user will appear on a list below.  To remove a permission click the red x beside a name.  If you make a folder accessible to an organisation it means anyone in that organisation with access to the exam module will be able to access the folder.  If you make a folder accessible to a course, anyone listed in the course contacts section of the course setup page will be able to access the folder.  

* Hide the list of question folders by clicking on the eye icon beside the Add New Folder button.
* Click on a folder to view its subfolders.

#The types of questions supported by Entrada
Entrada currently supports a variety of question types: Multiple Choice (vertical and horizontal – use ‘multiple responses’ to allow for multiple correct answers), short answer, essay, matching, text, and fill in the blank. Different question types have different templates for their layout.

A ‘text’ question can be used to provide instructions.

#How to create questions
Within a folder, users can manually add individual questions, import questions in bulk through a free text box, or migrate questions, images, and responses from another exam management tool (this last tool is only available to Medtech Admins).  This section addresses how to manually create individual questions; please see additional tabs for information on importing questions.  Note that the system stores a record of who created a question and displays this information in the question detail view.

* Navigate to Admin>Manage Exams and click 'Questions' from the left sidebar.  You will automatically be working under the Questions tab.
* Click 'Add New Question'.
* Complete the required information noting the following:
**Question Stem:** Type the question text in this section and edit it using the rich text editor.  Insert images, tables, horizontal lines, hyperlinks, etc.

To insert an image into a question stem, click the landscape icon in the rich text editor.  In the Image Properties popup window select ‘Browse Server,’ drag and drop or choose a file from your computer to upload.  After you’ve added the image you can change the name in the Alternative Text field; additionally, you can adjust the Width and Height fields (it is recommended that you click on the lock icon to change the aspect ratio of the image).

To insert media into a question stem, click the film strip icon and paste the embed code into the popup window.  

**Question Information:**  

* Question Type: Select the required question type.  (Note: use ‘multiple responses’ questions if you want to have multiple correct answers.)  
* Question Description: Add a descriptive title.  This will display in the list view of exam items and is helpful when scanning a list of items within a folder.  
* Rationale: Add a question rationale. Rationale is shown to learners when they get feedback on their exam and can explain a question answer or provide additional detail.  
* Correct Text: This option will display **only when creating essay and short answer questions.** It is a space to provide sample answers or list what should be included in an answer.  This text is **not** visible to learners and is intended to provide information to graders.  When a grader corrects a free response question, they will see the correct text on the screen to help them grade the response.  If you use this question type and have faculty provide narrative feedback when they grade the questions, you must set the exam to release feedback for ALL questions for learners to be able to see the narrative comments from the grader.
* Question Code: This optional code field can be completed according to the guidelines set by your institution. (Every question will also automatically be given a unique identifier within Entrada and that unique id displays when viewing a list of questions within a folder.)  
* Parent Folder: If you were already in a folder when you clicked 'Add A New Question' this will automatically list that folder.  If you were not already in a folder, it is mandatory to assign your question to a specific folder.  Click 'Select Parent Folder', click on a folder name, and click 'Done'.  

**Question Answers:**

To add more answer options, click the green 'Add Answer' button.  To reduce answer options, click the large checkbox beside the correct response, crossed arrow and lock icons, then click the red 'Delete' button on the left.  

* Click the existing red checkmark beside a response to turn it green and indicate a correct answer; depending on your question type you can have multiple correct answers for one question.  
* You can create Rationale for each answer option by clicking on the eye icon beside the Add Answer button.  This will open a free text rationale space below each answer option.  This does not currently display to learners so is just for information storage at present.
* Reorder answer options by clicking on the crossed arrows and dragging and dropping the response item in the appropriate place.  
* If you intend to later randomize the answer response options for all questions on an exam post and want to lock an answer in place, move it to the appropriate location and click on the lock icon to close it and turn it red.  An example for using this might be a multiple choice question where an answer option is "All of the above" and you always want this option to appear last in the list of answer options.  (A reminder that you will set up randomization of questions and/or response options when you create an exam post.)  
* Curriculum Tags: You can add curriculum tags to any question based on the tag sets configured through Admin>Manage Curriculum.  Click 'Add Curriculum Tag', click on tag set names to drill down to the tag you require, click on it and it will appear in the list on the right. Some of the exam reporting tools rely on curriculum tags so in addition to mapping your curriculum and assessments, this can be useful to do for reporting on assessment results.  Note that you can apply curriculum tags to multiple questions at once using the Actions options after questions have been created.

For certain question types, additional fields will be required:
* Multiple Choice Vertical and Horizontal (multiple responses): Grading Scheme  

For these question types you can set the grading scheme as partial, all or none, or partial with penalty.  
**Partial:** This will give partial credit for every correct reaction (e.g. selecting a correct answer AND not selecting an uncorrect answer).  It divides the total point value across the number of response options and awards credit for each response option which is correctly responded to (selected if correct, not selected if not correct).  
**All or none:** A learner must answer all correct answers correctly.  If they miss an answer (whether they select an incorrect answer or miss selecting a correct answer), the learner will get 0 points.  
**Partial with penalty:** This will give partial credit for every correct reaction and will penalize a learner for an incorrect answer.  The system divides the total point value across the number of response options and awards credit for each response option which is correctly responded to (selected if correct, not selected if not correct) and deducts credit for an incorrect answer.

* Click 'Save' to save your question.

* To add permissions to individual questions, navigate to a list of questions and click the pencil icon beside the question title.  
* Click the greyed out Question Information heading to open it.  
* In the Question Permissions section, select the user type (individual, organisation or course), begin to type in a name and click on the name you want.  The selected user will appear on a list below.  To remove a permission click the red x beside a name.

#How to create grouped questions
-	Only users with admin roles can create grouped questions through the Manage Exams Question menu.  Other users will be able to create grouped questions when creating an exam.  
- The function of a grouped question is to bind a number of items together and have them appear together on an exam. Grouped questions will be stored in the Grouped Q’s tab.
* Navigate to Admin>Manage Exams and click 'Questions' from the left sidebar.  
* Click the Grouped Q's tab just above the Questions heading.
-	Click ‘Add Group’.
-	Provide an appropriate group title and then add a description if desired.  This will display in the list of Grouped Q's.
- Provide an optional description for the grouped question.
-	Add permissions to allow another user to edit this group if applicable.  A user must have permission to a question to add it to an exam at a later date.
-	Click Attach Questions to search for and add existing questions.
o	Click the checkbox beside each desired question (or select all by clicking the checkbox beside the 'Actions' dropdown menu above the list of items).
o	Click ‘Attach Selected’ in the top right.
-	Click the down arrow beside Attach Questions to create a new question in the question bank and add it to your grouped item at the same time.
o	Create a question and click ‘Save’ when done.  You will return to the Edit Grouped Question page and can add another question.
-	After attaching the required questions, reorder them as desired by clicking the crossed arrows and dragging and dropping the questions, and then click the blue ‘Save’ button.  
- You will see a green success message on the screen and then can navigate to a new location.  
- To edit an existing grouped question, click on the question title to reopen it.  To delete questions from a grouped question, open the question, click the checkbox above the question ID number and click 'Delete Questions'.
- To delete entire grouped questions, from the Grouped Q's list click the checkbox beside the grouped Q title and click 'Delete Group'.

You can also group questions from an exam.  For more detail on that process, see the Exams>Create help section.

#How to quickly view questions
View all questions or questions within a folder in list form or detail form by selecting the different grid icons.

In Question Detail View, quickly show details for all questions by clicking on the eye icon to the left of the 'Add A New Question' button.  To review details or make edits to a question click the eye or pencil icon respectively.  Note that if an item is part of a grouped Q you will also see a chain icon.  Click on it to see the details of the grouped Q.

In Question List View, click the pencil icon to edit a question, click the magnifying class to preview a question, click the chain icon to view grouped Q details, or click the forward back arrows to see an overview of question versions.

An important aspect of viewing questions is the ability to turn subfolder view on or off.  If subfolder view is off, you'll only see questions in a folder when you've clicked on that folder.  If subfolder view is on you'll see all questions within all applicable folders.  If you click on a folder that has multiple subfolders this allows you to quickly see all the contents of all subfolders at once.

#How to delete, move, and bulk tag questions
Select questions by clicking on the checkbox beside their title (or select all by clicking the checkbox beside the 'Action' dropdown menu).

To delete a question, click the checkbox beside the question, from the Action dropdown menu select Delete.  Confirm your choice by clicking 'Delete'.  The question will be removed from the list.

To move a question to a new folder, click the checkbox beside the question, from the Action dropdown menu select Move, click on the appropriate destination folder, and click 'Submit'.  You will see a green success message at the top of the screen.

To change the curriculum tags applied to multiple questions, click the checkboxes beside the questions, from the Action dropdown menu select Tag Questions, choose how you want to change the question tags, click on tag set names to drill down to the tag you require, click on it and it will appear in the list on the right, and then click 'Apply'.

#How question versioning works
Any time you make a change to a question, a new version will be recorded.  A new version will be created for any change—correcting a typo, linking the question to additional curriculum tags, altering a response option, etc.

When creating exams, you can add a question with multiple versions and actually select an older version if desired. Do this by clicking on the forward/back arrow icon.  If a question has changed since you created an exam you will be given a notification for that and can update your exam, however you can still elect to use the old version of the question if you prefer.  If the forward back arrow icon is blue it means you’re not using the most recent version of a question on an exam.

#How to search for questions
* Click on a folder title to look for questions within a specific folder. Turn sub-folder view on or off to see more or fewer questions.  
* Type in a word or phrase to retrieve any questions with matching terms.  The search feature looks within question descriptions and stems.  
* Use Advanced Search to further refine your results by filtering by a curriculum tag, question permissions, or exams. You can apply multiple tags to one search.  To use the Advanced Search feature, click 'Advanced Search', click your desired filter type, click through hierarchies and type text within a hierarchy to find your desired filter, scroll down within the advanced search window and click 'Apply Filters'.  The tags you've applied will display under the search bar.  Remember to clear your filters as needed when you begin a new search.  You can click on the x beside a filter name or open Advanced Search and click 'Clear All Filters'.

* Toggle between a list view and question detail view of your search results using the icons on the left (beside the subfolder on-off control).  
* In list view, edit, preview, or view groups for a question by using the pencil, magnifying glass, and chain icons respectively.  
* In question detail view, quickly view the expanded details of all question by clicking on the eye icon to the left of the Actions button.  
