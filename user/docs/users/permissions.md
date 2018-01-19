#User Permissions
Specific group and role configurations have certain permissions in Entrada.  Below are some of the basic settings.

#Students
Student:20XX
Students have basic read permissions to most public modules. They can also edit and in some cases remove information that they add themselves (e.g. discussion forum comments).

It is important to note that students cannot be granted access to any administrative module within Entrada. There is a hard-coded exit in case all other security restrictions fail and they access /admin/*

#Faculty
Faculty:Faculty - Basic read-only access as faculty members.
Faculty:Lecturer - Teaching faculty can edit the content of any learning event that they are scheduled to teach.
Faculty:Director - Course Directors can edit the content of any course pages / website or learning event that they are designated as a "Course Director" for on the Admin > Manage Courses page.

#Staff
Staff:Staff - Staff members have basic read-only access.
Staff:PCoordinator - Program Coordinators can add, edit, or delete learning events and manage any content within any of the courses they are designated as a "Program Coordinator" for on the Admin > Manage Courses page.
Staff:Admin - Organizational administrators can pretty much do anything in the system within their designated organisation.

#System Administrators

Medtech:Admin - System administrators can pretty much do anything in the system regardless of any organizational restrictions.


For information on Masked Permissions please see the Users>Profile Preferences help section and User Tools>Masking ID.
