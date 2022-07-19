# VesselsValue Technical Test
###**DISCLAIMER** This is by no means an active codebase of VesselsValue and is created purely as a sample to assess your problem-solving skills

This repository contains code samples of a basic user management system. There are some issues and new features we have outlined below.

The code found here has flaws that are both within the scope of this task and outside of it. You may change any or all parts of this repository if you consider it relevant to this task.

You may only changes to the database via PHP code to enact those changes.

This test is NOT about visuals and will be reviewed based on the PHP code and the objectives outlined below.

We expect and require that all code is written to PSR-12 standard. Not all code provided will be satisfactory already.


## Database
There is a MySQL dump file within the repo required for this task; you can upload this to a database. Please make sure you send us an updated version when sending it back.

## Objectives
1. We currently have to change the company name for all users of that company one at a time. Make it so that we only need to change the company name for the user once
2. It is currently possible to delete a user by mistake. Make it so that a user is not irrevocably deleted
3. We need to be able to update a user's phone number
4. We need a field that tells us how long the user has existed in our system
5. There are multiple references to the same item. Update labelling to ensure the labels are consistent across all usages
6. On the user create form make two changes : Add a dropdown selector to choose from existign companies with an entry for "Other".  If the "Other" company entry is selected, the user will be created with a company name from the free text field
7. Ensure that user creation is validated such that all fields MUST be populated in order to insert a new record
8. We need to be able to update a user's first and last names
9. Ensure that the field which records when a user was first added to the system is displayed as a date in DD-MM-YYY format (e.g. 23-05-2020)
10. Write unit test or tests that all of the new or amended functionality added in this task passes