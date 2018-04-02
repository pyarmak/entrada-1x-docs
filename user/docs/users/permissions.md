#User Permissions
Specific group and role configurations have certain permissions in Entrada.  Below are some of the basic settings.


| Group     | Role     | System Permissions     |
| :------------- | :------------- | :------------- |
| Alumni      | Year of Graduation       | TBD     |
| Faculty      | Admin       | Faculty Admin can pretty much do anything in the system within their designated organisation.      |
| Faculty      | Director       | Course Directors can edit the content of any course pages / website or learning event that they are designated as a "Course Director" for on the Admin > Manage Courses page. |
| Faculty      | Faculty       | Basic read-only access as faculty members.|
| Faculty      | Lecturer      | Teaching faculty can edit the content of any learning event that they are scheduled to teach. |
| Medtech      | Admin       | System administrators can pretty much do anything in the system regardless of any organizational restrictions. |
| Medtech      | Staff      | TBD     |
| Resident      | Lecturer       | This can be used in UG installations where residents act as lecturers.     |
| Resident      | Resident       | This can be used in UG installations where residents play some role.  Do not use this group and role for PG installations of Entrada using CBME; in that case the residents should be student:year.     |
| Staff      | Admin       | Organization administrators can pretty much do anything in the system within their designated organisation.  |
| Staff      | Pcoordinator       | Can add, edit, or delete learning events and manage any content within any of the courses they are designated as a "Program Coordinator" for on the Admin > Manage Courses page   |
| Staff      | Staff       | Staff members have basic read-only access.      |
| Staff      | Translator       | TBD     |
| Student      | Year       | Students have basic read permissions to most public modules. They can also edit and in some cases remove information that they add themselves (e.g. discussion forum comments). It is important to note that students cannot be granted access to any administrative module within Entrada. There is a hard-coded exit in case all other security restrictions fail and they access /admin/* |

Staff>Admin group and role is organisation specific whereas Medtech>Admin can access all organisations within an installation.

If you are creating users for an organisation with Competency-Based Medical Education enabled, you should assign the learners group: student, role: year for the to appear on the necessary screens.

For information on Masked Permissions please see the Users>Profile Preferences help section and User Tools>Masking ID.
