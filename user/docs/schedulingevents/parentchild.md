#Parent Child Feature  

Elentra includes the ability to link multiple repeating events in a parent-child relationship.  This is most often used when small groups of learners will complete the same activities in repeating learning events.  For example, there may be 10 events scheduled for 10 small groups but each event is essentially identical in terms of content, curriculum tags applied, etc.  If you use the parent-child feature some reports will look only to the parent event to collect data and therefore help to report accurately from the perspective of a single learner.

Note that the parent child relationship is only available for events that are part of the same course.

If you eventually copy a schedule forward, recurring event status, as well as parent-child links if enabled, will be maintained.

#How to create parent child relationships between events  
There are several ways to create parent child relationships between events, you can either do so when creating recurring events through Admin>Manage Events, include the information on a spreadsheet you are importing to a draft schedule, or link existing events through the event setup page.

For more details about using the parent child relationship with recurring events please see the Recurring Events help section.  

For more details about using the parent child relationship when importing a schedule using a csv please see the Creating a Schedule help section.  

If you have already created multiple events and want to link them using the parent child feature you must know the event titles or id numbers of the events intended to be children.  A consideration in terms of workflow when linking events through the event setup page is that without the 'recurring' feature being used you can't easily bulk change anything in the linked child events.  Manually linking events like this is a feature from before the recurring event tool existed.  

* Navigate to Admin>Mange Events.  
* Find the intended parent event by applying filters or looking in a specific time frame.
* Click on the event title.  
(Alternatively, you could use curriculum search to find the event but then make sure you switch to Administrator View to edit the event.)  
* On the event Setup page scroll to Child Events just above the Time Release Options header.
* Type in the intended child event id or title, click on the desired event, and click 'Add'.  
* Added child events will be displayed in a list.  On the setup page for a child event it will list the parent event.
* Click 'Save' at the bottom of the page.

#Impacts of using the parent child relationship
Not every feature of Elentra reflects the connections made between events using the parent child relationship.

Curriculum Search **does** respect the parent child relationship and only return results for the parent. (In fact, curriculum search won't look at child events so even if a child event has distinct content from the parent, that won't be reflected in the search results.)

Curriculum Explorer **does not** respect the parent child relationship and returns all events regardless of relationship.

The Learning Event by Type Report **does** respect the parent child relationship.
