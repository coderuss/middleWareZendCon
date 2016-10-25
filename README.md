# middleWareZendCon
Adapted from presentation given by Josh Butts at ZendCon 2016

Utilizes PSR7/Zend DIACTOROS frameworks to implement a custom middleware stack.
Code devised from talk Given by Josh Butts at ZendCon 2016.  Code modified further by Chris Botte

Simple Stack performs the following:

1. Using basic Middleware Auth, prompts user tologin to site (U: admin P: password)
2. Generates 
3. Creates simple cache middleware to write content of response body to md5 hashed file name in /cache folder of the app
3. 

