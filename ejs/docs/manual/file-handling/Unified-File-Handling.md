# Introduction
The crown jewel of ElentraJS is its unique approach to file handling.  Enabling the simple syntax of synchronous imports while leveraging the performance benefits of asynchronous batch loading, developers truly can 'have their cake and eat it, too.'

# File Loader
The file loader is the very first part of an ElentraJS application that is [booted](bootstrap).  It is responsible for loading all subsequent classes, [components](components), and data files.

File handlers are registered with the file loader during the boot process before handing the loader to the application.  This ensures consistent behavior for each file type, regardless of when, where, or how it is loaded.

# File Handlers
A file handler is a class that is responsible for processing a given file type after it is loaded but before it is returned to the application.

Each file handler is registered with the file loader and associated with a file extension.  The file extension is how the loader knows which handler to run.

ElentraJS includes several file handlers by default, but developers are free to create their own or override these:  

- **Class Handler**
    - Extension: None  
    - Description: Any file loaded without an extension is considered a JavaScript class file:  its dependencies will be matched recursively and the class constructor returned.  Additionally, all classes have the `__dirname` and `__filename` properties added to their prototype.  

- **JSON Handler**
    - Extension: .json  
    - Description: Any file loaded with a JSON extension will be parsed into an object.  

- **Vue Handler**
    - Extension: .vue  
    - Description: Any file loaded with a .vue extension is considered a single-file VueJS component definition.  These files will be split into template, script, and style sections.  The script section is parsed as a class to recursively match dependencies, before being combined with the template into a VueJS component constructor.  The style portion is appended to the `<head>` directly.  

File handlers can be any object with a `handle` method which accepts the filename and file contents and returns a Promise.  If the Promise resolves, it must return the processed file.
```javascript
class MyHandler
{
    handle(string filename, string file) : Promise
}
```

**Tip:** If a file handler does not include any asynchronous processing, you still must return a Promise, but you can resolve it immediately.  For example, the JSON handler works like this:

```javascript
class JsonHandler
{
    handle(filename, file) {
        return Promise.resolve(JSON.parse(file));
    }
}
```

# Path Resolution
By default, the file loader will load files using the exact path provided when calling `load()`.  However, you may pass a script path to the constructor and all filenames will then resolve relative to this path.

In cases where you would like to compute a filename relative to another, the file loader provides a `resolveFilename(filename, contextFilename)` method.  This method will replace a leading `./` in `filename` with the pathname of `contextFilename`.

```javascript
let resolvedFilename = loader.resolveFilename('./MyFile.js', 'Path/To/File.js');
// Path/To/MyFile.js
```

It's important to note that the `load()` method will not resolve relative filenames on its own; it will only prepend the base path.  However, [use statements](use-statement) are automatically resolved relative to the file in which they are called.

```javascript
// /src/Path/To/MyFile.js

let loader = new Loader('/src');

loader.load('./MyOtherFile.js'); // error, resolves to /src./MyOtherFile.js
loader.load('/Path/To/MyOtherFile.js'); // success, resolves to /src/Path/To/MyOtherFile.js

use('./MyOtherFile.js'); // success, resolves to /src/Path/To/MyOtherFile.js
use('/Path/To/MyOtherFile.js'); // success, resolves to /src/Path/To/MyOtherFile.js
```

# Dependency Resolution
WIP

# Known Issues
FIXED: ~~An edge case exists where a loaded file references two or more dependencies that each share a common dependency that has not previously been loaded.  In this case, the common dependency will be incorrectly loaded more than once, but will otherwise function as expected.~~