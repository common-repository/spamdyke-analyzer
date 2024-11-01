=== Spamdyke Analyzer ===
Contributors: alessandroconsorti
Donate link: http://www.alessandroconsorti.it
Tags: spamdyke, antispam, qmail, blacklist
Requires at least: 2.8
Tested up to: 3.5.2
Stable tag: 1.1.2
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 
A plugin to understand SpamDyke 's error codes 
 
== Description ==
 
Spamdyke is a filter for monitoring and intercepting SMTP connections between a remote host and a qmail server. 
Spam is blocked while the remote server (spammer) is still connected; no additional processing or storage is needed.

In addition to all of its anti-spam filters, spamdyke also includes a number of features to enhance qmail. 

For more info about Spamdyke visit http://www.spamdyke.org/.

Every time an email is blocked, spamdyke also provides an explanation in the form of return code.
This error code has its own description that I wanted to make it easily accessible to all users of WordPress.
To run the plugin Spamdyke Analyzer is necessary to enter in the configuration file of the spamdyke, spamdyke.conf, the following line (suitably modified) with your address, for example:
policy-url = http://www.alessandroconsorti.it/spamdyke?code=



 
== Installation ==
 
1. Upload spamdyke-analyzer folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place the short-code in your posts or pages
 

== Frequently asked questions ==
 
= How to use the plugin? =
 
Simply insert into the post or page a shortcode like this: 
[SpamdykeDecode tag_title=h5 tag_descr=h6]

 
= Can I set different default values for tag_title or tag_descr? =
 
Sure. These can have different formatting tags (eg h1, h2, p, etc. ..)
  
== Screenshots ==
1. screenshot-1.png
 
== Changelog ==

= 1.1.2 =
* BugFix: 
This fix resolves a warning with the loading of the plugin.
Thanks to Eugenio Petullà for the support.

= 1.1.1 =
* BugFix: 
This fix resolves an issue with the loading of the stylesheet.
Thanks to Eugenio Petullà for the support.

= 1.1 =
Added multi language support.
For the moment, the languages ​​available are English and Italian.

= 1.0 =
Initial Release

