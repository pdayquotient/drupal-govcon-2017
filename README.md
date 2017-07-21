Drupal GovCon 2017  
_Sponsored by [Quotient, Inc.](http://www.quotient-inc.com)_  
[Visit our Drupal GovCon 2017 page](http://www.quotient-inc.com/drupalgovcon)

# Environment Setup

All examples were developed against Drupal 8.3 using Acquia Dev Desktop Version 2, built on March 23, 2017.

Acquia Dev Desktop Downloads  
- [Mac](https://dev.acquia.com/sites/default/files/downloads/dev-desktop/AcquiaDevDesktop-2-2017-03-23.dmg)  
- [Windows](https://dev.acquia.com/sites/default/files/downloads/dev-desktop/AcquiaDevDesktop-2-2017-03-23.exe)  

**PLEASE NOTE:**  Many of the examples below are minimal representations of Drupal applications. You would also want to add in validation, stronger security measures, and error checking. These examples are not exhaustive solutions - they simply demonstrate the concept of Bodiless Drupal.

# The Examples!

## Example 1: Bodiless Drupal with a simple text file

- Module: ex1_flatfile
- URL: http://<drupal_www>/ex1_flatfile

This example demonstrates a Drupal page which renders content stored in an external text file. All functional features of Drupal are available and may be used, with the exception of the database.

```
Before installing the module
----------------------------
You will need to make a minor modification to the code to ensure
Drupal knows where the external file lives. Edit the path value
on Line 6 of modules/custom/ex1_flatfile/ex1_flatfile.routing.yml
so that it contains the full path and filename to where you put
sample.txt.
```
