<img src="src/icon.svg" alt="icon" width="100" height="100">

# Ds Instagram Feed plugin for Craft CMS 3

If you want to add your (or someone else) Instagram feed on your site, you can use this plugin to fetch and cache the feed. It returns the image source.

This only works with public profiles.

## Installation

#### Requirements

This plugin requires Craft CMS 3.0.0, or later.

#### Plugin Store

Log into your control panel and click on 'Plugin Store'. Search for 'Ds Instagram Feed'.

#### Composer

1. Open your terminal and go to your Craft project:

```bash
cd /path/to/project
```

2. Then tell Composer to load the plugin:

```bash
composer require ds/craft-instagramfeed
```

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Ds Instagram Feed.

#### Examples

```twig
 {{ craft.instagramfeed.getFeed() }}
```
