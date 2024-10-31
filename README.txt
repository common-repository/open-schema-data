=== Open Schema Data ===
Contributors: jasoncrev
Tags: schema, schema markup, schema data
Tested up to: 4.6.1
Stable tag: 1.0.4
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 4.5

Add any valid schema type to your pages and posts using JSON-LD markup.

== Description ==

Thanks for installing this simple plugin!

* Use different JSON-LD markup on every page and post, if needed!
* Use any valid JSON-LD type or class available! With this plugin, you aren't limited to whatever form fields a developer decides to include.

Use any schema type you want! This plugin allows you to easily add highly customized JSON-LD schema markup to your pages and posts. For the most part, this is not a fill-in-the-blanks plugin. You must first create nearly all of the markup on your own. Check out the [Schema Docs](http://schema.org/docs/full.html) to help build your markup.

There are convenient 'Author' and 'Website' fill-in-the-blank form fields available for every post. I may add more in the future.

To ensure changes to your page or post markup, be sure to click the normal WordPress ‘Update’ button for the respective page or post.

**IMPORTANT** 
The plugin automatically adds the appropriate script tags to the header page, so don't add them as part of your structured JSON-LD markup inside of the meta boxes.


So, when adding a single item to a meta box, it might look similar to this:

{
 "@context": "http://schema.org",
 "@type": "Organization",
 "url": "http://yourorganization.com",
 "name": "Your Organization Name"
}


When adding more than one item to a meta box, use brackets around all items and separate with commas; something similar to this:

[
 {"@context": "http://schema.org",
  "@type": "Organization",
  "name": "Your Organization Name",
  "url": "http://your-organization.com"
 },
 {"@context": "http://schema.org",
  "@type": "Person",
  "name": "Your Name",
  "url": "http://your-personal-site.com"
 }
]

== Installation ==

How to install this plugin

1. Manually upload the plugin directory to the wpcontent/plugins/ directory on your webserver or use the Plugins->Add New->Upload Plugin tool (if you have the plugin in .zip format). Additionally, you can use the Plugins->Add New->Search feature of the WordPress plugin page and search for 'Open Schema Data' and press the 'Install Now' button.

2. After installation, click on the 'Activate' button; or go to the Plugins page, find the plugin and click on the 'Activate' link.

New textfield boxes should now be visible on each page and/or post that you have and create.

== Change Log ==

= 1.0.4 =
*Clarified description and fixed minor readme issues

= 1.0.3 =
*Clarified description
*Added screenshots

= 1.0.2 =
*Slight changes to readme.txt

= 1.0.1 =
*Slight changes to readme.txt

= 1.0.0 =
*First version of the plugin

== Screenshots ==
1. Schema data box for pages.
2. Schema data fill-in-the-blank boxes for posts.
3. Schema data advanced box for posts.