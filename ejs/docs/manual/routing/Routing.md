# Introduction
ElentraJS supports both server-side and client-side routing.  Each routing method may be used independently or in tandem with another to enable a hybrid solution.

# Server-side Routing
While ElentraJS does not include a facility for server-side routing, it can be easily integrated using [entry points](entry-points).

# Client-side Routing
ElentraJS provides a flexible but straightforward client-side routing library.  Using the routing library allows you to design a more responsive user interface, provide location awareness to the user via the address bar, ensure expected behavior of the browser's forward/back buttons, enable programmatic navigation, and allow application state to be pre-populated from a URL.

The client-side router will only consider the hash portion of a URL (follows the `#`).
