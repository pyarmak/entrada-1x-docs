#Safe Exam Browser Setup

## Lab Installation
- Login to the computer with a user account that has admin rights
- Download Safe Exam Browser 2.1.x for Windows: http://safeexambrowser.org/download_en.html
- Run the Safe Exam Browser Installer (SafeExamBrowserInstaller.exe). After the installation a Safe Exam Browser shortcut should be placed on the desktop
- Copy the provided SEB Client Configuration file (SEBClientSettings.seb) to the following location: PROGRAMDATA\SafeExamBrowser\ (typically C:\ProgramData\SafeExamBrowser\)
- Reboot the computer
- Launch SEB by double-clicking on the desktop shortcut and verify that the Entrada login screen loads.

## Running SEB on non-admin accounts on Windows.
- After clicking on the exam link, if it tries to install SEB again
- Select "Do not close application..."
- No to "Restart computer"
- Ok to the error with reading the tmp directory.
- try to launch the exam again, it should open and prompt you to login again.
- Note: DO NOT upgrade on top of an existing version, always uninstall the old version before installing the new version.

## Entrada Exam Setup
- In Entrada, navigate to a learning event with an attached exam
- Switch to the "Administrator View"
- Click the “Content” tab
- Click the exam you would like to secure under the “Posted Exams” section
- Navigate to Step 2: Settings
- Under “Secure Mode” select the option that reads “Required to take exam"
- Click “Next Step"
- Finish posting the exam, skip the Secure Settings the first time through - we need the post ID first.
- Refresh event page, step through the post again.
- Edit the post and on Step 3: Secure Settings, copy the URL that is provided in the blue box in the "Safe Exam Browser (SEB) File” section. (Tip: Leave the browser window open as you complete steps 11-24)
- Launch the "SEB Config Tool” from the Windows Start Menu (Start->Safe Exam Browser->SEB Config Tool)
- Paste the URL copied in Step 10 in the “Start URL” field
- Password-protect the SEB Exam file by creating a password in the “Administrator password” section.
- Switch to the “Config File” tab
- Under “Use SEB settings file for…” select the option “starting an exam"
- Switch to the “Exam” tab
- Check the checkbox that reads “Send Browser Exam Key in HTTP header
- Under the “Link to quit SEB after exam” enter https://yourschool.edu/secure/secure-logout
- Switch to the “Hooked Keys” tab
- Check that checkbox that reads “Enable Right Mouse” and uncheck everything else
- Switch to the “Config File” tab
- Click the button “Save Settings As…” and save the SEB Exam file
- If prompted to save an unencrypted SEB file, choose Yes.
- Switch to the “Exam” tab
- Copy the SEB Browser Exam Key under the “Browser Exam Key” section
- Switch back to your web browser that is currently on the Post Exam settings page
- Upload the SEB Exam file you just created by clicking the “Browse” button, selecting the file you named in Step 22. After the file finishes uploading, it should appear in the “Safe Exam Browser (SEB) File” section
- Under the “Secure Key” section, click the “+” button toward the top-right corner
- Paste the SEB Browser Exam Key that you copied in Step 25 in the “Browser Key” field
- Enter the version of Safe Exam Browser that you used to create the SEB Browser Key and the Operating System (e.g. Win 2.1.2)
- Click “Next Step” and continue through each step. When you reach the last step, click “Save Exam Post"
- Launch SEB and login to Entrada
- Navigate to the Exam you wish to take and verify that you can login and that the exam loads