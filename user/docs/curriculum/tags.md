#Curriculum Tag Sets and Curriculum Tags  
Curriculum Tag Sets are the different taxonomies an organization uses to tag and track content across the system. The sets are customizable and within each set you can have a hierarchy of tags.  Examples of curriculum tag sets include school objectives, clinical presentations, diagnoses, etc.  These tags can be applied to courses, learning events, assessment items, exam questions, etc. Tag sets can be used as filters when searching the curriculum and are used in multiple reports.

While curriculum tag sets and curriculum tags are connected, there are differences in their creation and management.  You must create a tag set first and then populate it with curriculum tags.

#How to create a new curriculum tag set
* Navigate to Admin>Manage Curriculum.
* Click 'Curriculum Tags' from the left sidebar.
* Click 'Add Tag Set'.
* Complete the required information noting the following:  
**Tag Set Details:**
* Title and shortname are required for the tag set.  The title is displayed to users when using curriculum tags to label things and when using curriculum search tools.  
* Standardization: This field was developed for the Competency-Based Medical Education tools in Entrada and identifies a tag set that is standard across multiple courses/programs.  It is applicable to the "Stages" tag set that is required in CBME, but can be ignored when creating other tag sets.
* Applicable to: Usually curriculum tag sets are applicable to all courses, however you can adjust the setting, if needed.  This will control which courses are able to use this tag set to tag learning events and gradebook assessments.  
**Tag Options:**  
* This defines the information and requirements for any tags added to this set.  You can control whether there will be a space to record code, title, and description for each tag and whether any of those fields is required.  You must have a minimum of one required tag option.  If you later download a sample csv in order to import tags to this set the csv will include columns for the required fields configured here.
* Hierarchical levels: Here you can set how many hierarchies will be allowed within the tag set (for example you might have a set of objectives that has 3 levels in its structure like Competency, Program Objectives, and Curricular Objectives). If you use multiple levels, provide labels for each.
* Be aware that in many Entrada features when users apply curriculum tags to events or items, they will have to click through the hierarchy to find the appropriate tag.  Some features also allow users to select the top or second tier of the hierarchy and automatically apply all tags below to the course.  
**Tag Display Options:** Here you can specify how tags within this set should be displayed in short or long display mode. Some reports will rely on the different display methods and apply your specifications. To change the display order of the components, type in the %d, %t or %c codes as you wish them to appear. A sample of what the short and long display methods will look like will show on the right.  
**Mappable Curriculum Tag Sets:** One feature of curriculum tags is the ability to map tags from one set to another to create a map of how your curriculum tags overlap.  In this section you can define how the tags in the set you are creating can be mapped to other tag sets.  Click the down arrow beside 'Browse All Tag Sets' and check off the sets you want to be able to map to, noting there is a select all feature available.  To delete any unwanted tag sets from this list click on the small grey ‘x’ beside the tag set name in the 'Selected Tag Set' panel.

* Click ‘Save’ to complete the creation of the new tag set.  After saving, you will be redirected to the screen where you can add tags to your newly created tag set.

#How to delete existing curriculum tag sets
* Navigate to Admin>Manage Curriculum>Curriculum Tags.
* Click the checkbox beside the curriculum tag set you want to delete and then click ‘Delete Items’.

#How to modify existing curriculum tag sets
* Navigate to Admin>Manage Curriculum>Curriculum Tags.
* Click the name of the tag set and then click ‘Edit Tag Set’ from the buttons on the right.  This will open a page where you can edit the tag set information.

#How to create new curriculum tags
* Navigate to Admin>Manage Curriculum.
* Select 'Curriculum Tags'.
* Click on the name of the curriculum tag set you want to add tags to.
* Either import curriculum tags or add individual tags.

##How to import curriculum tags
* From a Tag Set page, click 'Import from CSV' and a popup window will offer you a sample CSV file to download.  The file will include the columns indicating the required fields for this tag set.
* Complete the file (remember to remove the sample line of text) and import it via the already open popup window to quickly create your tag set.
* To import the tags you can drag and drop the file or browse for it on your computer.
* If you are uploading to a tag set with **hierarchies**, select the parent tag you wish to import additional tags to.
* Click Import.
* You'll see a green success message with the number of tags created and then you'll be redirected to the tag set page where you can view the newly added tags.

##How to add new tags one by one
* From a Tag Set page, click 'Add Tag'.  
**Tag Details:**
* Status: Set this as Active to allow its immediate use; if you use Draft status this tag will not be available to users and you'll have to manually update its status when you want it to be available.
* Complete the code, title, and description as needed remembering that the availability of each field and whether it is required is managed at the tag set level.
* Set the Display Order if needed.  By default the new tag will be added to the end of the list of existing tags.
* Non-Examinable: At present this can be recorded for reporting purposes and does not interact or impact the functionality of other features.
* Loggable in Experience Logbook: Tick this box if this curriculum tag should be available to learners in the Experience Logbook (usually this is relevant to tags that will be used in clinical learning environments).  
**Map Curriculum Tags:** When creating a new tag you can link it to other curriculum tags if the tag set has been built to allow for such linkages (remember that is controlled at the tag set level).  
* Click on 'Map Curriculum Tags'.
* Use the Tag Set dropdown menu to find the tag you want to map to the tag you are editing.
* Click off the popup window in order to see the mapping relationship you've added.  It intentionally stays open for you to pick more tags as needed.
* To delete a link click the small x beside the mapped tag.
* Click 'Save'.  
**Admin Notes:** Use this space to record notes about a curriculum tag (e.g. the committee that requested the tag, reason for changes, etc.)
* Click 'Save & Close'.

* To add a tag in a **hierarchy**, navigate to a Tag Set page and click the plus sign beside the tag to which you want to add another level of tag. (Depending on whether you use list or table view you will see the plus sign or may need to hover over a tag until menu icons appear on the right.)
* Complete the tag details as you would for other tags and click 'Save'.

#How to modify your view of curriculum tags
* Toggle between a list view and table view of curriculum tags using the small icons beside the Add Tag button.
* In table view, add additional visible columns to the table by clicking on the grid with a down arrow beside it.  Adding additional columns can allow you to see id, code, title, description, and an overview of existing links between tag sets.

#How to edit existing tags
* Click on the pencil icon available to the right of the tag (you may need to use your mouse to hover over a tag for the menu icons to appear).

#How to link curriculum tags
If settings in a curriculum tag set are configured to allow the tags in the set to be mapped to other tags, you can do the mapping from the Tag Set page.
* From the Tag Set page click the chain or link icon beside a tag.  This will take you to the Map Curriculum Tags tab for this tag.
* Use the Tag Set dropdown menu to find the tag you want to map to the tag you are editing.
* Click off the popup window in order to see the mapping relationship you've added.
* To delete a link click the small x beside the mapped tag.
* Click Save.

#How to view tag history
* Click on any tag to access its details, mapping, admin notes and history.
* This history tab records all changes made to the tag and the user who created the change.

#How to quickly view tag details
* After you've opened any curriculum tag using the pencil icon to view its details, you can quickly navigate forward and back to view additional tags in the set using the arrows in the bottom left of the screen.  Easily jump to the first or last tag using the double arrow.

#How to delete curriculum tags
* To delete an existing curriculum tag navigate to the Tag Set page.
* Depending on your view you'll either see small icons in the right or you'll need to hover over a curriculum tag until you see small icons appear.
* Click the garbage pail to delete the tag

#How to export curriculum tags
* Navigate to Admin>Manage Curriculum.
* Click 'Curriculum Tags' from the sidebar
* Click on the name of the curriculum tag set you wish to export.
* Click export.
* A csv file will download to your computer; it will include objective id, code, name, description, parent, etc.
