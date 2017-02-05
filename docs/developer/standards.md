# Coding Standards

Due to the fact that the Entrada code base is evolving, some of the existing source code does not necessarily adhere to the Entrada Coding Standards defined below. Our hope is to move existing code into this standard. If you encounter something that does not follow the coding standards, it is our hope that you (as a developer and contributor) will update and test the files accordingly.

**Important Note:** If you do not like something about our coding standards, please don't be passively adoptive. We are certainly willing to listen and adjust providing that:

1. You are willing and able to clearly explain and defend your well thought out position.
2. You are willing to do work towards implementing your change across the Entrada Platform.
3. You can convince the majority of Entrada development community to agree with your position.

## PHP Standards

Our general direction is to adopt the now wildly accepted PSR standards by the [PHP Framework Interop Group](http://www.php-fig.org):

* [PSR-1: Basic Coding Standard](http://www.php-fig.org/psr/psr-1/)
* [PSR-2: Coding Style Guide](http://www.php-fig.org/psr/psr-2/)

### Source Code Documentation

All source code documentation blocks ("docblocks") must be compatible with the phpDocumentor format. Describing the phpDocumentor format is beyond the scope of this document, but for more information visit [http://phpdoc.org](http://phpdoc.org).

All source code files written for Entrada or that operate within the framework must contain a "file-level" docblock at the top of each file and a "class-level" docblock immediately above each class. Below are examples of such docblocks.

**Please Note:** The sharp, `#`, character should never be used to start source code comments.

#### Files

Every file that contains Entrada PHP code must have a "file-level" docblock at the top of the file that contains these phpDocumentor tags at a minimum:

    /**
     * Entrada [ http://www.entrada-project.org ]
     * 
     * Entrada is free software: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or
     * (at your option) any later version.
     *
     * Entrada is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     * GNU General Public License for more details.
     *
     * You should have received a copy of the GNU General Public License
     * along with Entrada.  If not, see <http://www.gnu.org/licenses/>.
     *
     * General description of this file.
     * 
     * @author Organization: Your Organization Here
     * @author Unit: Optional School or Unit Here
     * @author Developer: Developer Name Here <developer@emailaddress.here>
     * @copyright Copyright 20XX Your Organization Here. All Rights Reserved.
     * 
     */

#### Classes

Every class must have a "class-level" docblock that contains these phpDocumentor tags at a minimum:

    /**
     * Class Name or Title
     *
     * General description for this class.
     *
     * @author Organization: Your Organization Here
     * @author Unit: Optional School or Unit Here
     * @author Developer: Developer Name Here <developer@emailaddress.here>
     * @copyright Copyright 20XX Your Organization Here. All Rights Reserved.
     */

#### Functions

Every function, including object methods, must have a docblock that contains at a minimum:

  * A description of the function
  * All of the arguments
  * All of the possible return values
  * If a function/method may throw an exception, use "@throws"

        /**
         * This method does something interesting.
         *
         * @param Place $where Where something interesting takes place
         * @param int $repeat How many times something interesting should happen
         * @return bool
         */
        public function doSomethingInteresting(Place $where, $repeat = 1) {
            return true;
        }
        
        /**
         * This function (public static method) returns whatever it is passed.
         *
         * @param bool $state
         * @return bool
         */
        public static function another_interesting_thing($state = true) {
            return $state;
        }

### Code Formatting and General Rules

#### General Formatting

  * All indenting is set to 4 spaces (no tabs).
  * Keep indenting at the level of the HTML indent when mixing PHP and HTML, and vice versa.

        <div>
        <?php
        if ($foo) {
            ...
        }
        ?>
        </div>

  * Do not increase or decrease indent for `<?php` or `?>` tags.
  * Do not use PHP short tags (`<?` or `<?=`), instead use the full opening tag (`<?php` and `<?php echo`).

#### Variables and Constants

  * Constants should always be declared in all upper case

        define("CLERKSHIP_TOP_CATEGORY_ID", 49);

  * Variables which are used between more than one file (what we call minor global variables) are also in all upper case

        $CLERKSHIP_REQUIRED_WEEKS = 14;

  * Variables which are used within only one file should be in all lower case

        $title_suffix = " All Facutly";

  * Variables and Constants with multi-word names should have each word separated with an underscore

        $clinical_presentations_list = false;

  * Always validate $_GET and $_POST variables and place them in a $PROCESSED array for creating or editing records in databases or in regular variables for program logic

        /**
         * Required field "course_name" / Course Name.
         */
        if (isset($_POST["course_name"]) && ($course_name = clean_input($_POST["course_name"], array("notags", "trim")))) {
            $PROCESSED["course_name"] = $course_name;
        } else {
            add_error("The <strong>" . $module_singular_name .  "Name</strong> field is required.");
        }

#### If, Foreach and Switch statements

All `if`, `foreach`, and `switch` statements should have the following formatting:

  * A space after the initial statement and after the closing parenthesis
  * If statements with an `else` branch should have a space after the first closing brace bracket and after the `elseif` or `else` statement, and after the parenthesis if it's an `elseif`.
  * Always include brace brackets, whether the code inside the statement is one line or more.
  * Use && and || in logic instead of 'AND' and 'OR'
  * All `foreach` and `if` statements should be on at least 3 lines
    * The statement, parameters and open brace-bracket
    * A new line with code to be executed
    * One more line with a closing brace bracket.
  * switch statements must have at least 5 lines, same as above plus: * at least one case "parameter" : line before the code to be executed. * a break; line after the code to be executed.
  * case and default lines should have a space before the colon on switch statements
  * all case and default sections in switch statements should end with a break; line which is indented one tab less than the code to be executed.
  * all code within brace brackets should be indented one additional tab
  * all code after a 'case' or 'default' line in a switch statement should be indented an additional tab

        if ((($variable > 20) && ($variable < 50)) || $boolean) {
            echo "this code executed.";
        } elseif (($variable > 15) && ($variable < 60)) {
            echo "that code almost executed.";
        } else {
            echo "that code didn't execute.";
        }

        foreach ($names as $name) {
            echo $name;
        }

        switch ($status) {
            case "on" :
                turn_light_on();
            break;
            case "off" :
                turn_light_off();
            break;
            default :
                continue;
            break;
        }

#### Functions and Methods

  * Global functions should be created as `public static` methods in `core/library/Entrada/Utilities.php`.
  * All historical global functions are declared in `core/includes/functions.inc.php`.
  * Multi-word function names should be separated with underscores.
  * Functions primarily used only in one module should be methods of that modules' class (i.e. `Entrada_Events::filter_events()` in `core/library/Entrada/Events.php`).
  * Group like functions / methods together in the same file where possible.
  * There should be a space after the closing parenthesis and before the opening brace bracket in function declarations.

        /**
         * Determines whether or not a PHP session is available.
         *
         * @return bool
         */
        public static function is_session_started() {
            if ( php_sapi_name() !== "cli" ) {
                if ( version_compare(phpversion(), "5.4.0", ">=") ) {
                    return session_status() === PHP_SESSION_ACTIVE ? true : false;
                } else {
                    return session_id() === "" ? false : true;
                }
            }
        
            return false;
        }

## SQL Standards

* If the query you are writing is over 120 characters long you should add line breaks and align the query so `JOIN`, `WHERE`, `ON`, `AND`, `ORDER BY` and `GROUP BY` keywords start a new line and are indented to line up with the first statement of the query.
* All of the query except the field, table and database names should be in uppercase.
* Use prepared statements whenever possible, otherwise use ADOdb's qstr() method `".$db->qstr($variable)."` to add variables into queries. This will help prevent SQL Injection Vulnerabilities.
* You should avoid writing your own `INSERT` and `UPDATE` queries, and instead use ADOdb's AutoExecute() method.
* SQL queries should only exist within models, not within the controllers.
* Queries should use back-ticks around field names to prevent possible naming collisions.

### Using prepared statements

    $query = "SELECT a.*, b.`group`, b.`role`
                FROM `".AUTH_DATABASE."`.`user_data` AS a
                LEFT JOIN `".AUTH_DATABASE."`.`user_access` AS b
                ON b.`user_id` = a.`id`
                WHERE b.`group` = ? 
                AND b.`role` = ? 
                ORDER BY a.`lastname`, a.`firstname` ASC";
    $results = $db->GetAll($query, array($group, $role));

### Using ADOdb qstr()

    $query = "SELECT a.*, b.`group`, b.`role`
                FROM `".AUTH_DATABASE."`.`user_data` AS a
                LEFT JOIN `".AUTH_DATABASE."`.`user_access` AS b
                ON b.`user_id` = a.`id`
                WHERE b.`group` = ".$db->qstr($group)." 
                AND b.`role` = `".$db->qstr($role)." 
                ORDER BY a.`lastname`, a.`firstname` ASC";
