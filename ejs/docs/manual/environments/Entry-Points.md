# Entry Points
ElentraJS uses the concept of **entry points** to facilitate selective execution paths throughout the application.  This allows a user to jump into the application from an Entry Point specific to the task at hand, only loading the necessary [modules](modules) and files to complete it.

# How It Works
Entry points are specified simply by adding some attributes to the root DOM node.  A **route name** may be specified to determine the initial execution path via the `data-route` attribute, with its parameters passed in using the `data-route-params` attribute.  Additionally, an optional `data-layout` attribute may be used to specify a component to wrap the application.

# Examples
### Example 1: Booting the application without a default execution path
```html
<div id="#app-root"></div>
```

### Example 2: Specifying the name of an initial route to execute with route parameters
```html
<div id="#app-root" data-route="my.route" data-route-params="{ param1: 1, param2: 'foo' }"></div>
```

### Example 3: Specifying a layout component to wrap the application
```html
<div id="#app-root" data-layout="MyLayoutComponent"></div>
```