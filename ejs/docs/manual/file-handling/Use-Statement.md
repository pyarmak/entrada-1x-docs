# Introduction
One of the unique and powerful features of ElentraJS is its approach to managing dependencies.  Combining the succinctness of synchronous syntax with the performance benefits of asynchronous, batched file loading allows each class to declare its dependencies using simple use statements.

```javascript
const MyClass = use('MyNamespace/MyClass');
```

Exporting is handled using CommonJS module syntax:

```javascript
module.exports = class MyClass
{
	...
};
```

Further, using registered [file handlers](unified-file-handling), the application can automatically handle each file type differently: a class will be handled one way whereas a Vue component will be handled another and JSON files yet another.

```javascript
// No file extension, assumed to be a class.
const MyClass = use('MyNamespace/MyClass');

// Load and parse a VueJS single-file component.
const MyComponent = use('MyNamespace/MyComponent.vue');

// Load and parse a JSON data file.
const myData = use('MyNamespace/myData.json');
```
