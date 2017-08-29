# jQuery Light

Removes jQuery Migrate from the list of jQuery dependencies and allows jQuery to enqueue before `</body>` instead of in the `<head>`.

## Installation

Example of a `composer.json` for a site:

```json
{
  "name": "wearerequired/something",
  "description": "required.com",
  "license": "GPL-2.0+",
  "authors": [
    {
      "name": "required gmbh",
      "email": "info@required.ch"
    }
  ],
  "require": {
    "php": ">=5.6",
    "koodimonni/composer-dropin-installer": "dev-master",
    "johnpbloch/wordpress": "~4.8",
    "wearerequired/jquery-light": "dev-master"
  },
  "repositories": [
    {
      "type": "git",
      "url": "git@github.com:wearerequired/jquery-light.git"
    }
  ],
  "extra": {
    "wordpress-install-dir": "wordpress/wp",
    "installer-paths": {
      "wordpress/content/plugins/{$name}/": [
        "type:wordpress-plugin"
      ],
      "vendor/{$vendor}/{$name}/": [
        "type:wordpress-muplugin"
      ],
      "wordpress/content/themes/{$name}/": [
        "type:wordpress-theme"
      ]
    },
    "dropin-paths": {
      "wordpress/content/mu-plugins/": [
        "type:wordpress-muplugin"
      ]
    }
  },
  "minimum-stability": "dev",
  "prefer-stable": true
}
```
