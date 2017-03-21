# Entrada Database

## Database Migrations

The process for recording changes to the Entrada database schema has changed as of Entrada 1.6.1. It is now significantly simpler to managing using the Entrada CLI utility.

### Creating New Migrations

In this example, we will be adding a new `uuid` column to the `entrada_auth.user_data` table.

Using Terminal change to your Entrada directory, and run the base CLI utility
```
cd ~/Sites/entrada-1x-me
php entrada
```
You should see something like:
```
php entrada

The following commands are available in Entrada CLI 1.0:

migrate        Allows you to manage database migrations.
model          Create blank models based on database information.
help           The Entrada CLI help menu.
```

Now lets see which actions are available to the migrate command:
```
php entrada migrate

The following actions are available in the migrate command:

--create         Create a new Entrada database migration file.
--pending        See a list of the pending database migrations in your installation.
--up-s           Run all pending migrations against your database. Provide optional filename to output SQL instead of run it.
--down-s         Rollback the last successful up migration. Provide optional filename to output SQL instead of run it.
--audit          Verifies that all present migrations have been run successfully.
--help           The migrate help menu.
```

To create a new migration use the `--create` action:
```
php entrada migrate --create

Provide the Entrada GitHub Issue number for this change: 12345

Successfully created new migration file:
/Users/simpson/Sites/entrada-1x-me/www-root/core/library/Migrate/2015_04_17_233339_12345.php
```

Open up the newly generated `www-root/core/library/Migrate/2015_04_17_233339_12345.php` file and record your changes for
upgrading to the `up()` method, and your changes for reverting to the `down()` method. Entrada also provides an extremely useful
`audit()` method that allows you to programmatically check to see if this change exists in your Entrada database or not.

```php
<?php
class Migrate_2015_04_17_225348_12345 extends Entrada_Cli_Migrate {

    /**
     * Required: SQL / PHP that performs the upgrade migration.
     */
    public function up() {
        $this->record();
        ?>
        ALTER TABLE `<?php echo AUTH_DATABASE; ?>`.`user_data` ADD COLUMN `uuid` varchar(36) DEFAULT NULL;
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
        ALTER TABLE `<?php echo AUTH_DATABASE; ?>`.`user_data` DROP `uuid`;
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
        if ($migration->columnExists(AUTH_DATABASE, "user_data", "uuid")) {
            return 1;
        }

        return 0;
    }
}
```
You can now commit this file to version control, and everyone can apply your changes.

### Applying Pending Migrations

If you would simply like to see if there are pending migrations you can use `--pending`:
```
php entrada migrate --pending

The following 2 up migrations need to be run:
    > 2015_04_17_225348_1234
    > 2015_04_17_233339_12345
```

To apply the changes to your database simply use `--up`:
```
php entrada migrate --up

The following 2 up migrations need to be run:
    > 2015_04_17_225348_1234
    > 2015_04_17_233339_12345

These SQL changes will be automatically applied to the database.

Would you like to proceed? [Y/n]: 
```

## Database Models

A model is a PHP class that represents a table in the database. It provides getter and setter methods for attributes that correspond to the columns in the table. A model class also provides the create, read, update and delete (CRUD) methods required to interact with the database. Entrada read methods follow the naming convention `fetchRowBy<attributes>` or `fetchAllBy<attributes>` to fetch a single row or a collection of results, respectively. `<attributes>` is replaced by the names of the columns that are used in the query.

Entrada has a base model that all other models can inherit from. This base model provides private fetchRow and fetchAll methods that child classes can call from their public fetch* methods. This helps to abstract the basic mechanics of performing a fetch and provides a simplified interface for creating queries.

Below is an example of how to use the model base class. The base class itself is commented with a detailed explanation of how to use the fetch methods it contains.

```php
class Models_Example extends Models_Base {
    /**
     * N.B.: Put the exact names of the columns as these are accessed literally
     * in the base class's fetching code (e.g. fromArray()).
     */
    protected $example_id;
    protected $title;
    protected $active;
    
    protected $database_name = DATABASE_NAME;

    protected $table_name = "example";
    protected $primary_key = "example_id";      // Name of primary key column in the database. The "closest thing to a standard" is to name primary key columns table_name_singular_id, e.g. "events.event_id".
    protected $default_sort_column = "title";

    public function __construct($arr = NULL) {
        parent::__construct($arr);
    }

    /**
     * Get the primary key.
     *
     * @return The primary key of the record represented by this model.
     */
    public function getID() {
        return $this->example_id;
    }

    /**
     * @param int $active
     */
    public function setActive($active) {
        $this->active = $active;
    }

    /**
     * @return int
     */
    public function getActive() {
        return $this->active;
    }

    /**
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    public static function fetchRowByID($example_id, $active = 1) {
        $self = new self();
        
        $constraints = array(
            array(
                "key" => "example_id",
                "method" => "=",
                "value" => $example_id,
                "mode" => "AND"
            ),
            array(
                "key" => "active",
                "method" => "=",
                "value" => $active,
                "mode" => "AND"
            )
        );
        
        return $self->fetchRow($constraints);
    }

    public static function fetchAllByActive($active = 1) {
        $self = new self();

        $constraints = array(
            array(
                "key"       => "active",
                "method"    => "="
                "value"     => $active,
                "mode"      => "AND",
            )
        );

        return $self->fetchAll($constraints);
    }
}
```

The table name is stored in the `$table_name` attribute and can be used in the insert and update methods. The `$default_sort_column` is used when a sort column is not found in a fetch method call. The constructor calls the base class constructor and the `getID()` method is our naming convention of getting the primary key of the record that is represented by an instance of the model class.

An `$active` attribute is typically included as part of a database table in order to deactivate data instead of actually deleting it.

## Database Tables
ID fields that effectively contain foreign keys should use NULL as an "empty" value instead of 0, even if using MyISAM, as using "0" as an empty value can cause problems when implementing foreign keys in InnoDB.

There has been a recommendation to use utf8_unicode_ci as the collation in new work going forward.

### Column naming

The closest thing to a standard is naming PRIMARY KEY columns as the singular of the table name, then `_id`. The first n - 1 words are abbreviated by their first letters. For example, if the table is `events`, it would be `event_id`. If it were `event_contacts` it would be `econtact_id`. If it were `event_contact_positions` it would be `ecposition_id`.
