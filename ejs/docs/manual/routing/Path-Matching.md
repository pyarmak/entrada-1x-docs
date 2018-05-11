# Path Matching
Path matching is accomplished in EJS using the PathMatcher class.  The PathMatcher class accepts a `RouteCollection` as the sole argument to its constructor, representing a routing tree to match against.  The `match()` method accepts a string as the path to match, returning the matched `Route` object or null if a match isn't found.

The PathMatcher can be accessed directly via the `Router` using the `Router#match()` and `Router#getMatcher()` methods.

**Class Synopsis**
```javascript
class PathMatcher
{
    constructor(RouteCollection routes);
    match(string path) : Route|null;
}
```