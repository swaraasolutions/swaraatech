# Digital Ocean Spaces Manager

Spaces manager for moving the files from any specified location and move to spaces.

## Installation

### Using Composer

```sh
composer require swaraatech/spacesmanager
```

Or manually by modifying `composer.json` file:

``` json
{
    "require": {
        "swaraatech/spacesmanager": "dev-master"
    }
}
```

And run `composer install`

Then add Service provider to `config/app.php`

``` php
    'providers' => [
        // ...
        SwaraaTech\SpacesServiceProvider::class
    ]
```

**Notice**: This package will add `league/flysystem-aws-s3-v3` package and add spaces support dynamically.


## Quick start
Modify the following settings in .env

```json 
SM_ENABLED=true
SM_CHECK_PATH=E:\wamp64\www\digiapicentos\public\images\
SM_HTTP_PATH="images"
SM_CHECK_FREQUENCY=daily
SM_CHECK_TIME=22:00
SM_TABLE_NAME="movedspaces"
SM_CHECK_SIZE=0
SM_CHECK_DAYS=0
SM_SPACES_KEY="DIGITAL OCEAN KEY"
SM_SPACES_SECRET="DIGITAL_OCEAN secret"
SM_SPACES_ENDPOINT="https://nyc3.digitaloceanspaces.com/"
SM_SPACES_REGION="nyc3"
SM_SPACES_BUCKET=bucketname
SM_MANAGE_404=true
```
**Explanation**

`SM_ENABLED` - Enable or disable the functionality

`SM_CHECK_PATH` - Set the path of the folder which you would like to move to spaces

`SM_HTTP_PATH` - If you are serving this images over http enter the http path with out domain name and forward and trailing slashes

`SM_CHECK_FREQUENCY` - Option available are daily, weekly, monthly,yearly

`SM_CHECK_TIME` - This option is taken into consideration only when you are using the daily frequency

`SM_TABLE_NAME` - Name of the table for managing the 404 errors after moving the images

`SM_CHECK_SIZE` - Specify the files above the size to be moved to spaces

`SM_CHECK_DAYS` - Specify the days before the current day to be moved e.g. 7 days

`SM_SPACES_KEY` - Spaces Key from Digital Ocean

`SM_SPACES_SECRET` - Spaces Secret from Digital Ocean. This is visible only once

`SM_SPACES_ENDPOINT` - Not required to change unless you are using any other region

`SM_SPACES_REGION` - Not required to change unless you are using nyc3

`SM_SPACES_BUCKET` - Name of the bucket where the images needs to be stored

`SM_MANAGE_404` - If you are not willing to manage the 404 errors using the plugin turn this option to false


### Developed with love by Swaraa Tech Solutions LLP Team at Digital Ocean Ahmedabad Hackathon.

Thanks to the wonderful support from DO Team.

