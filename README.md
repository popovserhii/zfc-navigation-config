ZF2 Config for Navigation Module
------------

Possibility add settings for navigation components through config file.

**Still Alpha!! Licence to be defined!!**

## Features

- Configuration any option of navigation module
- Config can be several type: `camelCaseConfig` or `under_score_config`

## TODO


## Installation

### Main Setup

#### By cloning project

    git clone git://github.com/popovsergiy/zfc-navigation-config.git
    cd zfc-navigation-config

#### With composer

1. Add this project in your composer.json:

    ```json
    "require": {
        "ageme/zf-navigation": "dev-master"
    }
    ```

## Use

See `./Ageme/Navigation/config/module.config.php`

Sample use for menu:

Add to `./config/autoload/global.conf` or create own config file next config

    <?php
    return [
        'navigation_helpers' => [
            'factories' => [
                'menu' => 'Ageme\Navigation\View\Helper\Factory\NavigationHelperFactory'
                // other navigation component: breadcrumbs, links, sitemap
            ]
        ],
        'navigation_helper_config' => [
            'menu' => [
                'ulClass' => 'sidebar-menu',
                'addClassToListItem' => true,
                'liActiveClass' => 'active',
                'escapeLabels' => false,
            ],
            // other navigation component config for breadcrumbs, links, sitemap
        ],
        // ...
    ];
