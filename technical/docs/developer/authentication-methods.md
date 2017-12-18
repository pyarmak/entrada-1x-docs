# Authentication Methods

## Local User Database

    define("AUTH_METHOD", "local"); // Defined in core/config/settings.inc.php

  1. The user visits your Entrada installation and enters their Entrada username and password.
  1. Entrada's `index.php` connects to your authentication server `authentication/authenticate.php`, the authentication server then queries the `entrada_auth.user_data` database table for the username and password combination, then ensures a valid `entrada_auth.user_access` database table record exists.
  1. If a valid record is found authentication was success, otherwise an error is returned.

## LDAP / Active Directory

    define("AUTH_METHOD", "ldap"); // Defined in core/config/settings.inc.php

  1. To use LDAP you must first enable it in `authentication/includes/settings.inc.php`.  
  1. Ensure that ldap is present and set to true in the ALLOWED_AUTH_METHODS array.
  1. The user visits your Entrada installation and enters their University username and password.
  1. Entrada `index.php` connects to your authentication server `authentication/autheticate.php`, the authentication server then binds to the LDAP server (`LDAP_HOST` constant), using the privileged account `LDAP_SEARCH_DN`, and `LDAP_SEARCH_DN_PASS` constants configured in `authentication/includes/settings.inc.php`.
  1. After a successful privileged account bind is made to the LDAP server, the authentication server queries the directory to obtain the account information for the University username that the user entered.
  1. Providing a record does exist in the directory, the authentication server then attempts to re-bind to the LDAP server using the generated user_dn, and the University password that the user entered.

        Example User DN: UniUid=mr66,ou=people,dc=queensu,dc=ca

  1. Finally if the authentication server was successfully able to bind to the LDAP server with the user_dn and password, it then queries the `entrada_auth.user_data` database tables' number field (by default) for the staff / student number `LDAP_USER_QUERY_FIELD` constant returned by the directory for that account.
  1. If a valid record is found authentication was success, otherwise an error is returned.

## Single Sign-On

    define("AUTH_METHOD", "sso"); // Defined in `core/config/settings.inc.php`

Entrada supports SSO authentication with either [CAS](http://jasig.github.io/cas/) or [Shibboleth](https://shibboleth.net/), which can be provided in addition to the local and LDAP methods above. The implementation allows for the possibility to have either SSO as an option, or to eliminate the local/LDAP login and force SSO to be used. The setting of AUTH_METHOD will determine how this works.

With this setting, Entrada will present a local login screen, with a link to select SSO or a form to provide local or LDAP credentials.

In this setup, the only valid way to authenticate is SSO, so the local login screen will be bypassed completely. On startup of Entrada, you will immediately re-direct to the SSO authority.

### Shibboleth
Shibboleth consists of `Identity Provider (IDP)` and `Service Provider (SP)` components, where the IDP performs the authentication and the SP acts as the interface to the application. In a typical configuration, the IDP would provide SSO services for a range of different websites at the same organization. The [Shibboleth Website](https://shibboleth.net/about/basic.html) provides a good overview of the concepts and architecture.

The steps for integrating Entrada with Shibboleth authentication would be:

1. Install the Shibboleth Service Provider component on the Entrada web server.
1. Configure the metadata and user attributes in both the Service Provider and Identity Provider.
1. Configure Entrada SSO settings to match the Service Provider configuration.

The Service Provider can be configured in either an `Active` or `Passive` mode. In Active mode, the Apache webserver configuration determines which pages within Entrada are protected and the system will automatically prompt for SSO authentication before displaying the pages. This method is possible for Entrada, but you will have to very carefully configure the apache web server to allow non-secure access to things like RSS feeds. It should also be noted that this approach has not been extensively tested.

----
>If the Service Provider will be setup in Active mode, or you have AUTH_METHOD set to allow SSO only, make sure you have at least one administrative user added to Entrada with a valid student/employee ID before enabling Shibboleth.

----

In Passive mode, SSO authentication will appear as an option on the login page and the user may use SSO or a local/LDAP login to get access to the system, as controlled by AUTH_METHOD.

To enable Shibboleth authentication, set the constants in `core/config/settings.inc.php`. 

    define("AUTH_SSO_ENABLED", true); 
    define("AUTH_SSO_TYPE", "Shibboleth");
    define("AUTH_SSO_LOCAL_USER_QUERY_FIELD", "number");

The language file in the templates directory has an entry "SSO Login" that can be changed to customize the prompt that will appear on the login page.

You can use AUTH_SSO_LOCAL_USER_QUERY_FIELD to change the column that is searched in the authorization database user_data table to match the attribute returned from the Identity Provider.

The authentication module also needs to know about SSO. Enable 'sso' as an available authentication method in `authentication/includes/settings.inc.php`.

    $ALLOWED_AUTH_METHODS = array(
        "local" => true,
        "ldap" => false,
        "sso" => true
    );

Additional `core/config/settings.inc.php` settings are related to the Service Provider configuration:

    define("AUTH_SHIB_URL", "https://entradasp.yourschool.ca");
    define("AUTH_SHIB_LOGIN_URI", "/Shibboleth.sso/Login");
    define("AUTH_SHIB_LOGOUT_URI", "/Shibboleth.sso/Logout");
    define("AUTH_SHIB_SESSION", "Shib-Session-ID");
    define("AUTH_SHIB_ID", "shib-studentid");

The Service Provider component is installed on the same web server as the Entrada application, but could be set up on a separate virtual host. Change AUTH_SHIB_URL to point to that host.

The LOGIN and LOGOUT URIs will point to the login and logout targets to use on the SP host. The definitions provided are the default settings for Shibboleth.

If the Service Provider is using the same virtual host as the Entrada application, you may need to add entries to the root folder's `.htaccess` file to ensure the login and logout URIs are not re-written.

    ...
    RewriteRule ^Shibboleth.sso/* - [L,NC]
    
    # Default Entrada Rules
    ...

The final two constants refer to the Metadata and User Attributes configured in Shibboleth. If Shibboleth authentication is successful, the Service Provider will set attributes in the $_SERVER environment. AUTH_SHIB_ID refers to the attribute that represents the unique identifier for the Entrada user. This will be matched against a column in the Entrada Authorization Database's `user_data` table, based on the column name contained in AUTH_SSO_LOCAL_USER_QUERY_FIELD. This defaults to the "number" column. Other good candidate columns might be username or email, depending on what your organization is prepared to return from the Identity Provider.

After logging into Entrada with Shibboleth, the logout process will invoke the Service Provider's logout end point. What happens then will depend on the configuration of Shibboleth. In most cases this would redirect to a logout page on the Identity Provider, which will terminate all SSO sessions that the user has created - with Entrada and any other services supported by that Identity Provider.

### CAS
To enable CAS authentication, update the constants in `core/config/settings.inc.php`

    define("AUTH_SSO_ENABLED", true);
    define("AUTH_SSO_TYPE", "cas");
    
    define("AUTH_CAS_HOSTNAME", "cas.schoolu.ca");
    define("AUTH_CAS_PORT", 443);
    define("AUTH_CAS_URI", "cas");
    define("AUTH_CAS_COOKIE", "isCasOn");
    define("AUTH_CAS_SESSION", "phpCAS");
    define("AUTH_CAS_ID", "peopleid");

The architecture for CAS is similar to Shibboleth, except that the Service Provider component is handled by the phpCAS library that is included with Entrada.

For CAS, the AUTH_CAS_ID needs to be set to the attribute returned by the CAS server that represents the student/employee ID number, and will be matched to the `number` column of the Entrada Authorization database's `user_data` table.

When CAS is enabled, the Entrada login screen will get a link that allows the user to select CAS authentication, or to login with local or ldap credentials.

## Chained Authentication

    define("AUTH_METHOD", "local, ldap"); // Defined in `core/config/settings.inc.php`

Entrada supports chained authentication to allow you to offer users multiple methods of authenticating into the same account in your system.

If you would like to allow both local, and LDAP authentication you simply define the `AUTH_METHOD` constant in `core/config/settings.inc.php` to be "local, ldap" or "ldap, local" (depending on the chain order you prefer) instead of "local" or "ldap".
