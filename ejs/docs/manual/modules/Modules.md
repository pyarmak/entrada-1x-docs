# The Module Manifest
Each module in ElentraJS must include a configuration file in its root directory.  This configuration file is called the *module manifest* and provides metadata about the module.

Each manifest must include:
- **name**: The name of the module as it should be displayed to users.
- **version**: The version number of the module.
- **routes**: A collection of routes this module implements.  Expects a RouteCollection object.

**Sample**
```javascript
const Route = use('ElentraJS/Routing/Route');
const RouteCollection = use('ElentraJS/Routing/RouteCollection');

module.exports = {
    name: 'Sandbox',
    version: '1.0',
    routes: new RouteCollection('/sandbox', [
        new Route('sandbox.index', '/', 'Sandbox.Sandbox.index')
    ])
};
```

# Module Structure
ElentraJS ships with this default directory structure for modules.

- Module Root
  - manifest.js
  - Asset/
    - css/
    - images/
    - languages/
  - Component/
  - Controller/
  - Model/
  - Tests/
    - Behavior/
    - Unit/