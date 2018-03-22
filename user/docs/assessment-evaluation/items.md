#Managing Items in Assessment and Evaluation
The assessment and evaluation module provides a way for learners to be assessed, especially in clinical learning environments, and a way for all users to assess courses/programs, faculty, learning events, etc.  Any forms used for assessment and evaluation require form items (e.g., questions, prompts, etc.).

When a user creates items, s/he automatically has permission to access and use that item.  However, additional permissions can be added to items after they have been created.  This is important to note because if you want another user to have access to edit an item or to add it to a form you should give that user permission to access the item.

If you are creating items for a form to be attached to a gradebook post for the purpose of online grading using a dropbox and Assessment and Evaluation form please note that not all item types are currently supported because there is no structure to weight them on the form posted to the gradebook.  When creating items for a form to use with a gradebook dropbox it is recommended that you only use multiple choice, dropdown selector, rubric and scale items.  If your form requires narrative comments do not use the free text comment item type as the grader will not be able to save their comments; instead, allow or require comments on your scale or rubric items and encourage graders to provide feedback within the rubric or scale item.

#How to create single items for use on assessment and evaluation forms
* Note that you **can copy existing items** which may save time.  To copy an existing item, click on the item and click 'Copy Item' which is beside the Save button.

* Navigate to Admin>Assessment & Evaluation.
* Click 'Items'.
* Click 'Add New Item'.
* Complete the required information, noting that different item types will require different information.  Common item details are below:  
**Item Type:** This list shows the item types supported by Entrada. Item codes will display when you use a list view of items and    A complete list of item types is provided below.  
**Item Text:** This is what will show up on a form this item is added to.  When you view items in the detail view you'll also see the item text.   
**Item Code:** This is an optional field.  Item codes do display when you view items in a list and they are searchable.  Some organizations apply their own coding system to their items, but another use case might be if you are importing items from another tool or vendor and they have a coding system you want to match.  
**Rating Scale:** Rating scales can be configured through the Scales tab within Assessment & Evaluation.  First select a scale type and then select the specific scale.  Selecting a rating scale will prepopulate the response categories for this item.  In some item types you will also be required to add response text (e.g. multiple choice items) and that text will show up on the actual form.  In other question types you may rely on just the response categories.
**Mandatory:** Click this checkbox if this item should be mandatory on any forms it is added to.  
**Allow comments:** Click this checkbox to enable comments to be added when a user responds to this item.  If enabled, you have several options to control commenting.  
> **Comments are optional** will allow optional commenting for any response given on this item.
> **Require comments for any response** will require a comment for any response given on this item.  
> **Require comments for a prompted response** means that for any response where you check off the box in the Prompt column, a user will be required to comment if they select that response.  

**Allow for a default value:** If you check this box you will be able to select a default response that will prepopulate a response when this item is used on any form.  Set a default response by clicking on the appropriate response line in the Default column.  

* Depending on the question type, add or remove answer response options using the plus and minus icons.
* Depending on the question type, reorder the answer response options by clicking on the crossed arrows and dragging the answer response option into the desired order.

* Add curriculum tags to this item as needed.
* If you have access to multiple courses/programs, first use the course/program selector to choose the appropriate course/program which will limited the available curriculum tags to those assigned to the course/program. Click the down arrow beside the course selector and search for the course by beginning to type the course name.  Click the circle beside the course name.
* Click through the hierarchy of tags as needed until you can select the one(s) appropriate for the item.
* As you add curriculum tags, what you select will be listed under the Associated Curriculum Tags section.
* Scroll back up and click 'Save'.

##Item types
* Horizontal Multiple Choice (single response): answer options will display horizontally on the form and the user can select one answer.  Response text required; response category optional.
* Vertical Multiple Choice (single response): answer options will display in a vertical list on the form and the user can select one answer. Response text required; response category optional.
* Drop Down (single response): answer options will display in a dropdown menu. Response text required; response category optional.
* Horizontal Multiple Choice (multiple responses): answer options will display horizontally on the form and the user can select two or more answers. Response text required; response category optional.
* Vertical Multiple Choice (multiple responses): answer options will display in a vertical list on the form and the user can select two or more answers. Response text required; response category optional.
* Drop Down (multiple responses): answer options will display in a dropdown list that remains open and allows users to select multiple responses using the control or command and enter/return keys.
* Free Text Comments: use this item type to ask an open ended question requiring a written response. (In ME 1.11 and lower you can not map a free text comment to a curriculum tag set.)
* Date Selector: use this item type to ask a question to which the response is a specific date (e.g. What was the date of this encounter?)
* Numeric Field: use this item type to ask a question to which the response is a numeric value (e.g. How tall are you?)
* Rubric Attribute (single response): use this to create an item that relies on response categories as answer options.  If you enter text in the response text area it will not show up to the user **unless you create a grouped item.** If you create a grouped item remember you need to use the same scale all across items to be grouped together.
* Scale Item (single response): use this to create an item that relies on response categories as answer options.  If you enter text in the response text area it will not show up to the user **unless you create a grouped item.**  If you create a grouped item remember you need to use the same scale across all items to be grouped together.
* Field Note: Queen's/CBME?

#How to create grouped items
Creating a grouped item allows you to group items and guarantee that they appear together on forms.  If you use the rubric attribute or scale item item types, creating a grouped item will create a rubric with common response categories (e.g. developing, achieved) and specific response text for each field (e.g. performed a physical exam with 1-2 prompts from supervisor, independently performed a physical exam).

* Navigate to Admin>Assessment & Evaluation.
* Click on the Items tab.
* Click on the Grouped Items sub-tab.
* Click 'Add A New Grouped Item'.
* Provide a grouped item name and select a rating scale type and then a rating scale.  All items in the group will have the same response categories assigned to them, as configured through the rating scale.  You will be able to change the rating scale later if required.  (Rating scales can be set up through the Scales tab in Admin>Assessment and Evaluation.)
* Click 'Add Grouped Item'.
* Complete the required information, noting the following:
**Title:** This will display when you view a list of grouped items.  
**Permissions:** Adding a group, course, or individual here will give those users access the the grouped item.
* To add items to a grouped item you can either create and attach a new item or add existing items (click the appropriate button).  
* If **attaching existing items,** use the search bar and filters to find items.  You will only be shown items that match the rating scale parameters you've selected.  Click the checkbox beside a question (in list view) or beside the pencil icon (in detail view) and click 'Attach Selected'.  Because an existing item may already be in use on another form, in some cases you will not be able to modify the response descriptors for that item.
* If **creating and attaching items,** follow the instructions above for creating items.  The rating scale for your new items will be set to match the rating scale of the grouped item.  After creating one item, you can repeat the steps to create and attach as many items as needed.
* Click 'Save'.
* To edit an item click on the pencil icon.  Bear in mind that an existing item may already be in use on another form.
* To delete an item from a grouped item, click on the trashcan icon.
* To reorder the items in the grouped item, click on the crossed arrows and drag the item into the appropriate location.
* When you have added all required items to the grouped item, click 'Save'.
* Click 'Grouped Items' at the top of the screen to return to the list of grouped items.

#How to add permissions to existing items  
* Navigate to Admin>Assessment and Evaluation.
* Click 'Items'.
* From list view, click on any item to open it.  From grid view, click the pencil icon to edit an item.
* Give permission to an individual, organisation or course by first selecting the appropriate title from the dropdown menu, and then beginning to type in the search bar.  Click on the desired name from the list that appears below the search bar. Giving permission to an entire organisation will allow anyone affiliated with the organisation through their user profile, AND with access to the Assessment and Evaluation module to use the item.  If you give permission to an entire course, anyone listed on as a course contact on the setup page AND with access to the Assessment and Evaluation module will have access to the item.
* After you've added all permissions, you can return to the list of all items by clicking 'Items'.

#Tips for viewing existing items
* Toggle between list view and detail view using the icons beside the search bar.
* In detail view, see the details of an existing item by clicking on the eye icon.
* In detail view, edit an existing question by clicking on the pencil.
* To delete items, check off the tick box beside a question (list view) or beside the pencil icon (detail view) and click 'Delete Items'.
* From an Edit Item page you can click on a link to view the forms that use an item or the grouped item an item is included in.  
* When viewing items in list view, the third column shows the number of answer options the item has.  Clicking on it takes you to the item, and by clicking again you can see all the forms that use this item.

#How to search for existing items
* From the Items tab type into the search box to begin to find questions.
* You can apply a variety of filters to refine your search for existing items.
* To select a filter, click on the down arrow beside the search box. Select the filter type you want to use, click on it, and then begin to type what you want to find or continue clicking to drill down and find the required filter field. Filter options will pop up based on your search terms or what you’ve clicked through and you can check off the filters you want to apply. Apply multiple filters to further refine your search.
* If you're working with a filter with multiple hierarchies, use the breadcrumbs in the left corner of the filter list to go back and add additional filters.
* When you’ve added sufficient filters, scroll down and click Apply Filters to see your results.
* To remove individual filters from your search, click on the down arrow beside the search field, click a filter type and click on the small x beside each filter you want to remove.  Scroll down and click ‘Apply Filters’ to apply your revised selections.
* To remove all filters from your search, click on the down arrow beside the search field, click a filter type, scroll down, and click on ‘Clear All’ at the bottom of the filter search window.
