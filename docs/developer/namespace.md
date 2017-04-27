# Global Namespace

## Entrada ME

Entrada has many moving parts, and understanding what's available to you as a developer will go a long way to learning Entrada.

**Objects**

- [$db](#db-object)
- [$ENTRADA_ACL](#entrada_acl-object)
- [$ENTRADA_CACHE](#entrada_cache-object)
- [$ENTRADA_ROUTER](#entrada_router-object)
- [$ENTRADA_SETTINGS](#entrada_settings-object)
- [$ENTRADA_TEMPLATE](#entrada_template-object)
- [$ENTRADA_USER](#entrada_user-object)
- [$translate](#translate-object)

**Arrays**

- [$ONLOAD](#onload-array)
- [$JQUERY](#jquery-array)
- [$HEAD](#head-array)
- [$BREADCRUMB](#breadcrumb-array)
- [$AGENT_CONTACTS](#agent_contacts-array)
- [$MODULES](#modules-array)
- [$ADMINISTRATION](#administration-array)

**Variables**

- [$SECTION](#section-variable)
- [$ACTION](#action-variable)
- [$MODULE](#module-variable)

*****

### $db (Object)

Available: All Entrada Versions

The `$db` object allows you to access the active Entrada
database connection. Entrada uses the [ADOdb](http://adodb.sourceforge.net/docs-adodb.htm) library to accomplish this.

While it is possible to use SQL directly in your code, it is considered best-practice *now* to access the database through the appropriate model (i.e. `Model_Events::get($id)`).

Example Usage (Select):
```php
$query = "SELECT * FROM `events` WHERE `event_id` = ?";
$event = $db->GetRow($query, array($event_id));
if ($event) {
  echo "<h1>" . $event["event_title"] . "</h1>";
}
```

Example Usage (Insert):
```php
$processed = array(
  "event_title" = clean_input($_POST["event_title"], array("nohtml"));
);

if ($db->AutoExecute("events", $processed, "INSERT")) {
  // Event inserted.
}
```

Example Usage (Update):
```php
$processed = array(
  "course_active" = 0;
);

if ($db->AutoExecute("courses", $processed, "UPDATE", "course_id = " . (int) $id)) {
  // Course updated.
}
```

*****

### $ENTRADA_ACL (Object)

Available: Entrada 1.2+

The `$ENTRADA_ACL` object allows you to check whether or not a user has access to do something. The [[Entrada ACL]] is fairly complex, so time should be taken to properly understand how it works.

Example Usage:
```php
if ($ENTRADA_ACL->amIAllowed("event", "create", false)) {
  echo "<a href=\"".ENTRADA_RELATIVE."/admin/events?section=add"\" class=\"btn\">Add Event</a>";
}
```
Entrada 1.6.1: `www-root/core/library/Entrada/authentication/entrada_acl.inc.php`
Entrada 1.7.0: `www-root/core/library/Entrada/Acl.php`

*****

### $ENTRADA_CACHE (Object)

Available: Entrada 1.2+

Using `$ENTRADA_CACHE` allows you to easily save and
load contents from cache. It extends [Zend_Cache](http://framework.zend.com/manual/1.12/en/zend.cache.introduction.html).

Example Usage:
```php
if (!$ENTRADA_CACHE->test("my-cache-key")) {
  $cached_data = "Please cache and use this.";

  $ENTRADA_CACHE->save($cached_data, "my-cache-key");
} else {
  $cached_data = $ENTRADA_CACHE->load("my-cache-key");
}

echo $cached_data;

```
*****

### $ENTRADA_ROUTER (Object)

`$ENTRADA_ROUTER`

*****

### $ENTRADA_SETTINGS (Object)

`$ENTRADA_SETTINGS`

*****

### $ENTRADA_TEMPLATE (Object)

`$ENTRADA_TEMPLATE`

*****

### $ENTRADA_USER (Object)

Available: Unknown

The $ENTRADA_USER object provides details for the currently logged in user.

Example Usage:
```php
/* Create the $ENTRADA_USER object based on the proxy_id of a user who has successfully logged in. */
$ENTRADA_USER = User::get($proxy_id);

/* Get the logged in user's proxy_id. */
$ENTRADA_USER->getID();

/* Get the logged in user's active proxy id (useful in situations where you expect user masking to occur) but will return the actual proxy_id of the user if masking is not being used. */
$ENTRADA_USER->getActiveId();

/* Get the logged in user's active organisation id */
$ENTRADA_USER->getActiveOrganisation();
```
Entrada 1.6.1: `www-root/core/library/Models/users/User.class.php`

*****

### $translate (Object)

Available: Entrada 1.3+

When ever you need to output text on a page should do so like `$translate->_("Your String");`. Entrada uses Zend_Translate to support multiple front-end languages, and when you wrap your language strings with the magic `_()` method your text can be replaced with the correct language.

Example Usage:
```php
<div class="control-group">
  <label class="control-label"><?php echo $translate->_("Course Name"); ?></label>
  ...
</div>
```

*****

### $ONLOAD (Array)

Available: All Entrada Versions

The `$ONLOAD` array allows you to record JavaScript that you would like to run after the DOM load is complete. The elements added to this array during run-time are dynamically added to the bottom of your HTML document within a `jQuery(document).ready(function() { ... });` block.

Example Usage:
```php
$ONLOAD[] = "jQuery('#username').focus()";
```

*****

### $JQUERY (Array)

Available: All Entrada Versions

The `$JQUERY` array allows you to manually include additional jQuery libraries in the correct location (i.e. after the main jQuery library, but before other dependencies) within the current pages' `<head></head>` tags. The elements added to this array during run-time replace the `%JQUERY%` placeholder from the active templates' `header.tpl.php` file.

Example Usage:
```php
$JQUERY[] = "<script src=\"".ENTRADA_RELATIVE."/javascript/jquery/jquery.moment.min.js?release=".html_encode(APPLICATION_VERSION)."\"></script>\n";
```

*****

### $HEAD (Array)

Available: All Entrada Versions

The `$HEAD` array allows you to include additional content within the current pages' `<head></head>` tags. The elements added to this array during run-time replace the `%HEAD%` placeholder from the active templates' `header.tpl.php` file.

Example Usage:
```php
$HEAD[] = "<script src=\"" . ENTRADA_URL . "/javascript/AutoCompleteList.js?release=" . html_encode(APPLICATION_VERSION) . "\"></script>";
```

*****

### $BREADCRUMB (Array)

Available: All Entrada Versions

The `$BREADCRUMB` array is multidimensional array that is used to automatically generate a pages' breadcrumb trail. You simply add arrays to the `$BREADCRUMB` array that contain a `url` and `title` key.

Example Usage:
```php
$BREADCRUMB[] = array("url" => ENTRADA_RELATIVE . "/admin/example", "title" => $translate->_("Example Title"));
$BREADCRUMB[] = array("url" => ENTRADA_RELATIVE . "/admin/example/add", "title" => $translate->_("Add"));
```
Would render:
```
/ Example Title / Add
```

*****

### $AGENT_CONTACTS (Array)

`$AGENT_CONTACTS`

*****

### $MODULES (Array)

`$MODULES`

*****

### $ADMINISTRATION (Array)

`$ADMINISTRATION`

*****

### $SECTION (Variable)

`$SECTION`

*****

### $ACTION (Variable)

`$ACTION`

*****

### $MODULE (Variable)

`$MODULE`

## Entrada CPD

@todo

## Communities

Entrada has many moving parts, and understanding what's available to you as a developer will go a long way to learning Entrada. This page covers the Global Namespace for the Community system.

**Variables**

- [$COMMUNITY_ID](#community-id-variable)
- [$COMMUNITY_URL](#community-url-variable)
- [$COMMUNITY_TEMPLATE](#community-template-variable)
- [$COMMUNITY_THEME](#community-theme-variable)
- [$LOGGED_IN](#logged-in-variable)
- [$COMMUNITY_MEMBER_SINCE](#member-since-variable)
- [$COMMUNITY_MEMBER](#community-member-variable)
- [$COMMUNITY_ADMIN](#community-admin-variable)

*****

### $COMMUNITY_ID (Variable)

Available: All Entrada Versions

The `$COMMUNITY_ID` variable will return the `communities.community_id` of the community that is currently being accessed by the user.

Example Usage:
```php
echo "You are visiting community ID " . $COMMUNITY_ID . "!";
```

*****

### $COMMUNITY_URL (Variable)

Available: All Entrada Versions

The `$COMMUNITY_URL` variable will return the full URL to this community.

*****

### $COMMUNITY_TEMPLATE (Variable)

Available: All Entrada Versions

*****

### $COMMUNITY_THEME (Variable)

Available: All Entrada Versions

*****

### $LOGGED_IN (Variable)

Available: All Entrada Versions

*****

### $COMMUNITY_MEMBER_SINCE (Variable)

Available: All Entrada Versions

*****

### $COMMUNITY_MEMBER (Variable)

Available: All Entrada Versions

*****

### $COMMUNITY_ADMIN (Variable)

Available: All Entrada Versions
