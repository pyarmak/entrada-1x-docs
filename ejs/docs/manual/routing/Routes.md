# Introduction
A Route is an object that maps a path to a controller.  The router will attempt to match the path in the address bar to a previously defined route.  If the router finds a match, it passes the logical controller to the Kernel where the appropriate class is resolved and loaded, and the controller method executed.  If the controller returns a component, the application will insert it into the layout.

Routes are also assigned a name.  A route's name may be used to generate a path instead of hard-coding; this allows us to change an existing URL without breaking any links in the application.

**Class Synopsis**
```javascript
class Route
{
    constructor(name, pattern, defaults = {}, requirements = {}, metadata = {});

    getName() : string;
    getPattern() : string;
    getDefaults() : Object;
    getRequirements() : Object;
    getMeta() : Object;

    getCollection() : RouteCollection|null;
    setCollection(RouteCollection);
}
```

**Example: Define a named route for URL #/sandbox/index**
```javascript
// With standard notation of logical controller
new Route('sandbox.index', '/sandbox/index', {
    _controller: 'Sandbox.SandboxController.indexAction'
});

// With short-hand notation of logical controller
new Route('sandbox.index', '/sandbox/index', {
    _controller: 'Sandbox.Sandbox.index'
});

// Simple route definition
new Route('sandbox.index', '/sandbox/index', 'Sandbox.Sandbox.index');
```

# Advanced Routing

**Example**  
```javascript
new Route(
    'sandbox.foo',
    '/foo/{someId}/{fooParam}/{barParam}', {
        _controller: 'Sandbox.Sandbox.foo',
        someId: 1,
        fooParam: 'FOODEFAULT',
        barParam: 'bardefault'
    }, {
        someId: /\d+/,        // must be an integer
        fooParam: /[A-Z]+/,   // must be an uppercase string
        barParam: /[a-z]+/    // must be a lowercase string
    }, {
        metaFoo: 'metaBar'
    }
);
```
## Parameters
WIP

## Defaults
Each route accepts a `defaults` object as an argument to allow default parameter values to be specified.  When generating a path, any missing parameters will fallback to these defaults.

The `defaults` object may also include the special `_controller` property that contains the logical controller string that is used to link the route to a specific part of the system.

## Requirements
Each route must also include a `requirements` object with a regular expression for each of the route's parameters. 
 Only parameter values that match these requirements will match the route.

> **Important**: Default values must also match these requirements.

## Metadata
WIP