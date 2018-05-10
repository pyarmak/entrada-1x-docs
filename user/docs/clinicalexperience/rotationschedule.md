#Clinical Experience Rotation Scheduling  

This page is available to curriculum coordinators, program coordinators and faculty directors.  Pcoor and faculty director users will only see schedules, rotations, etc. for the courses they are associated with on a course's setup page.  Before attempting to create rotations or schedule learners make sure that the relevant curriculum period has blocks built (this is a task that someone with an administrator role must complete via Admin>Manage Curriculum; find details in the Curriculum>Rotation Blocks help section). It will also be useful to have sites defined (sites are the different locations relevant to your programs, like cities or hospitals).  Sites have to be configured through System Settings by someone in an administrator role (for details see the System Setup>Location help section).

Building and populating rotations is a multi-step process.  It is useful to be familiar with the various steps in the process before you begin.  The steps require users to:  
1. Build a schedule which acts as a holding place for rotations.  An example of a schedule might be a program and year (e.g., Internal Medicine, 2018-2019).  
2. Build rotations within a schedule.  Rotations include the various clinical experiences learners might have within your program (e.g., Rheumatology, Cardio Consults, Hematology, Infectious Disease, etc.).  Within a rotation you will be able to define sites. (Sites are locations, for example different hospitals or cities.)
3. Build blocks within a rotation.  These will be based on the block structures available to your program and curriculum period based on the System Settings configured by a user with administrator permissions. You can define sites for a block.
4. Add and manage slots within a block.  Within a slot you can define minimum and maximum number of participants per site, and define availability for on service and off service learners.

After schedules, rotations, and slots are defined you can book learners into slots.

Once a schedule is created it can be copied and modified for future use.

#How to access rotation scheduling  
* Navigate to Admin>Clinical Experiences.  
* Click the 'Rotation Schedule' tab under the Clinical Experiences heading.  
* By default you will see all published schedules you have permission to access.  
* The 'Available Off Service Rotations' list is populated by off service rotations created by other programs and made accessible to your program.

#How to create a draft schedule  
* Navigate to Admin>Clinical Experiences.  
* Click the 'Rotation Schedule' tab under the Clinical Experiences heading.  
* Click 'New Draft'.  
* Provide a title, select a course from the dropdown menu, select a curriculum period from the dropdown menu and click 'Save'.  
* Next you can add on service and off service rotations to the draft.  See below for instructions on adding a rotation.  
* After a draft is complete, return to the list of My Drafts.  
* Click the checkbox beside a draft which will cause a publish button to display.  
* Click 'Publish' and then confirm your action by clicking 'Publish' again in the confirmation window.  

#How to edit an existing schedule
* Click on the name of the schedule.  
* Click on the pencil icon beside the schedule name.  
* Edit the title or add authors as required.  Authors will have permission to view and edit a schedule.
* Click 'Save'.

#How to add rotations to a schedule
* Navigate to Admin>Clinical Experiences.  
* Click the 'Rotation Schedule' tab under the Clinical Experiences heading.
* Click on the name of a schedule or click 'Manage My Drafts' to access draft schedules.
* After clicking a schedule name, you will see a list of existing rotations.  
* Click 'Add Rotation'.  
* Provide a title, code and description.  The code becomes the shortname of the rotation and is displayed on the rotation scheduler and on learners' schedules.  
* In the Sites field, select appropriate sites from the dropdown menu. You can associate multiple sites with a rotation which will makes those same sites available when you build blocks. (The list of available sites is based on locations added through Admin>System Settings and must be configured by someone with an administrator role.)  
* Choose the block schedules you wish to include.  Associating block schedules with a rotation will make those periods of time available to book learners into later.  Click the down arrow beside a block title to view the individual blocks and their dates.  (Blocks need to have been built in the relevant curriculum period via Admin>Manage Curriculum by someone with an administrator role.)  
* Click 'Save'.

* Note that you can also import a rotation structure, copy an existing rotation, and export a rotation.  

#How to manage existing rotations  
* Click on a rotation to edit its title, description, code/short name, site, date, etc.  
* Note that you can use the 'Shift Blocks' button to move blocks forward or back by several days.  This will shift the start and finish date of all blocks.  
* Click 'Save'.

#How to import a rotation structure  
* Create a draft (see above).  Click on the draft title if you aren't already in the draft.
* Click the down arrow beside Add Rotation and select 'Import Rotation Schedule' from the dropdown options.  
* Import a CSV that includes the short name and full name for all rotations. Note the link at the bottom of the window to download a sample CSV file.  
* Drag and drop or browse your computer to select a file.  
* Select a Template from those available (the available templates are defined by the blocks built in the relevant curriculum period).  You can select more than one template in which case you'll build rotations for all items listed in the CSV and all blocks selected.  
* Click 'Import Rotations'.  
* The created rotations will display in a list.  

#How to copy an existing rotation
* Create a draft (see above).  Click on the draft title if you aren't already in the draft.
* Click the down arrow beside Add Rotation and select 'Copy Existing Rotations' from the dropdown options.  
* Select an existing schedule from the dropdown menu (note that your options will be limited to the courses you have access to).  
* Click 'Copy'.  
* The copied rotations will display in a list.  
* Note that when you copy an existing rotation, CBME objectives associated with the rotation are not currently copied.  At present you will need to define the likelihood and priority settings for the EPAs associated with each rotation when you copy a rotation schedule.  (This applies only to users with the CBME module enabled in their installation of Elentra.)

#How to export a rotation
* Navigate to any rotation schedule.  
* Click the down arrow beside Add Rotation and select 'Export Report' from the dropdown options.
* Select a block type from the dropdown options.  (You can only select one block type at a time.)    
* Click 'Export'.
* A CSV file will download to your computer.  The file will include enrolled learners (name and student number), and all blocks in the rotation.  Each cell will display the shortname of where the learner is assigned during each block.

#How to manage slots within blocks
* Navigate to a rotation schedule and click on a rotation.  
* A list of blocks will display.  
* Click on a block name to open the block.  
* From here you can edit the block details and add slots to the block.  
* Click 'Add Slot'.  
* Select a slot type from the list.  The options are on service learner or off service learner.  On service slots will be open to learners enrolled in your program.  Off service slots can be made available to learners from other programs and if so, will display on the rotation lists of those programs.  Currently, there is no user interface to change these two slot type options.  
* Select a site for the slot.  The list of available sites is based on the sites assigned to the rotation.
* The 'Enforce occupancy limits' is used to provide information to a lottery system if your organisation uses a lottery.  Ignore it if you don't use a lottery.  
* Set the minimum and maximum number of learners for this slot.  
* Click 'Save'.
* You can add multiple slots to a block to provide an infinite number of opportunities for learners.

#Viewing the Learners tab  
* Click on the name of a schedule. Note that staff>pcoor users will only have access to their affiliated programs.
* Click 'Learners' from the tab menu below the schedule title.  
* A list of enrolled learners will display in the first column.  Their names, photos, id numbers and learner level (CBME learners only) will be included.  The other columns represent the blocks available for learners to be scheduled into.  
* Note the quick tools like jumping to the current block, changing the view from block to month to quarter, and the zoom function.  (The reset button will return your zoom to 100%.)  
* When using quarter view note that they system will still book a block in its specific dates even if the view is less clear.
* Greyed out areas on a learner's schedule indicate that the learner is scheduled into another program's rotation schedule (e.g., for a learner that is enrolled in two programs).  The rotation code will be displayed (includes course and rotation shortname) but a pcoor can't edit a booking outside their own program (they can book the learner into another slot in the same block).  
* Off service rotations you've booked a learner into will display in full color and show the rotation shortname.

#How to assign learners to rotations by booking learners into slots
* Click on the name of a schedule. Note that staff>pcoor users will only have access to their affiliated programs.
* Click 'Learners' from the tab menu below the schedule title.  
* To book a student in to a slot from an empty block, mouse over the block and your cursor will become a plus sign. Click.  
* The system will identify all available rotations and slots with start dates in the block you selected.  When you complete a booking the resulting card will fill the exact dates of the slot within the associated blocks.
* Select a rotation from the drop down menu.  Note that any off service rotations available to the learner will be displayed at the bottom of the list.
* Select a block from the dropdown menu.
* Select a slot (on service or off service).  
* You may customize the dates for a rotation if needed. Click the appropriate checkbox and adjust the start and end dates.  
* Click 'Save'.  
* You can add a learner to multiple slots within a block.  
* Hover on a filled block and click the small plus icon in the top right corner of the slot.  This will allow you to book a learner into another slot.  
* Select a rotation, block, and slot and click 'Save'.  

#How to edit an assigned slot
* Click anywhere on a filled booking to edit it.
* Adjust the information and click 'Save' or click 'Delete' to remove the learner from the slot entirely.

#How learners see their rotation schedule  
* Different learners will have different views of their schedules.  
* CBME learners can access their Rotation Schedule from their dashboard by clicking on the 'My Rotation Schedule' tab.  
