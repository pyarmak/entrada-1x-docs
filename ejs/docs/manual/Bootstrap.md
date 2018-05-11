# Introduction
To boot an ElentraJS application, you must first include the pre-compiled bootstrap script.  The bootstrap script is responsible for providing file loading, parsing, and dependency management.

The bootstrap script is located at:

`/elentrajs.js`

# How It Works
The bootstrap script is simply a collection of classes from the ElentraJS library included in a bundle.  The ElentraJS [JIT compiler](jit-compiler) begins at the ElentraJS/Bootstrap/Bootstrap class and combines it with its dependencies (by following the `use()` calls).

# The Bootstrap Class

## Synopsis
```javascript
class Bootstrap {
    constructor(string srcPath);
    boot(string selector) : Promise<App>
}
```

## Methods

### `constructor(string srcPath)`
Initializes a Bootstrap object.  The srcPath argument specifies a directory path to be used when resolving dependencies.

### `boot(string selector) : Promise<App>`
Loads the initial App class, its dependencies, and its configuration (`environment.js`) and returns a Promise.  If the Promise resolves, it will return the application instance.

## Examples

### Example 1: Booting an ElentraJS application
```javascript
<script src="path/to/ElentraJS/elentrajs.js">
<script>
    let bootstrap = new Bootstrap('path/to/src');

    bootstrap.boot('#app-root').then(app => {
        ...
    });
</script>
```