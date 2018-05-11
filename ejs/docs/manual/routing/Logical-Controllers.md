# Logical Controllers
A **logical controller** is a simple string pattern which maps to a specific class method.  A logical controller is composed of a module name, a class name, and a method name.  

Classes to be used as controllers must include 'Controller' at the end of the class name (e.g. 'MyClass' => 'MyClassController') and methods must include 'Action' at the end of the method name (e.g. 'myMethod' => 'myMethodAction').  However, you may omit the 'Controller' and 'Action' portions in the logical controller definition, as they are required and therefore assumed.

The use of logical controllers prevents coupling the routing library to other libraries or applications.

**Example: Logical controller notation**
```javascript
// Standard notation
'Sandbox.SandboxController.indexAction'

// Short-hand notation
'Sandbox.Sandbox.index'

// Both map to: Sandbox/Controller/SandboxController#indexAction()
```