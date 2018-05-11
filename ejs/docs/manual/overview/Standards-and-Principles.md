# Definitions

The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD", "SHOULD NOT", "RECOMMENDED",  "MAY", and "OPTIONAL" in this document are to be interpreted as described in [RFC 2119](https://tools.ietf.org/html/rfc2119) and updated by [RFC 8174](https://tools.ietf.org/html/rfc8174).

# Code Standards

- All code MUST be written in American English (i.e. variable/method/class names, etc).
- ES6 / ECMA2015 MUST be used in [strict mode](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Strict_mode).
- Classes MUST be defined with ES6 class syntax.
- Each class MUST be declared in its own file.
- Code MUST NOT be placed outside of a class or VueJS component definition.
- Code MUST NOT be placed in the global namespace.
- A semicolon (;) is REQUIRED at the end of all expressions (including VueJS component definitions).
- Abbreviations in class/method/function names MUST NOT be all uppercase.
  - Good: MyJsonMethod
  - Bad: ~~MyJSONMethod~~
- All variables MUST be declared on their own line.
- Custom tag names defined by a VueJS component MUST adhere to the [W3C rules](https://www.w3.org/TR/custom-elements/) (all-lowercase, must include a hyphen).
- Code block length MUST be limited for readability, reusability, and focused reasoning:
  - Classes SHOULD NOT exceed 300 lines and MUST NOT exceed 500 lines.
  - Functions/methods SHOULD NOT exceed 50 lines and MUST NOT exceed 150 lines.

## On Dependencies
- External dependencies SHOULD only be used when absolutely necessary.  Instead, prefer a stable and unified codebase.
- All external dependencies MUST be wrapped in an interface class to limit coupling to a single location in the code base.
- An external dependency MUST NOT be used directly in application code.
  - For example, use the ElentraJS/Http/RestClient instead of Fetch API or Axios directly.  This allows us to swap out either library with zero refactoring of the code base.
- Web APIs that are not yet fully standardized MUST be wrapped in an interface class to enable easy updates if the spec changes.

# Design Principles

- Favor [composition over inheritance](https://en.wikipedia.org/wiki/Composition_over_inheritance)
- Use [SOLID design](https://en.wikipedia.org/wiki/SOLID_(object-oriented_design))
- Aim for [DRY code](https://en.wikipedia.org/wiki/Don%27t_repeat_yourself), but not at the expense of SOLID design.
- Design for accessibility from the start
- Security by default
- First-class localization support
- Reference [Eloquent JavaScript](http://eloquentjavascript.net)