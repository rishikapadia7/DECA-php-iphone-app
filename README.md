## What is it?
This is a PHP web-application optimized for the iPhone 4 that was implemented between December 2010 and January 2011 as the culminating task of Grade 12 Computer Science. The application is officially called "Trillium" (not DECA due to trademark issues) and had a project codename "NerdiByte" when being developed.

The intended user of this application is a DECA chapter advisor (teacher at a school responsible for DECA activity).  The advisor can run most if not all CRUD database operations on their own account, students, a student's partner, events at regional, provincial, and international level, and the chapter (school).  Additionally the App has a feedback page.

## References
Requirements document: [here](https://docs.google.com/document/d/14Am1FSDadKWy1lU1iAGWnMhpTEuFMEgEFjCoV8fsOlY/pub)

The apportioning of requirements (part of the specifications document which was not fully completed due to time constraints): [here](https://docs.google.com/document/d/1z8Rx6yxDTkrkyYF9KVW_PdQEfJrUH4jiAX-An1_xaEM/pub#h.4tn65s2l90lh)

Design Document [here](https://docs.google.com/document/d/1cgrIz1u48p77-U7svLeWFt50tAW_3PCe2Y10H_BLuMo/edit)

Enhanced Entity Relationship (EER) Diagram: [here](https://docs.google.com/file/d/0B06ByqkuXCJPc09YSFBucml0TjQ/edit?usp=sharing)

## Release Notes
Trillium (codename: Project Nerdibyte), Release Notes version 1.01
DATE: 2010-01-31
Development Team: Rishi Kapadia and Sukrit Rajpal.

Known errors, bugs, and glitches:
- addRegionalScore.php and addProvincialScore.php have a glitch where 
they do not function corectly even though the code is nearly identical
to the addICDCScore.php

- the password could not be changed for the advisor due to a mysql error.
The cause of this error was not identified by the developers.  The code
for changePassword.php is still present in the source code repository;
however, the page is not linked to any other functional page in the system.

- certain "drilldowns" in the system appear oversized due to conflicting
stylesheets (specifically on studentGeneral.php)

- on login.php the placeholder for username disappears

- the titles of some page are overlapped by navigation elements

- an error might occur when editting a student, however the editting of a student 
does work.  An error may have occurred during system integration.  Proof of concept
is that editting chapter information and advisor information works.

- a feature of deletion of a student would have been extremely difficult to implement
as many tables would need to be effected and may have posed threat to system stability.

Post Notes:
- The development team put forth their best efforts towards developing a fully functional
system.  This is the first draft.  The development team dedicated a lot of time 
towards the release of this first draft, specifically the final four days prior
to system release.  The development team apologises for any features that are not
present in the release of the system due to time constraints.

###### System testing client: Apple iPod touch, 4th generation running iOS 4.1
###### System testing server: Adhoc connection over Windows 7 laptop with MySQL 5.1.41 and PHP 5.3 using localhost server with Apache.


###### This system is no longer under development and the project has been terminated.



## The MIT License (MIT)
Copyright © 2013 Rishi Kapadia and Sukrit Rajpal

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Software”), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.