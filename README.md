* Given that the job description is available at https://www.cvkeskus.ee/php-arendaja-tartus-traffic-control-ou-894619, then I don't have to be worry about the privacy and secrecy of this puzzle contents.
* Next I crafted a simple starting prompt for the LLM
```php
write a php script, that solves this puzzle Send a POST request to https://cv.microservices.credy.com/v1 in JSONx format (don't worry, we don't use this format in our daily lives) with the required fields that are listed below:
* first_name | string 255 - your first name
* last_name | string 255 - your last name
* email | string 255, must be a valid email address - your email address we can contact you by
* bio | free text - introduction about yourself and why you would be a great fit for the position
* technologies | array - the technologies you master ex. PHP, HTML, docker
* timestamp | integer - current unix timestamp, deviation of +/-10 seconds is allowed
* signature | string 255 - SHA1 hash of concatenation of current unix timestamp and the word "credy"
* vcs_uri | string 255 - public git repository url where the solution to the puzzle is hosted
```

* Next I generated a starting boilerplate with public LLM Phind.com and then copy-pasted the offered solution
* Next I asked about the ambiguities in the puzzle, to make sure, I didn't miss anything
* So, there seems to be a rather large ambiguity in the "JSONx" format. Since the reference is not made to any particular source document, then it might mean JSONx (JSON in XML, https://www.jsonx.org/#/), but it could also mean JSONX (JSON with Extensions, https://json-next.github.io/) both good options, lets poke at the API endpoint, to know which one we have. Since one version is pretty much XML and the other is a superset of JSON, lets try to get some validation errors.
* Found this page, https://github.com/danharper/JSONx-for-Laravel/blob/master/README.md and tried the sample payload from there
```xml
<?xml version="1.0" encoding="UTF-8"?>
<json:object xmlns:json="http://www.ibm.com/xmlns/prod/2009/jsonx" xsi:schemaLocation="http://www.datapower.com/schemas/json jsonx.xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
  <json:array name="fruits">
    <json:string>apple</json:string>
    <json:string>banana</json:string>
    <json:string>pear</json:string>
  </json:array>
  <json:boolean name="something">true</json:boolean>
</json:object>
```
yields

```json
[
    {
        "field": "first_name",
        "message": "First Name cannot be blank."
    },
    {
        "field": "last_name",
        "message": "Last Name cannot be blank."
    },
    {
        "field": "email",
        "message": "Email cannot be blank."
    },
    {
        "field": "bio",
        "message": "Bio cannot be blank."
    },
    {
        "field": "technologies",
        "message": "Technologies cannot be blank."
    },
    {
        "field": "timestamp",
        "message": "Timestamp cannot be blank."
    },
    {
        "field": "signature",
        "message": "Signature cannot be blank."
    },
    {
        "field": "vcs_uri",
        "message": "Vcs Uri cannot be blank."
    }
]
```

* Which means, that JSONx responds to the XML version of the JSON
* And this confirms, that the endpoint accepts our variables.
```xml
<?xml version="1.0" encoding="UTF-8"?>
<json:object xmlns:json="http://www.ibm.com/xmlns/prod/2009/jsonx" xsi:schemaLocation="http://www.datapower.com/schemas/json jsonx.xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
  <json:string name="first_name">Villu</json:string>
</json:object>
```
