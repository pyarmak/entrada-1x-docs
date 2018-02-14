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
description (this is short description or title of the question)
rationale
correct_text (this can be used for short answer or essay questions)
code  

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
type: mc_v_m
folder: /some/folder

In ME1.12 you will also be able to write the answer as answer: a, b

**Multiple Choice Horizontal**
Multiple choice horizontal questions follow the same format as multiple choice vertical, but with a type of "mc_h". They can have at most 5 answer choices. An example is shown below.

1. What is your favorite color?
a. red
b. green
c. blue


answer: a
type: mc_h
folder: /some/folder

**Multiple Choice Horizontal (multiple responses)**  
Multiple choice horizontal questions with multiple responses have a type of "mc_h_m". They include 1-5 answer choices, and one or more "answer" attributes for the letter(s) of the correct answer(s). An example is shown below.

1. Which of these are blue?  
a. sky  
b. ocean  
c. trees  

answer: a  
answer: b  
type: mc_h_m  
folder: /some/folder

In ME1.12 you will also be able to write the answer as answer: a, b

**Short Answer**  
Short answer questions have a type of "short" and require only the question stem. An example is shown below.

1. Where is your favorite color?  
type: short  
folder: /some/folder  

**Essay**  
Essay questions have a type of "essay" and require only the question stem although it is recommended to provide correct text and rationale. An example is shown below.

1. What is your favorite color and why (3-5 sentences)?  
type: essay  
folder: /some/folder  

**Matching**  
Matching questions have a type of "match". They have one or more answer choices, one or more item stems, and the same number of correct answers as item stems. The answer choices are shown as options for each item stem. The item stems are a piece of text or a question that corresponds to one of the answer choices. The correct answer for an item stem is identified by the answer choice's letter. The correct answer attributes are assumed to be in the same order as the item stem attributes. An example is shown below.

1. This is the matching question stem.  
a. This is the first answer choice.  
b. This is the second answer choice.  
c. This is the third answer choice.  
item: This is the first item stem, its correct answer is choice C.  
answer: c  
item: :This is the second item stem, its correct answer is choice A.  
answer: a  
type: match  
folder: /some/folder  

**Text**
Text questions are not questions at all; they are generally used as instruction text for further questions. Text questions have a type of "text" and require no other special attributes. An example is shown below.

1. The next three questions cover the following scenario: (scenario here)  
type: text  
folder: /some/folder  

**Fill in the Blank**  			
Fill in the blank questions have a type of "fnb". The blanks are indicated by the string "_?_" in the question stem. Fill in the blank questions can have an "answer" attribute for each blank indicating possible correct answers for that blank; the possible correct answers are separated by pipe characters, "|". These "answer" attributes refer to the blanks in order. An example is shown below, in which the first blank has possible correct answers of "woodchuck", "beaver", or "marmot", and the second blank has possible correct answers of "woodchuck", "hamster", and "groundhog".

1. How much wood could a _ ? _ chuck if a _ ? _ could chuck wood?  
answer: woodchuck|beaver|marmot  
answer: woodchuck|hamster|groundhog  
type: fnb  
folder: /some/folder  

*Currently, you cannot import curriculum tags associated with questions through this feature.  A future version of Entrada will support this function.*

#How to import existing questions from ExamSoft

Migrate Questions (only available to Medtech Admin)
To import existing questions from another exam management tool, navigate to Admin>Manage Exams>Questions and click on Migrate Q’s. Indicate a folder you wish to populate and attach the appropriate file noting the requirement for plain text format.  (See additional migration instructions here.) Then, click ‘Import Questions.’

Migrate Images (only available to Medtech Admin?)
To import existing images from another exam management tool, click on the Migrate Images tab. Attach the appropriate file noting the requirement for HTML format (should they select a folder or is there a question id it looks for?).  Then, click ‘Import Question Images.’

Migrate Responses (only available to Medtech Admin?)
To import existing responses from another exam management tool, click on the Migrate Responses tab. Attach the appropriate file noting the requirement for plain text format (should they select a folder or is there a question id it looks for?).  Then, click ‘Import Responses.’
