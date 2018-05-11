ElentraJS environments are configured using a standard `environment.js` configuration file.  This file must reside in the root directory of a given EJS environment.

## Directives
Each `environment.js` file must include the following directives:  
- **name**: The name of the application in a format appropriate to display to users.  
- **version**: The version of the application.  
- **apiPath**: A path to prefix to API requests.  
- **layoutNamespace**: A namespace for layout components, relative to the environment root.  
- **moduleNamespace**: A namespace for modules, relative to the environment root.  
- **registeredModules**: An array of modules to be enabled.  The module name must match its directory name in the moduleNamespace.  **NOT YET IMPLEMENTED:** The pathPrefix is prepended to all route paths defined by this module.  

## Example
```javascript
// environment.js
module.exports = {
    name: 'My Application',
    version: '1.0',
    apiPath: '/path/to/api',
    layoutNamespace: 'Layout',
    moduleNamespace: 'Module',
    registeredModules: [
        {
            name: 'MyModule',
            pathPrefix: '/mymodule'
        },
        {
            name: 'Sandbox',
            pathPrefix: '/sandbox'
        }
    ]
};
```