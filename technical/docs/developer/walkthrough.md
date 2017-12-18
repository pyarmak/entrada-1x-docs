# Entrada Walkthrough

## Dashboard

## System Settings

## Manage Users

Managing users within the Entrada Platform is done by clicking Admin / Manage Users.

## Manage Courses

## Manage Learning Events

## Manage Rotation Schedules

As rotation schedules are inherently time based, you are required to set up curriculum periods and their associated block schedules for the organisation you are looking to manage rotations for. Schools that have been using Entrada for a while will most likely have already set up most of the required data in order to utilize other aspects of the application. 

### Setting Up Required Data Points

1. Log in as an administrator and navigate to "Admin > System Settings". Create or select the organisation you want to add rotations to. 

2. Once you are managing the appropriate organisation, select "Curriculum Layout" from the sidebar. Select or create a curriculum layout for your organisation. 

3. From the curriculum layout, we can see a list of curriculum periods. If you have not set up any periods, you must do so to set up a block schedule. Next to the curriculum periods, you will see a "Block Schedule" link. Follow this link for the desired curriculum period. 

4. From here, click "New" to begin setting up the block schedules for the curriculum period. 

### Setting Up Block Schedule Templates

A block schedule is a set of time "blocks" within the overall rotation schedule. The most typical set of block lengths are 12 four weeks, 26 two weeks, and 52 one weeks. Block types are pulled from the `cbl_schedule_lu_block_types` table. Upon saving a block schedule, you will see new controls to set the day of the week that blocks will end on, what type of blocks they will be, and an option to manually add blocks. Select the desired options and save your changes. Afterwards, press the dropdown on the save button and select "Auto-generate Blocks". This will create all of the blocks that should exist for the date range provided. You will need to repeat the process for each block schedule type you want within your rotations.
 
### Creating Rotation Schedules

At this point you should be able to set up rotation schedules within the organisations and curriculum periods that you have set up block schedules for. To accomplish this, navigate to "Admin > Rotation Schedule". You will need to begin by creating an unpublished draft and selecting a curriculum period that has block schedules. A draft is a set of rotation schedules belonging to a course for the curriculum period. After creating the draft, click the "Add Rotation" button. Upon saving the rotation, it will inherit blocks based on the block schedule templates that you have set up for that curriculum period. 

### Scheduling Learners

To add a learner to a slot, navigate to the "Learners" tab. You will see a visual representation of all of the blocks over the curriculum period. To schedule a learner, click on a corresponding block beside their name. From here you will be able to select any rotation that has blocks that fall into that time frame. 
