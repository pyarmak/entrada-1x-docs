# Introduction
Check out the [EJS Introduction](introduction).

# Locating EJS in ME
The ElentraJS environment is located in the `www-root/javascript/Elentrajs` directory.  This directory contains the ElentraJS library, the Layout namespace, and the Module namespace.

# Configuring EJS in ME
The ElentraJS [environment configuration](environment-configuration) file is located at `www-root/javascript/Elentrajs/environment.js`.  All new modules must be added to this file to make them available in the system.

# Booting EJS in ME
[Booting](bootstrap) is handled automatically on any page within Elentra that includes an [entry point](Entry-Points). 

# EJS Modules in ME
A [module](modules) in EJS is a self-contained package of functionality, containing all relevant code and assets.  Modules can be found in the `www-root/javascript/Elentrajs/Module` directory.

# EJS Layouts in ME
A layout is a component that wraps module content in EJS.  Layouts can be found in the `www-root/javascript/Elentrajs/Layout` directory. 

# EJS Entry Points in ME
EJS uses [entry points](entry-points) to determine the execution path through the application.  An entry point determines which module is initially loaded, an initial [route](routing), and an optional layout.

# Using the Component Library
The EJS Component Library provides a great deal of built-in functionality that you can use when building your EJS modules.  These components are found in the `ElentraJS/Components` namespace and can be included with a `use()` statement.

_**Note: The EJS Component Library is not compatible with the Bootstrap CSS library.**_