#Which version of Elentra am I using?  
The user interface does not currently display which version of Elentra you are using (e.g., ME 1.6 or ME 1.12).  To find this information you can look at the source code for the web page.  

In Chrome and Firefox
From an Elentra web page, right click and select "View Page Source." On the resulting page of code look for the release=number (around line 13 or so).

It might look like this: link href="/templates/default/css/bootstrap.css?release=1.12.0" rel="stylesheet" media="all" / which tells you you are using Elentra version 1.12.0.
