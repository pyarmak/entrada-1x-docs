# Entrada ACL

Entrada has a flexible and robust role based access system that extends Zend_Acl. It relies on two main files:

 * `www-root/core/library/Entrada/authentication/aclfactory.inc.php`
 * `www-root/core/library/Entrada/authentication/entrada_acl.inc.php`

The `$ENTRADA_ACL` object is available throughout Entrada for any logged in users, and it's as easy to use as this:

```php
if ($ENTRADA_ACL->amIAllowed("dashboard", "read")) {
    echo "Alright!";
} else {
    echo "You do not have sufficient privileges to view this page.";
}
```

Alright! This page will feature a guide on using the permissions system to protect your components within Entrada, and at the end a link to the code notes page which you should reference if you need to edit the system code to change something.

## Terminology

Before diving in, a few things need to be clarified and defined.

| Term | Description |
| ---- | ----------- |
| The ACL | An Access Control List is a type of RBAC (Role Based Access Control) which uses a list of who can access what to organize the permissions. In this document, "the ACL" refers to the Access Control List object implemented in Entrada, available in the `$ENTRADA_ACL` variable on every page. |
| Role (entity) | A role or entity in the context of this page, unless specifically mentioned, is one of the following: <ul><li>a particular user</li><li>a group of users represented by a particular role title</li><li>a group of users represented by a particular group title</li><li>an organisation</li></ul> It's a role in the most traditional sense of the word; it can be played by just about anyone. On this page this kind of role will be referred to as much as possible by the word "entity", in order to distinguish it from user roles such as "admin" and "pcoordinator".
| Resource | A resource in the ACL is something that needs protecting. Some examples are:<ul><li>the dashboard page</li><li>course_id 4</li><li>the clerkship module as a whole</li></ul> |
| Role / Resource Permission | Throughout the rest of Entrada, the word permissions is used to describe the permissions masking feature. Role or resource permissions are different from this, and when the word permission is used, this is what it will refer to. The role/resource permissions are used by the system to give or take permission to/from an entity on a particular resource. These will be detailed later. |
| Resource Object | The ACL uses some smart resource objects instead of just string handlers like you see in the first example in some situations. These will be detailed later. |
| Assertion | A class used by the ACL to determine if a rule applies or not. These will be detailed later. |

## The Two Rs

The ACL uses a generic model to represent authorization in Entrada. There is a tree of resources representing the things a user might need to access, and a tree of roles representing the user itself, the user's group, the user's role, and the user's organisation. These trees are then cross-referenced with permissions, allowing a particular user to access particular resources. Each role and resource inherits from its parents in the tree, facilitating both broad and specific permission specification.

These references between roles and resources are defined by a combination of resource_type, resource_value, entity_type, and entity_value. These designators are all optional fields in the ACL permissions table in the database, and along with the actual permission (create, read, edit, and/or delete) define exactly who and what each permission applies to. Each field can be null, so permissions can be applied to specific resources/entities or many resources/entities. See below for a list of valid combinations of designators, and an example of whom they might affect:

| resource_type	| resource_value | entity_type | entity_value | Description | Example |
| ------------- | -------------- | ----------- | ------------ | ----------- | ------- |
| set | set | set | set |	Allows a specific entity to access a specific resource | User ID 1 has edit on Course ID 5 BR Organisation ID 2 |
| set | set | null | null | Allows any entity to access a specific resource | Everyone has read on the photo ID 5
set | null | set | set | Allows a specific entity to access a specific type of resource	| Group:role staff:admin has edit on all courses |
| null | null | set | set | Allows a specific entity to access any resource | Group:role medtech:admin has create, read, edit, and delete on everything. |
| set | null | null | null | Allows any entity to access a particular resource type | Everyone has read on courses |

These permissions can easily apply to the same role/resource pairs and contradict each other, so they are applied to the ACL and take precedence over each other in accordance with a few simple rules:

* If no rules apply to a role and resource, the ACL will return false. This a default and unchangeable behavior.
* Any role or resource has no permissions by default, and the ACL applies no permissions other than what is in the database, so with an empty acl_permissions table, every query will return false.
* The first rule that applies to the role resource pair in the tree will answer the query, and nothing higher up in the tree will be considered. The role tree is checked first for permissions applying to the "specific" resource (a resource with a set resource_value, and only if it was supplied), and if a rule applying to the specific resource can't be found, the role tree is then checked again starting from the specific user role for permissions applying to the generic resource (the resource as if a resource_value was not set)
* More specific rules take precedence over less specific ones. This is to say that a role with entity_value or resource_value defined will be considered before a rule without. Specifically, resource_value > entity_value > resource_type > entity_type. After this, the more recently added to the database rule will be considered first.
* The role tree consists of the user's ID (example: user137), which inherits from the user's role (example: rolepcoordinator), which inherits from the user's group (example: groupfaculty), which inherits from the user's organisation (example: organisation2), which inherits from the prototype resource object (always called "organisation"). Rules applied to this object will also apply to every single role object as every role object inherits from this prototype. Rules of this type will only be considered in the event no other rules are found lower in the tree.

All these rules usually deal with corner cases. Often there is no rule applying to the role, resource, and specific ability being queried (such as group student and 'create' on course), or just one rule granting a group or role a set of abilities on a resource. At the moment there are no purposeful conflicts among the role/resource permissions, and for easy upgradability and maintainability you should strive to maintain this property of the system.

## Introducing Logic

The system allows for very specific rules and large generalizations in its current incarnation, and for everything else some more code is needed. In the event you want to give all directors permission to edit the content of the events they teach, you would have to insert a row into the permissions table for every role (each director) and every event (each event a particular director teaches). This is far from optimal, so the concept of assertions is introduced. An assertion is something that narrows the scope of a rule based on contextual information about the role, resource, and any other thing you can make PHP observe.

Every role/resource permission row in the database can have many assertions applied to it by adding the names of the assertions separated by an ampersand in the assertion field of the record. Assertions must be classes defined somewhere in the application that implement the Zend_Acl_Assertion_Interface. These classes must have one method `assert`:

```php
assert(Zend_Acl &$acl, Zend_Acl_Role_Interface &$role, Zend_Acl_Resource_Interface &$resource, string $privilege);
```

The assert method of each assertion is passed the `$acl` object calling it, the `$role` and `$resource` the permission applies to, and the `$privilege` being queried. This allows you to create arbitrary code to check virtually anything about the resource or the role the permission applies to. For example, you are able to create an assertion to check if a role representing a user is the director of a course, or if the role has permission to view this user's photo based on the owner's privacy setting. Passing the appropriate information to the assertion can be complicated, but once the assertion and accompanying classes are written, one-line permission checks can be used everywhere else in the code that relies on the same logic.

An example of the power and usability is the CourseOwner and EventOwner assertions: when the course director schema was changed (the director_id field of a course was eliminated and all directors now reside in course_contacts), only the two queries in the assertions had to be changed, and instantly the whole application was using the new schema to determine course and event permissions. Writing assertions is harder than embedding permissions logic, but the centralized nature of the permissions and the ease of permissions checks once the code is written creates a much easier environment for writing modules.

## Assertion Implementation Details

The ACL currently supports queries in two formats:
```php
$bool = $ENTRADA_ACL->isAllowed("user10", "course5", "read");
```
and
```php
$bool = $ENTRADA_ACL->isAllowed(new EntradaUser($ENTRADA_USER->getId()), new CourseResource($COURSE_ID), "read");
```

The second example above demonstrates the ACL's ability to use objects as roles and resources instead of simple string identifiers. This flexibility is implemented in Zend_Acl, and the Entrada_Acl component supports this and extends it wherever possible. All the roles and the resources in Zend_Acl are stored as objects, and they must have unique string identifiers. Referencing them in the tree structure can be as easy as passing the method the string identifier of the role and resource, or you can pass it an object that implements the Zend_Acl_Role_Interface or Zend_Acl_Resource_Interface, which has a method to return the string identifier for comparisons and identification.

This flexibility also means that writing assertions is more difficult, as information may have to parsed out of a string identifier or accessed from an object. The `assert` method signature is this:

```php
assert(Zend_Acl &$acl, Zend_Acl_Role_Interface &$role, Zend_Acl_Resource_Interface &$resource, string $privilege);
```

This dictates that `assert` will never be passed an actual string as role or resource, because the ACL converts a string to a basic Zend_Acl_Role or Zend_Acl_Resource object before passing them to the assertion. However, these classes only have one method that returns the role's or resource's identifier, and no other functionality. Within the assertion, the role's or resource's string identifier `getResourceId` method (which is required by the interface) would return something like "course5".

For example, the CourseOwner assertion will operate on a Zend_Acl_Role object by using the getResourceId method to get the string identifier, and parsing out the numeric course ID for use in the actual assertion. It will also operate on a CourseResource, which has the class members `$course_id` and `$organisation_id`, which can be accessed cleanly and then are used in the actual assertion.

It is advantageous to write a custom resource class to represent each resource in the application. They store information about the resource more effectively and less expensively, and start the application it its way to object oriented bliss.

Also, assertions' return values matter. If an assertion returns true, the ACL takes this to mean the rule applies, and then returns whatever the rule dictated (which can be either allow or deny). If the assertion returns false, the ACL takes this to mean the rule does not apply, and continues searching up the tree to find any more rules that do. The assertion's return value itself is NOT returned by the query.

## Constructs Within Entrada_ACL

### amIAllowed

Zend_Acl ships with only one method for querying, the `amIAllowed($role, $resource, $privilege);` method. For convenience's sake, an `amIAllowed($resource, $privilege);` method has been written to do the permissions query using the currently authenticated user as the role. It is also permissions-mask aware, so it can be called anywhere in the application to do a permissions query for the user viewing the page.

### ResourceOrganisation

There is one resource and assertion pair that is very useful for organisation related filtering. Consequently, the resource is named "resourceorganisation" and the assertion is named ResourceOrganisationAssertion. The purpose of these is to provide a sort of token resource which permissions can be applied to and then checked based on user's organisation. For each organisation there can be a resourceorganisation resource, and permissions applied to it. For example, Undergraduate Medicine might give all its students read privileges on `resourceorganisation1` (representing them), but not give any permissions to Postgraduate Medicine. In combination with the ResourceOrganisationAssertion, this effectively means students within Undergraduate Medicine can "read" resources belonging to Undergraduate Medicine, and users in Postgraduate Medicine cannot.

The ResourceOrganisationAssertion will perform assertions on whatever resource you pass it, as long as it is somehow able to grab the organisation ID from the resource. This means it **must** be a custom resource and not a string identifier or Zend_Acl_Resource that is passed to the ACL `isAllowed` or `amIAllowed` method. If the resource object has an `$resource->organisation_id` member, the assertion will use this. It can also accept resources with `$resource->course_id` and `$resource->event_id` defined, however if this is all the information it's given, it must perform a query to grab the organisation_id, which can become expensive. It is recommended to pass the ResourceOrganisationAssertion a resource with `$resource->organisation_id` set.

Once the ResourceOrganisationAssertion has determined the organisation_id of the resource in question, it will return based on the ability of the `$role` to perform the `$privilege` on the resourceorganisation resource representing the organisation of the original resource. An example: A user from Postgraduate Medicine queries the ACL asking if it can read one of Undergraduate Medicine's courses. There is a rule in the database that says "everyone can read courses as long as they pass the ResourceOrganisationAssertion". In the database, this would look like this:

| resource_type | resource_value | entity_type | entity_value | create | read | update | delete | assertion |
| ------------- | -------------- | ----------- | ------------ | ------ | ---- | ------ | ------ | --------- |
| course        | null           | null        | null         | null   | 1    | null   | null   | ResourceOrganisation |

So this user should be able to read Undergraduate Medicine courses if they pass the assertion. ResourceOrganisationAssertion is passed the course object, and extracts the organisation_id. It then queries the ACL to find if the current user can perform "read" on `organisation1` (representing Undergraduate Medicine). This query returns false because Undergraduate Medicine hasn't granted anyone other than its own users read on its resourceorganisation resource, so the assertion returns false, the rule doesn't apply, and the user is denied access.

### last_query and last_query_role

When an assertion is asked to assert, it is passed the role and resource that the rule applies to. For example, let there be a rule stating organisation 1 can.
