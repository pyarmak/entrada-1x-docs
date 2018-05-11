# Route Collections
A RouteCollection is an object that represents a group of Routes.  A route collection may include a path prefix to be prepended to the path of each route in the collection.  Further, a route collection may accept other route collections as children, effectively creating a routing tree.

The most common use of route collections is to group routes with a common path prefix.

**Class Synopsis**
```javascript
class RouteCollection
{
    constructor(string prefix, array routes = [], array collections = []);

    addRoute(Route route);
    addRoutes(Route[] routes);
    addCollection(RouteCollection collection);
    addCollections(RouteCollection[] collections);

    findRouteByPath(string path);
    findRouteByName(string name, bool deep = false);
    findCollectionByPrefix(string prefix);

    getRoutes() : Route[];
    getCollections() : RouteCollection[];
    getFlattenedRoutes() : Route[];
    getFlattenedCollections() : RouteCollection[];
    getPathPrefix() : string;
    getParentCollection() : RouteCollection|null;

    setPathPrefix(string prefix);
    setParentCollection(RouteCollection collection);
}
```

**Example: Grouping routes with a shared path prefix**
```javascript
let routes = new RouteCollection('/sandbox', [
    new Route('sandbox.index', '/index', 'Sandbox.Sandbox.index'),  // Matches #/sandbox/index
    new Route('sandbox.demo' '/demo', 'Sandbox.Sandbox.demo')       // Matches #/sandbox/demo
];
```

**Example: Chaining collections declaratively**
```javascript
let routes = new RouteCollection('/sandbox', [
    new Route('sandbox.index', '/index', 'Sandbox.Sandbox.index')  // Matches #/sandbox/index
], [
    new RouteCollection('/section', [
        new Route('sandbox.demo', '/demo', 'Sandbox.Sandbox.demo') // Matches #/sandbox/section/demo
    ])
]);
```

**Example: Chaining collections programmatically**
```javascript
let sandboxRoutes = new RouteCollection('/sandbox', [
    // Matches #/sandbox/index
    new Route('sandbox.index', '/index', 'Sandbox.Sandbox.index')
]);

let sectionRoutes = new RouteCollection('/section', [
    // Matches #/section/demo
    new Route('sandbox.demo', '/demo', 'Sandbox.Sandbox.demo')
]);

sandboxRoutes.addCollection(sectionRoutes);

// sandbox.index still matches #/sandbox/index
// sandbox.demo now matches #/sandbox/section/demo
```