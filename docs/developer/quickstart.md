# Quickstart Guide

This Quickstart guide is designed as a resource for PHP developers to learn how to structure and create new modules within the Entrada Platform using our latest development standards and best practices.

## History of Entrada

The history of Entrada development goes back over a decade and as time has passed, best practices in both the industry and our codebase have improved. These improvements change the way that we write our code. Even though the way that we write our code has improved we have not, in many cases, gone back and updated older modules within the application.

While this can cause some confusion and perhaps frustration for new Entrada developers, it is important to realize that updating older modules in the application would potentially cause significant merge conflicts for schools that have customized those modules to meet their specific needs. The time taken to resolve these conflicts would be time taken away from the development of new functionality to support the mission of the instituions.

Instead of a large rewrite of the core codebase the Entrada Development Community in 2016 committed to moving ahead with a transition to Service Oriented Architecture using the Lumen micro framework. This transition will begin with Entrada ME 1.9 and this documentation will be updated accordingly to reflect these changes.

## Creating a New Module

### Entrada ME 1.8

This documention will walk you through step-by-step creating a new module that we are calling "Sandbox" in Entrada ME 1.8. This new Sandbox module will consist of the following:

1. A new **migration** to accommodate the new database table and ACL rules.
2. A new **model** that will be used to access the new table.
3. A new **public module** that will show the learners a list of all of the sandboxes.
4. A new **admin module** that will allow administrative users to add, edit, and delete the sandboxes.
5. A new **view helper** that will render the form used on both the add and edit pages, and another that will render a simple sidebar item.

Pay special attention to note of the bolded words above: migration, model, public module, admin module, and view helper. This terminology is frequently used by Entrada developers.

----
>All files that are references within the document can be [downloaded here](https://github.com/EntradaProject/entrada-1x-docs/raw/master/resources/quickstart/Entrada-ME-1.8-Sandbox-Quickstart.tar.gz) for review.

----

### Let's Begin

Open the `~/Sites/entrada-1x-me.dev` folder using PhpStorm or whatever IDE/Editor you have selected. Ensure that you set the tab size in your editor to 4 spaces as the tab character will not be accepted. For more information on coding standards visit the [Coding Standards](standards/) section.

#### 1. Create a New Database Migration

This new Sandbox module is going to need a new table in the `entrada` database. In order to systematically and consistently apply these types of changes you would create a migration. 

A migration is used to record and apply changes and data transformations within the Entrada databases. For more information on how to use migrations please see the [Database documentation](/developer/database) section.

To create a new migration run the following command in terminal within the Entrada root folder:

    php entrada migrate --create

You will be asked to provide the corresponding GitHub Issue number, and then a new file will be generated within the `www-root/core/library/Migrate` folder that looks like `2017_01_11_150030_1477.php`. This file will have `up()`, `down()`, and `audit()` methods that you must complete.

    <?php
    class Migrate_2017_01_11_150030_1477 extends Entrada_Cli_Migrate {
    
        /**
         * Required: SQL / PHP that performs the upgrade migration.
         */
        public function up() {
            $this->record();
            ?>
            CREATE TABLE IF NOT EXISTS `sandbox` (
            `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
            `title` varchar(128) NOT NULL DEFAULT '',
            `description` text,
            `created_date` bigint(64) unsigned DEFAULT NULL,
            `created_by` int(11) unsigned DEFAULT NULL,
            `updated_date` bigint(64) unsigned DEFAULT NULL,
            `updated_by` int(11) unsigned DEFAULT NULL,
            `deleted_date` bigint(64) unsigned DEFAULT NULL,
            `deleted_by` int(11) unsigned DEFAULT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    
            INSERT INTO `<?php echo AUTH_DATABASE; ?>`.`acl_permissions` (`permission_id`, `resource_type`, `resource_value`, `entity_type`, `entity_value`, `app_id`, `create`, `read`, `update`, `delete`, `assertion`)
            VALUES
            (NULL, 'sandbox', NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, 'NotGuest'),
            (NULL, 'sandbox', NULL, 'group:role', 'staff:admin', 1, 1, NULL, 1, 1, NULL);
            <?php
            $this->stop();
    
            return $this->run();
        }
    
        /**
         * Required: SQL / PHP that performs the downgrade migration.
         */
        public function down() {
            $this->record();
            ?>
            DROP TABLE `sandbox`;
    
            DELETE FROM `<?php echo AUTH_DATABASE; ?>`.`acl_permissions` WHERE `resource_type` = 'sandbox';
            <?php
            $this->stop();
    
            return $this->run();
        }
    
        /**
         * Optional: PHP that verifies whether or not the changes outlined
         * in "up" are present in the active database.
         *
         * Return Values: -1 (not run) | 0 (changes not present or complete) | 1 (present)
         *
         * @return int
         */
        public function audit() {
            $migration = new Models_Migration();
            if ($migration->tableExists(DATABASE_NAME, "sandbox")) {
                return 1;
            }
    
            return 0;
        }
    }

Once your new migration file has been created, you can apply and test these changes by executing:

    php entrada migrate --up

#### 2. Create the New Model

You will use the `Model_Sandbox` class exclusively to access the new `entrada.sandbox` table created by the migration. You can create a template for the new Model by running:

    php entrada model --create
    
Once the model has been created it will reside in the filesystem as `www-root/core/library/Models/Sandbox.php` and you will use `Model_Sandbox` throughout the Entrada codebase. This is possible thanks to Composer's ability to support both PSR-0 and PSR-4 autoloading.

Here are a few examples of how you can use your new model:

**Inserting data**

    $row = array(
        "title" => $title,
        "description" => $description,
        ...
        "created_date" => time(),
        "created_by" => $ENTRADA_USER->getId()
    );
    
    $sandbox = new Models_Sandbox($row);
    $record = $sandbox->insert();
    if ($record) {
        ...
    }

**Selecting data**

    $results = Models_Sandbox::fetchAllRecords();
    if ($results) {
        foreach ($results as $result) {
            ...
        }
    }

**Updating data**

    $row = array(
        "title" => $PROCESSED["title"],
        "description" => $PROCESSED["description"],
        ...
        "updated_date" => time(),
        "updated_by" => $ENTRADA_USER->getId()
    );
    
    $sandbox = new Models_Sandbox($row);
    $record = $sandbox->update();
    if ($record) {
        ...
    }

**Deleting data**

    $sandbox = new Models_Sandbox();
    if ($sandbox->delete($PROCESSED["id"])) {
        ...
    }

#### 3. Create the new Public Module

Entrada does not use a typical MVC pattern as you would recognize from frameworks like Laravel, CakePHP, or Symfony. Although similiar in effect, our pattern is not entirely object oriented; we use a mix of object oriented and procedural design patterns.

Entrada's `.htaccess` file contains `mod_rewrite` rules that pipe the majority of requests through the `index.php` and `admin.php` files. The `index.php` file is used to display **public modules**, whereas the `admin.php` file is used to display **admin modules**.

One significant difference between most MVC frameworks and Entrada is that our request routing is entirely automatic vs. being manually defined in a routes file. For example, if you visit [http://entrada-1x-me.dev/profile/gradebook/assignments](http://entrada-1x-me.dev/profile/gradebook/assignments) in your browser, Entrada will load the `www-root/core/modules/public/profile/gradebook/assignments/index.inc.php` file.
 
 For a more thorough overview of this information please see the [Directory Structure](overview/#directory-structure) section within Overview. 
 
 We will begin by creating a public module in the `www-root/core/modules/public` folder. Create a new file in this directory called `sandbox.inc.php` and place the following inside:
 
     <?php
     /**
      * Entrada [ http://www.entrada-project.org ]
      */
     
     if (!defined("PARENT_INCLUDED")) {
         exit;
     } elseif (!isset($_SESSION["isAuthorized"]) || !(bool) $_SESSION["isAuthorized"]) {
         header("Location: " . ENTRADA_URL);
         exit;
     } elseif (!$ENTRADA_ACL->amIAllowed("sandbox", "read")) {
         add_error("Your account does not have the permissions required to use this module.");
     
         echo display_error();
     
         application_log("error", "Group [" . $ENTRADA_USER->getActiveGroup() . "] and role [" . $ENTRADA_USER->getActiveRole() . "] do not have access to this module [" . $MODULE . "]");
     } else {
         /*
          * Updates the <title></title> of the page.
          */
         $PAGE_META["title"] = $translate->_("Public Sandbox");
     
         /*
          * Adds a breadcrumb to the breadcrumb trail.
          */
         $BREADCRUMB[] = array("url" => ENTRADA_RELATIVE . "/sandbox", "title" => $translate->_("Public Sandbox"));
     
         /*
          * Renders the sandbox sidebar View Helper.
          */
         $sidebar = new Views_Sandbox_Sidebar();
         $sidebar->render();
         ?>
     
         <h1><?php echo $translate->_("Public Sandbox"); ?></h1>
     
         <?php
         /*
          * Models_Sandbox::fetchAllRecords() will return all non-deleted records from the sandboxes table as an array of objects.
          */
         $results = Models_Sandbox::fetchAllRecords();
         if ($results) {
             foreach ($results as $result) {
                 echo "<div id=\"sandbox-" . $result->getID() . "\" class=\"sandboxes space-above space-below\">";
                 echo "  <h3>" . html_encode($result->getTitle()) . "</h3>";
                 echo    html_encode($result->getDescription());
                 echo "</div>";
                 echo "<hr />";
             }
         }
     }

#### 4. Create the new Admin Modules

While the public module example above was quite simple (there was only a single file), you can create a much more extensible hierarchy by creating components within your modules. Here is an example of the Sandbox modules administrative file structure:

    www-root/core/modules/admin/
        \_ sandbox.inc.php
            \_ sandbox/add.inc.php
            \_ sandbox/delete.inc.php
            \_ sandbox/edit.inc.php
            \_ sandbox/index.inc.php

**sandbox.inc.php** (1 of 5)

Within `www-root/core/modules/admin/sandbox.inc.php` place the following content:

    <?php
    /**
     * Entrada [ http://www.entrada-project.org ]
     */
    
    if (!defined("PARENT_INCLUDED")) {
        exit;
    } elseif (!isset($_SESSION["isAuthorized"]) || !(bool) $_SESSION["isAuthorized"]) {
        header("Location: " . ENTRADA_URL);
        exit;
    } elseif (!$ENTRADA_ACL->amIAllowed("sandbox", "update", false)) {
        add_error("Your account does not have the permissions required to use this module.");
    
        echo display_error();
    
        application_log("error", "Group [" . $ENTRADA_USER->getActiveGroup() . "] and role [" . $ENTRADA_USER->getActiveRole() . "] do not have access to this module [" . $MODULE . "]");
    } else {
        /*
         * Adds a breadcrumb to the breadcrumb trail.
         */
        $BREADCRUMB[] = array("url" => ENTRADA_RELATIVE . "/admin/sandbox", "title" => $translate->_("Sandbox Admin"));
    
        /*
         * More information on our global namespace is documented http://docs.entrada-project.org/developer/namespace/
         * Some commonly used ones include $HEAD[] and $ONLOAD[].
         */
    
        /*
         * Renders the sandbox sidebar View Helper.
         */
        $sidebar = new Views_Sandbox_Sidebar();
        $sidebar->render();
    
        if ($router && $router->initRoute()) {
            /*
             * Loads user specific preferences for this module that are persistent between logins. This information
             * is stored in the entrada_auth.user_preferences table. Any preferences that are changed by the user are
             * updated below by the preferences_update() function.
             */
            $PREFERENCES = preferences_load($MODULE);
    
            $module_file = $router->getRoute();
            if ($module_file) {
                require_once($module_file);
            }
    
            /*
             * This checks to see if any preferences have been changed, and updates them within the
             * entrada_auth.user_preferences table as needed.
             */
            preferences_update($MODULE, $PREFERENCES);
        }
    }

**sandbox/add.inc.php** (2 of 5)

Within `www-root/core/modules/admin/sandbox/add.inc.php` place the following content:

    <?php
    /**
     * Entrada [ http://www.entrada-project.org ]
     */
    
    if (!defined("PARENT_INCLUDED")) {
        exit;
    } elseif (!isset($_SESSION["isAuthorized"]) || !(bool) $_SESSION["isAuthorized"]) {
        header("Location: " . ENTRADA_URL);
        exit;
    } elseif (!$ENTRADA_ACL->amIAllowed("sandbox", "create")) {
        add_error("Your account does not have the permissions required to use this module.");
    
        echo display_error();
    
        application_log("error", "Group [" . $ENTRADA_USER->getActiveGroup() . "] and role [" . $ENTRADA_USER->getActiveRole() . "] do not have access to this module [" . $MODULE . "]");
    } else {
        $PAGE_META["title"] = $translate->_("Add Sandbox");
    
        $BREADCRUMB[] = array("title" => $translate->_("Add Sandbox"));
    
        /*
         * Error checking portion of the add page.
         */
        switch ($STEP) {
            case 2 :
                /*
                 * Required: title
                 * Input cleaning includes trimming, removing HTML, ensuring field is between 1 and 255 characters.
                 */
                if (isset($_POST["title"]) && ($title = clean_input($_POST["title"], array("trim", "nohtml", "min:1", "max:255")))) {
                    $PROCESSED["title"] = $title;
                } else {
                    $PROCESSED["title"] = "";
    
                    add_error($translate->_("Please provide a title, which should be between 1 and 255 characters."));
                }
    
                /*
                 * Not Required: description
                 * Input cleaning includes trimming, removing HTML, and ensuring field is at least 1 character.
                 */
                if (isset($_POST["description"]) && ($description = clean_input($_POST["description"], array("trim", "nohtml", "min:1")))) {
                    $PROCESSED["description"] = $description;
                } else {
                    $PROCESSED["description"] = "";
                }
    
                if (!has_error()) {
                    /*
                     * Adding a created_date and created_by record for the sandbox table.
                     */
                    $PROCESSED["created_date"] = time();
                    $PROCESSED["created_by"] = $ENTRADA_USER->getID();
    
                    /*
                     * Instantiates a new Models_Sandbox, inserts the row into the sandbox table, and returns
                     * the new auto-incremented id of this sandbox record.
                     */
                    $sandbox = new Models_Sandbox($PROCESSED);
                    $record = $sandbox->insert();
                    if ($record) {
                        /*
                         * Adds a success message that will display on the next page.
                         */
                        Entrada_Utilities_Flashmessenger::addMessage(sprintf($translate->_("The %s sandbox has been created successfully."), $title), "success", $MODULE);
    
                        /*
                         * Logs the successful creation of the sandbox.
                         */
                        application_log("success", "Successfully created sandbox ID [" . $record->getID() . "].");
    
                        /*
                         * Redirects the user to the admin page.
                         */
                        header("Location: " . ENTRADA_URL . "/admin/sandbox");
                        exit;
                    } else {
                        /*
                         * Sets an error message that will show to the user.
                         */
                        add_error($translate->_("We failed to create the %s sandbox. Please try again later."));
    
                        /*
                         * Logs the error message along with any error returned by the database server.
                         */
                        application_log("error", "Failed to create a sandbox record. Database said:" . $db->ErrorMsg());
                    }
                }
            break;
            case 1 :
            default :
                /*
                 * Sets the fields used by the Views_Sandbox_Form form.
                 */
                $PROCESSED = array(
                    "title" => "",
                    "description" => "",
                );
            break;
        }
        ?>
    
        <h1><?php echo $translate->_("Add Sandbox"); ?></h1>
    
        <?php
        /*
         * Displays any error messages that have been set.
         */
        if (has_error()) {
            echo display_error();
        }
    
        /*
         * Required options used by the form renderer.
         */
        $options = array(
            "action_url" => ENTRADA_RELATIVE . "/admin/sandbox?section=add",
            "cancel_url" => ENTRADA_RELATIVE . "/admin/sandbox",
        );
    
        /*
         * Pushes the safely sanitized $PROCESSED array into options, which is passed to the form renderer.
         */
        $options = array_merge($options, $PROCESSED);
    
        /*
         * Renders the sandbox sidebar View Helper.
         */
        $sandbox_form = new Views_Sandbox_Form();
        $sandbox_form->render($options);
    }


**sandbox/delete.inc.php** (3 of 5)

Within `www-root/core/modules/admin/sandbox/delete.inc.php` place the following content:

    <?php
    /**
     * Entrada [ http://www.entrada-project.org ]
     */
    
    if (!defined("PARENT_INCLUDED")) {
        exit;
    } elseif (!isset($_SESSION["isAuthorized"]) || !(bool) $_SESSION["isAuthorized"]) {
        header("Location: " . ENTRADA_URL);
        exit;
    } elseif (!$ENTRADA_ACL->amIAllowed("sandbox", "delete")) {
        add_error("Your account does not have the permissions required to use this module.");
    
        echo display_error();
    
        application_log("error", "Group [" . $ENTRADA_USER->getActiveGroup() . "] and role [" . $ENTRADA_USER->getActiveRole() . "] do not have access to this module [" . $MODULE . "]");
    } else {
        $PAGE_META["title"] = $translate->_("Delete Sandboxes");
    
        $BREADCRUMB[] = array("url" => ENTRADA_RELATIVE . "/admin/sandbox?section=delete", "title" => $translate->_("Delete Sandboxes"));
    
        if (isset($_POST["delete"]) && is_array($_POST["delete"]) && !empty($_POST["delete"])) {
            /*
             * An empty array of ids to delete.
             */
            $delete_ids = array();
    
            foreach ($_POST["delete"] as $id) {
                if ($id = (int) $id) {
                    $delete_ids[] = $id;
                }
            }
    
            if ($delete_ids) {
                /*
                 * Mark whether or not the user has already confirmed that these should be deleted.
                 */
                $confirmed = ((isset($_POST["confirmed"]) && $_POST["confirmed"] == 1) ? 1 : 0);
    
                if ($confirmed) {
                    /*
                     * Using the Models_Sandbox's delete() method, delete the array of ids.
                     */
                    $sandbox = new Models_Sandbox();
                    if ($sandbox->delete($delete_ids)) {
                        /*
                         * Adds a success message that will display on the next page.
                         */
                        Entrada_Utilities_Flashmessenger::addMessage($translate->_("The selected sandboxes have been deleted successfully."), "success", $MODULE);
    
                        /*
                         * Logs the successful deletion of the sandboxes.
                         */
                        application_log("success", "Successfully deleted sandbox IDS [" . implode(", ", $delete_ids) . "].");
                    } else {
                        /*
                         * Sets an error message that will show to the user.
                         */
                        Entrada_Utilities_Flashmessenger::addMessage($translate->_("We failed to delete the selected sandboxes. Please try again later."), "error", $MODULE);
    
                        /*
                         * Logs the error message along with any error returned by the database server.
                         */
                        application_log("error", "Failed to delete the sandbox records. Database said:" . $db->ErrorMsg());
                    }
    
                    /*
                     * Redirects the user to the admin page.
                     */
                    header("Location: " . ENTRADA_URL . "/admin/sandbox");
                    exit;
                } else {
                    ?>
    
                    <h1><?php echo $translate->_("Delete Sandboxes"); ?></h1>
    
                    <?php
                    echo display_notice($translate->_("Please confirm that you wish to delete the following sandboxes."));
    
                    $results = Models_Sandbox::fetchRecords($delete_ids);
                    if ($results) {
                        ?>
                        <form action="<?php echo ENTRADA_RELATIVE; ?>/admin/sandbox?section=delete" method="post">
                            <input type="hidden" name="confirmed" value="1" />
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn btn-danger"><?php echo $translate->_("Confirm Removal"); ?></button>
                                        </td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php foreach ($results as $result) : ?>
                                    <tr id="sandbox-<?php echo $result->getID(); ?>">
                                        <td>
                                            <input type="checkbox" name="delete[]" value="<?php echo $result->getID(); ?>" checked="checked" />
                                        </td>
                                        <td><a href="<?php echo ENTRADA_RELATIVE; ?>/admin/sandbox?section=edit&amp;id=<?php echo $result->getID(); ?>"><?php echo html_encode($result->getTitle()); ?></a></td>
                                        <td><?php echo html_encode($result->getDescription()); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </form>
                        <?php
                    }
                }
            } else {
                header("Location: " . ENTRADA_URL . "/admin/sandbox");
                exit;
            }
        } else {
            header("Location: " . ENTRADA_URL . "/admin/sandbox");
            exit;
        }
    }


**sandbox/edit.inc.php** (4 of 5)

Within `www-root/core/modules/admin/sandbox/edit.inc.php` place the following content:

    <?php
    /**
     * Entrada [ http://www.entrada-project.org ]
     */
    
    if (!defined("PARENT_INCLUDED")) {
        exit;
    } elseif (!isset($_SESSION["isAuthorized"]) || !(bool) $_SESSION["isAuthorized"]) {
        header("Location: " . ENTRADA_URL);
        exit;
    } elseif (!$ENTRADA_ACL->amIAllowed("sandbox", "update")) {
        add_error("Your account does not have the permissions required to use this module.");
    
        echo display_error();
    
        application_log("error", "Group [" . $ENTRADA_USER->getActiveGroup() . "] and role [" . $ENTRADA_USER->getActiveRole() . "] do not have access to this module [" . $MODULE . "]");
    } else {
        $PAGE_META["title"] = $translate->_("Edit Sandbox");
    
        $BREADCRUMB[] = array("title" => $translate->_("Edit Sandbox"));
    
        if (isset($_GET["id"]) && ($id = clean_input($_GET["id"], "int"))) {
            $PROCESSED = Models_Sandbox::fetchRowByID($id)->toArray();
        }
    
        if ($PROCESSED) {
            /*
             * Error checking portion of the edit page.
             */
            switch ($STEP) {
                case 2 :
                    /*
                     * Required: title
                     * Input cleaning includes trimming, removing HTML, ensuring field is between 1 and 255 characters.
                     */
                    if (isset($_POST["title"]) && ($title = clean_input($_POST["title"], array("trim", "nohtml", "min:1", "max:255")))) {
                        $PROCESSED["title"] = $title;
                    } else {
                        $PROCESSED["title"] = "";
    
                        add_error($translate->_("Please provide a title, which should be between 1 and 255 characters."));
                    }
    
                    /*
                     * Not Required: description
                     * Input cleaning includes trimming, removing HTML, and ensuring field is at least 1 character.
                     */
                    if (isset($_POST["description"]) && ($description = clean_input($_POST["description"], array("trim", "nohtml", "min:1")))) {
                        $PROCESSED["description"] = $description;
                    } else {
                        $PROCESSED["description"] = "";
                    }
    
                    if (!has_error()) {
                        /*
                         * Adding a created_date and created_by record for the sandbox table.
                         */
                        $PROCESSED["updated_date"] = time();
                        $PROCESSED["updated_by"] = $ENTRADA_USER->getID();
    
                        /*
                         * Instantiates a new Models_Sandbox, update the row into the sandbox table, and returns
                         * the new auto-incremented id of this sandbox record.
                         */
                        $sandbox = new Models_Sandbox($PROCESSED);
                        $record = $sandbox->update();
                        if ($record) {
                            /*
                             * Adds a success message that will display on the next page.
                             */
                            Entrada_Utilities_Flashmessenger::addMessage(sprintf($translate->_("The %s sandbox has been updated successfully."), $title), "success", $MODULE);
    
                            /*
                             * Logs the successful update of this sandbox.
                             */
                            application_log("success", "Successfully updated sandbox ID [" . $record->getID() . "].");
    
                            /*
                             * Redirects the user to the admin page.
                             */
                            header("Location: " . ENTRADA_URL . "/admin/sandbox");
                            exit;
                        } else {
                            /*
                             * Sets an error message that will show to the user.
                             */
                            add_error($translate->_("We failed to update the %s sandbox. Please try again later."));
    
                            /*
                             * Logs the error message along with any error returned by the database server.
                             */
                            application_log("error", "Failed to update a sandbox record. Database said:" . $db->ErrorMsg());
                        }
                    }
                    break;
                case 1 :
                default :
                    continue;
                    break;
            }
            ?>
    
            <h1><?php echo $translate->_("Edit Sandbox"); ?></h1>
    
            <?php
            /*
             * Displays any error messages that have been set.
             */
            if (has_error()) {
                echo display_error();
            }
    
            /*
             * Required options used by the form renderer.
             */
            $options = array(
                "action_url" => ENTRADA_RELATIVE . "/admin/sandbox?section=edit&id=" . $PROCESSED["id"],
                "cancel_url" => ENTRADA_RELATIVE . "/admin/sandbox",
            );
    
            /*
             * Pushes the safely sanitized $PROCESSED array into options, which is passed to the form renderer.
             */
            $options = array_merge($options, $PROCESSED);
    
            /*
             * Renders the sandbox sidebar View Helper.
             */
            $sandbox_form = new Views_Sandbox_Form();
            $sandbox_form->render($options);
        } else {
            header("Location: " . ENTRADA_URL . "/admin/sandbox");
            exit;
        }
    }

**sandbox/index.inc.php** (5 of 5)

Within `www-root/core/modules/admin/sandbox/index.inc.php` place the following content:

    <?php
    /**
     * Entrada [ http://www.entrada-project.org ]
     */
    
    if (!defined("PARENT_INCLUDED")) {
        exit;
    } elseif (!isset($_SESSION["isAuthorized"]) || !(bool) $_SESSION["isAuthorized"]) {
        header("Location: " . ENTRADA_URL);
        exit;
    } elseif (!$ENTRADA_ACL->amIAllowed("sandbox", "update", false)) {
        add_error("Your account does not have the permissions required to use this module.");
    
        echo display_error();
    
        application_log("error", "Group [" . $ENTRADA_USER->getActiveGroup() . "] and role [" . $ENTRADA_USER->getActiveRole() . "] do not have access to this module [" . $MODULE . "]");
    } else {
        /*
         * Updates the <title></title> of the page.
         */
        $PAGE_META["title"] = $translate->_("Sandbox Admin Dashboard");
    
        /*
         * Adds a breadcrumb to the breadcrumb trail.
         */
        $BREADCRUMB[] = array("title" => "Dashboard");
        ?>
    
        <h1><?php echo $translate->_("Sandbox Admin Dashboard"); ?></h1>
    
        <?php
        /*
         * Displays any flash messenger entries that exist.
         */
        Entrada_Utilities_Flashmessenger::displayMessages($MODULE);
    
        /*
         * Checks the Entrada_ACL to ensure this current user can create new sandboxes. If they can then it will
         * display the button.
         */
        if ($ENTRADA_ACL->amIAllowed("sandbox", "create")) {
            echo "<a class=\"btn btn-success pull-right space-below\" href=\"" . ENTRADA_RELATIVE . "/admin/sandbox?section=add\"><i class=\"icon-plus-sign icon-white\"></i> " . $translate->_("Add New Sandbox") . "</a>";
        }
    
        /*
         * Models_Sandbox::fetchAllRecords() will return all non-deleted records from the sandboxes table as an array of objects.
         */
        $results = Models_Sandbox::fetchAllRecords();
        if ($results) {
            /*
             * Checks the Entrada_ACL to ensure this current user can delete sandboxes.
             */
            $show_delete = ($ENTRADA_ACL->amIAllowed("sandbox", "delete") ? true : false);
            ?>
            <form action="<?php echo ENTRADA_RELATIVE; ?>/admin/sandbox?section=delete" method="post">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <?php if ($show_delete) : ?>
                    <tfoot>
                        <tr>
                            <td colspan="3">
                                <button class="btn btn-danger"><?php echo $translate->_("Delete Selected"); ?></button>
                            </td>
                        </tr>
                    </tfoot>
                    <?php endif; ?>
                    <tbody>
                    <?php foreach ($results as $result) : ?>
                        <tr id="sandbox-<?php echo $result->getID(); ?>">
                            <td>
                                <?php if ($show_delete) : ?>
                                <input type="checkbox" name="delete[]" value="<?php echo $result->getID(); ?>" />
                                <?php else : ?>
                                &nbsp;
                                <?php endif; ?>
                            </td>
                            <td><a href="<?php echo ENTRADA_RELATIVE; ?>/admin/sandbox?section=edit&amp;id=<?php echo $result->getID(); ?>"><?php echo html_encode($result->getTitle()); ?></a></td>
                            <td><?php echo html_encode($result->getDescription()); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
            <?php
        }
    }

#### 5. Create the new View Helpers

A view helper allows you to create a single block of reusable code that can be displayed in many places. There are quite a few presently undocumented options and features of our view helpers so we would encourage you to review the files within the `www-root/core/library/Views/` directory for more information. Developer Tip: `HTMLTemplate.php` is an especially interesting feature.

You will notice that if you visit [http://entrada-1x-me.dev/sandbox](http://entrada-1x-me.dev/sandbox) in your web browser that you will now see a PHP error. That is due to the fact that we are using **view helpers** on lines 30 - 31 of `www-root/core/modules/public/sandbox.inc.php` but have not yet created the files.

Proceed with creating the two new files to accommodate the `Views_Sandbox_Sidebar` and `Views_Sandbox_Form` view helpers:

**Sandbox/Form.php** (1 of 2)

Within `www-root/core/library/Views/Sandbox/Form.php` place the following content:

    <?php
    /**
     * Entrada [ http://www.entrada-project.org ]
     */
    
    class Views_Sandbox_Form extends Views_HTML {
    
        protected function validateOptions($options = array()) {
            return $this->validateIsSet($options, array("action_url", "cancel_url", "title", "description"));
        }
    
        protected function renderView($options = array()) {
            global $translate;
    
            /*
             * $options["action_url"] is specified as a required in the validateOptions() method
             * defined above. We can safely use it here.
             */
            $action_url = $options["action_url"];
            $cancel_url = $options["cancel_url"];
    
            $title = $options["title"];
            $description = $options["description"];
            ?>
            <form class="form-horizontal" action="<?php echo $action_url ?>" method="POST">
                <input type="hidden" name="step" value="2" />
                <div class="control-group">
                    <label class="control-label form-required" for="sandbox-title"><?php echo $translate->_("Sandbox Title"); ?></label>
                    <div class="controls">
                        <input type="text" class="input-xxlarge" name="title" id="sandbox-title" value="<?php echo html_encode($title); ?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label form-nrequired" for="sandbox-description"><?php echo $translate->_("Sandbox Description"); ?></label>
                    <div class="controls">
                        <textarea class="input-xxlarge expandable" name="description" id="sandbox-description"><?php echo html_encode($description); ?></textarea>
                    </div>
                </div>
                <div class="row-fluid">
                    <a href="<?php echo $cancel_url; ?>" class="btn btn-default pull-left"><?php echo $translate->_("Cancel"); ?></a>
                    <input type="submit" class="btn btn-primary pull-right" value="<?php echo $translate->_("Submit"); ?>" />
                </div>
            </form>
            <?php
        }
    }


**Sandbox/Sidebar.php** (2 of 2)

Within `www-root/core/library/Views/Sandbox/Sidebar.php` place the following content:

    <?php
    /**
     * Entrada [ http://www.entrada-project.org ]
     */
    
    class Views_Sandbox_Sidebar extends Views_HTML {
        /**
         * Render the sidebar target.
         *
         * @param $options
         */
        protected function renderView($options = array()) {
            global $translate, $ENTRADA_ACL;
    
            $sidebar_html  = "<ul class=\"nav nav-list\">";
            $sidebar_html .= "    <li><a href=\"" . ENTRADA_RELATIVE . "/sandbox\">" . $translate->_("Public Side") . "</a></li>";
    
            if ($ENTRADA_ACL->amIAllowed("sandbox", "create", false)) {
                $sidebar_html .= "<li><a href=\"" . ENTRADA_RELATIVE . "/admin/sandbox\">" . $translate->_("Admin Side") . "</a></li>";
            }
    
            $sidebar_html .= "</ul>";
    
            new_sidebar_item($translate->_("Sandbox Sidebar"), $sidebar_html, "page-sandbox", "open");
        }
    }

### Finishing Tasks

At this point you should have a relatively functional module that allows you to create, read, update, and delete items from the `entrada.sandbox` table. There a few final tasks to complete the new module.
 
#### 1. Add an ACL Array Entry
 
Entrada's ACL is quite powerful, albeit slightly complex. For more information on exactly how the Access Control Level feature works please visit the [Entrada ACL](developer/entrada-acl) section.

Within the `www-root/core/library/Entrada/authentication/entrada_acl.inc.php` file you will want to add the `resource_type` that you created back in the migration to the `$modules` array. This will allow groups other than `medtech:admin` to access your module based on `entrada_auth.acl_permissions` records that have been setup for this `resource_type`.
 
For example:

	var $modules = array (
		"mom" => array (
            ...
            "reportindex",
            "sandbox",
            "quiz" => array (
                "quizquestion",
                "quizresult"
            ),
            ...
    );

#### 2. Add an Admin Menu Entry

The **Admin** tab within the primary navigation near the top of the Entrada user interface would benefit from having a "Manage Sandbox" link added to it.
 
In order to do this add the following line to the `$MODULES` section of the `www-root/core/config/settings.inc.php` file:

    $MODULES["sandbox"] = array("title" => "Manage Sandbox", "resource" => "sandbox", "permission" => "create");
    
This will give anyone with _create_ access to the sandbox resource a menu item within the Admin tab. 

## Getting Help

This Quickstart Guide is intended to give you an overview of how to create a new module within Entrada ME 1.8. It will also give you a glimpse into how Entrada operates. If you would like a more in-depth one-on-one tutorial, please contact the Entrada Consortium team or reach out in our Slack channel.
