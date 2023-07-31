# YEAH SO THIS IS PRETTY MUCH DEAD, DO YOURSELF A FAVOR AND SWITCH TO [FusionCMS](https://github.com/FusionWowCMS/FusionCMS)

--------

--------

## Welcome to Fusion CMS

FusionCMS is officially discontinued, so we decided to open source our work here.

## Requirements
PHP Version >= 5.6

Php Extensions : php_mysqli, php_curl, php_openssl, php_soap, php_gd, php_mbstring, php_json, php_mcrypt

Apache Modules : mod_rewrite, mod_headers, mod_expires, mod_deflate

## Install
An installation walkthrough is available [here](http://www.youtube.com/watch?v=C0PhEKbtVGE).

## Reporting issues
Issues can be reported via the [Github issue tracker](https://github.com/Yekta-Core/FusionCMS/issues).

Please take the time to review existing issues before submitting your own to prevent duplicates.

## Tutorials

### Facebook news API

If you intend to sync your facebook posts with the news system, 
For more details see [Facebook for Developers](https://developers.facebook.com/docs/reference/api/).

Get the app ID and the app secret.

To Get the access code of facebook for your page do this:
1) Go to http://www.facebook.com/developers/
2) Allow access.
3) Go to the application it says.
4) Click on create new app.
5) Fill in App Name, App Namespace and if you need the hosting or not (you dont need that actually :P)
6) After that you go to a page with the App Id and the App Secret.

Get the Feed (NEWS)
https://graph.facebook.com/PAGE_ID/feed?access_token=ACCESS_TOKEN

Get the access token
https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id=CLIENT_ID&client_secret=CLIENT_SECRET

### How to find icon names

If you intend to use custom queries in the store, you might want to find a nice icon.

First find an item that has the icon you want to use, then add &xml
to the end of the URL. For instance: http://www.wowhead.com/item=40343&xml
Then look for the line that says:

```markdown
<icon displayId="54560">INV_Sword_104</icon>
```

"inv_sword_104" is the icon name, it has to be in lowercase!

### Notice
In case you use custom staff ranks, you will need to manually enter those after the installation, either via the database or through the admin panel.



Thanks again for supporting our work, we wish you a pleasant website experience while using our system!

Best regards,

The FusionCMS Team
