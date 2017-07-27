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
register your external MySQL database. Execute the mysql dump of
the sample data in the static_files folder to create the table
and insert the sample data.

$databases['govcon']['default'] = array(
  'database' => 'your_db_name',
  'username' => 'your_db_user',
  'password' => 'your_db_pass',
  'host' => 'your_db_host',
  'port' => '3306',
  'driver' => 'mysql',
  'prefix' => '',
  'collaction' => 'utf8mb4_general_ci',
);
```

## Example 4: Create a RESTful API endpoint to retrieve external data

- **Module:** ex4_rest
- **URL:** http://127.0.0.1:8081/

This example demonstrates how you can use Drupal in a bodiless AND headless way. Drupal provides the RESTful API endpoint to retrieve data from an external MySQL database. The sample node.js application is the front end which consumes the Drupal RESTful API endpoint via a GET call.

### Prerequisites

- node.js

```
Before installing the module
----------------------------
1. Enable the RESTful Web Services module.

2. Enable the HTTP Basic Authentication module.

2. Download and enable the REST UI module:
https://www.drupal.org/project/restui

3. You will need to modify your settings.php configuration file
to register your external MySQL database. Execute the mysql dump
of the sample data in the static_files folder to create the table
and insert the sample data. You may skip this if you have alreay
completed it as part of Example 3.

$databases['govcon']['default'] = array(
  'database' => 'your_db_name',
  'username' => 'your_db_user',
  'password' => 'your_db_pass',
  'host' => 'your_db_host',
  'port' => '3306',
  'driver' => 'mysql',
  'prefix' => '',
  'collaction' => 'utf8mb4_general_ci',
);

4. Modify your hosts file (C:\Windows\System32\drivers\etc\hosts)
to map 127.0.0.1 to your Drupal instance, if running locally. For
example, my hosts file has a reference like below:

127.0.0.1	govcon2017.localhost
```

### Setup

*Drupal > Admin > Extend*

- Open the REST UI configuration page: /admin/config/services/rest
- Scroll down to "External data resource"
- Click the "Enable" button

*Drupal > Admin > Configuration > REST*

- Settings:
  - Granularity: Resource
  - Methods: GET (tick the checkbox)
  - Accepted request formats: json (tick the checkbox)
  - Authentication providers: basic_auth (tick the checkbox)
  - Submit configuration

*Drupal > Admin > People > Permissions*

- Scroll down to "Access GET on External data resource resource", under RESTful Web Services
- Tick the checkbox under "Anonymous User"
- Save permissions

*Other general setup steps*

- Modify lines 16 & 17 of [drupal_custom_modules]/node_js/app.js to reflect your Drupal environment
- Copy the app.js file to another location on your computer
- Open a command prompt/terminal and change the directory to the directory where you placed app.js
- Execute the script: node app.js
- Point your web browser at http://127.0.0.1:8081/
- If you set up everything correctly, you should see the following output:

GET result:

{"id":"1","fname":"Paul","lname":"Day","email":"pday@quotient-inc.com"}

Call completed

## Example 5: Auto-generate Drupal form based on a JSON schema

- **Module:** ex5_mysql
- **URL:** http://[drupal_www]/admin/content/json_articles

This example demonstrates using a JSON schema to auto-generate a Drupal form for data entry.

```
Before installing the module
----------------------------
This module does security horribly wrong - don't do this in production!
The text file containing JSON data (ex5-json-forms-article.json) is
located in the module root.

The purpose of this example is to illustrate the ease of modifying
external data while adhering to a schema.
```
