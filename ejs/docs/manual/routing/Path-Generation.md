# Path Generation
The PathGenerator class allows for the programmatic generation of route paths based on a route's name and its position in the routing tree.  It expects a `RouteCollection` as its constructor argument, representing a routing tree to match against.  The `generate()` method accepts a string indicating the name of a route, returning the generated path.  If the route cannot be found, an `Error` will be thrown.

The PathGenerator can be accessed directly via the `Router` using the `Router#generate()` and `Router#getGenerator()` methods.

**Class Synopsis**
```javascript
class PathGenerator
{
    constructor(RouteCollection routes);
    generate(string routeName, args = {}) : string;
}
```