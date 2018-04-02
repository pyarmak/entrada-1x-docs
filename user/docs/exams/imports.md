#Importing Exam Questions  
Options exist to copy and paste existing questions into a text box, or migrate questions, images, and responses from another exam management tool.

#How to import existing questions from a text file
* Navigate to Admin>Manage Exams.
* Click on ‘Questions’ from the left sidebar Manage Exams section.
* Click on the Import sub-tab.
* Select a destination folder from the dropdown menu.
* Paste in the question(s) text.
Note that specific formatting required.

Question type is required for each question.  To format your question types, begin with “type:” followed by a space and then one of the following question type codes:
mc_h Multiple Choice Horizontal
mc_v Multiple Choice Vertical
short Short Answer
essay Essay
match Matching
text Text
mc_h_m Multiple Choice Horizontal (multiple responses)
mc_v_m Multiple Choice Vertical (multiple responses)
fnb Fill in the Blank

You can also indicate the following information for any question, although it is optional:  

* description (this is short description or title of the question)
* rationale
* correct_text (this can be used for short answer or essay questions)
* code  
* locked response(s) - this allows you to lock a response option on a question if you intend to randomize question response options when you post the exam  

Example:  
1. Which are vowels?  
a. a  
b. e  
c. i  
d. All of the above  
answer: d  
type: mc_v  
folder: /some/folder  
locked: d  

* curriculum tags - this allows you to import curriculum tags with your questions.  To use this feature you need to know the curriculum tag id.  These can be found in Admin>Manage Curriculum.  When you open a curriculum tag set, toggle to the table view of curriculum tags (use icons beside 'Add Tag'), and if ID is not a visible field, add a column by clicking the columns selector (under the Import from CSV button) and adding the ID column.  To the question text add a line formatted like this:
curriculum_tags: 1024, 1025

#Additional formatting information about importing questions from a text document
Each question shows the minimal amount of information required.  It is recommended that you also provide description, rationale, etc.

**Multiple Choice Vertical**  
Multiple choice vertical questions have a type of "mc_v". They include one or more answer choices, and an attribute "answer" for the letter of the correct answer. An example is shown below.

1. What is your favorite color?  
a. red  
b. green  
c. blue  

answer: a  
type: mc_v  
folder: /some/folder  

**Multiple Choice Vertical (multiple responses)**    
Multiple choice vertical questions with multiple responses have a type of "mc_v_m". They include one or more answer choices, and one or more "answer" attributes for the letter(s) of the correct answer(s). An example is shown below.

1. Which of these are blue?  
a. sky  
b. ocean  
c. trees  

answer: a  
answer: b  
**or**  
answer: a, b  
type: mc_v_m  
folder: /some/folder  

**Multiple Choice Horizontal**
Multiple choice horizontal questions follow the same format as multiple choice vertical, but with a type of "mc_h". They can have at most 5 answer choices. An example is shown below. Note that questions presented in horizontal view to learners will not have the strikethrough feature available when learners take an exam.

1. What is your favorite color?  
a. red  
b. green  
c. blue  

answer: a  
type: mc_h  
folder: /some/folder  

**Multiple Choice Horizontal (multiple responses)**  
Multiple choice horizontal questions with multiple responses have a type of "mc_h_m". They include 1-5 answer choices, and one or more "answer" attributes for the letter(s) of the correct answer(s). An example is shown below.  Note that questions presented in horizontal view to learners will not have the strikethrough feature available when learners take an exam.

1. Which of these are blue?  
a. sky  
b. ocean  
c. trees  

answer: a  
answer: b  
**or**  
answer: a, b  
type: mc_h_m    
folder: /some/folder  

**Short Answer**  
Short answer questions have a type of "short" and require only the question stem although it is recommended to provide correct text and rationale. An example is shown below.

1. Where is your favorite color?    
type: short  
folder: /some/folder  

**Essay**  
Essay questions have a type of "essay" and require only the question stem although it is recommended to provide correct text and rationale. An example is shown below.

1. What is your favorite color and why (3-5 sentences)?  
type: essay  
folder: /some/folder  

**Matching**  
Matching questions have a type of "match". They have one or more answer choices, one or more item stems, and the same number of correct answers as item stems. The answer choices are shown as options for each item stem. The item stems are a piece of text or a question that corresponds to one of the answer choices. The correct answer for an item stem is identified by the answer choice's letter. The correct answer attributes are assumed to be in the same order as the item stem attributes. An example is shown below.  Note that when learners answer this type of question the system does not automatically eliminate responses (i.e., a learner can put answer c as a match for multiple stems).  When scoring a matching question the system uses an all or none system (for questions where you can give partial scores use multiple choice, multiple responses).

1. This is the matching question stem.  
a. This is the first answer choice.  
b. This is the second answer choice.  
c. This is the third answer choice.  
item: This is the first item stem, its correct answer is choice C.  
answer: c  
item: This is the second item stem, its correct answer is choice A.  
answer: a  
type: match  
folder: /some/folder  

**Text**
Text questions are not questions at all; they are generally used as instruction text for further questions. Text questions have a type of "text" and require no other special attributes. An example is shown below.

1. The next three questions cover the following scenario: A patient arrives at your family medicine clinic at 2:30 on a Friday afternoon...  
type: text  
folder: /some/folder  

**Fill in the Blank**  			
Fill in the blank questions have a type of "fnb". The blanks are indicated by the string "_?_" in the question stem. Fill in the blank questions can have an "answer" attribute for each blank indicating possible correct answers for that blank; the possible correct answers are separated by pipe characters, "|". These "answer" attributes refer to the blanks in order. An example is shown below, in which the first blank has possible correct answers of "woodchuck", "beaver", or "marmot", and the second blank has possible correct answers of "woodchuck", "hamster", and "groundhog".

1. How much wood could a _?_ chuck if a _?_ could chuck wood?  
answer: woodchuck|beaver|marmot  
answer: woodchuck|hamster|groundhog  
type: fnb  
folder: /some/folder  

#How to import existing questions from ExamSoft

Migrate Questions (only available to Medtech Admin)
To import existing questions from another exam management tool, navigate to Admin>Manage Exams>Questions and click on Migrate Q’s. Indicate a folder you wish to populate and attach the appropriate file noting the requirement for plain text format.  (See additional migration instructions here.) Then, click ‘Import Questions.’

Migrate Images (only available to Medtech Admin)
To import existing images from another exam management tool, click on the Migrate Images tab. Attach the appropriate file noting the requirement for HTML format (should they select a folder or is there a question id it looks for?).  Then, click ‘Import Question Images.’

Migrate Responses (only available to Medtech Admin)
To import existing responses from another exam management tool, click on the Migrate Responses tab. Attach the appropriate file noting the requirement for plain text format (should they select a folder or is there a question id it looks for?).  Then, click ‘Import Responses.’  

#Flagged Questions  
If you are in an admin role and have imported questions from ExamSoft you may see some questions display under Flagged Questions.  If you tried to import any questions from ExamSoft which were NOT multiple choice you'll need to review them in the Flagged Questions tab.  Similarly, questions with images attached will also appear here.  Non multiple choice questions are flagged because the import system can't tell if they were supposed to be matching, fill in the blank, or essay type questions. By default they are given a type of essay but this will need to be changed for matching or fill in the blank question types.

*  If the question is correct, you can click the flag icon in the top right corner to unflag it.  
*  If the question needs to be edited, you can click the pencil icon in the top right corner. Saving an edited question automatically unflags the question.
