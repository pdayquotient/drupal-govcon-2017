Drupal GovCon 2017  
_Sponsored by [Quotient, Inc.](http://www.quotient-inc.com)_  
[Visit our Drupal GovCon 2017 page](http://www.quotient-inc.com/drupalgovcon)

# Environment Setup

All examples were developed against Drupal 8.3 using Acquia Dev Desktop Version 2, built on March 23, 2017.

Acquia Dev Desktop Downloads  
- [Mac](https://dev.acquia.com/sites/default/files/downloads/dev-desktop/AcquiaDevDesktop-2-2017-03-23.dmg)  
- [Windows](https://dev.acquia.com/sites/default/files/downloads/dev-desktop/AcquiaDevDesktop-2-2017-03-23.exe)  

**PLEASE NOTE:**  Many of the examples below are minimal representations of Drupal applications. You would also want to add in validation, stronger security measures, and error checking. These examples are not exhaustive solutions - they simply demonstrate the concept of Bodiless Drupal.

**Where to place the 'static_files' files**   
The code repository contains a folder of static files called, oddly enough, "static_files". These files should be moved to a location *outside* of your Drupal root.

# The Examples!

## Example 1: Bodiless Drupal with a simple text file

- **Module:** ex1_flatfile
- **URL:** http://[drupal_www]/ex1_flatfile

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
## Example 2: Bodiless Drupal with a JSON file

- **Module:** ex2_jsonfile
- **URL:** http://[drupal_www]/ex2_jsonfile

This example demonstrates a Drupal page which renders content stored in an external JSON file. All functional features of Drupal are available and may be used, with the exception of the database.

```
Before installing the module
----------------------------
You will need to make a minor modification to the code to ensure
Drupal knows where the external file lives. Edit the path value
on Line 6 of modules/custom/ex2_jsonfile/ex2_jsonfile.routing.yml
so that it contains the full path and filename to where you put
sample.json.
```

## Example 3: Bodiless Drupal with an external MySQL database

- **Module:** ex3_mysql
- **URL:** http://[drupal_www]/ex3_mysql

This example demonstrates a Drupal page which renders content stored in an external MySQL database. All functional features of Drupal are available and may be used, with the exception of the database.

```
Before installing the module
----------------------------
You will need to modify your settings.php configuration file to
register your external MySQL database. I have created a sample
MySQL database using the following credentials (There is no guarantee
this service will be available so there is also a mysql dump of the
sample data in the static_files folder.):

$databases['govcon']['default'] = array(
  'database' => 'sql9186964',
  'username' => 'sql9186964',
  'password' => 'qEEXa1Ue6K',
  'host' => 'sql9.freemysqlhosting.net',
  'port' => '3306',
  'driver' => 'mysql',
  'prefix' => '',
  'collaction' => 'utf8mb4_general_ci',
);
