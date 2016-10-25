# middleWareZendCon
Adapted from presentation given by Josh Butts at ZendCon 2016

Utilizes PSR7/Zend DIACTOROS frameworks to implement a custom middleware stack.
Code devised from live coding session led by by Josh Butts at ZendCon 2016.  
Code modified/commented further by Chris Botte

Simple Stack performs the following:

1. Using basic Middleware Auth, prompts user to login to site (U: admin P: password)

2. HomepageMiddleware generates the initial response: 
    Hello, admin. You are currently reading content from HompageMiddleware

3. StringReverserMiddleware, takes entire body content and reverses the string.  Reversed content is writtent to body

    erawelddiMegapmoH morf tnetnoc gnidaer yltnerruc era uoY .nimda ,olleH
    
    Hello, admin. You are currently reading content from HompageMiddleware
    
4. Hence, simple example generates the following message when url is accessed the 1st time:

    erawelddiMegapmoH morf tnetnoc gnidaer yltnerruc era uoY .nimda ,olleH

    Hello, admin. You are currently reading content from HompageMiddleware
    
5. Creates simple cache middleware to write content of response body to md5 hashed file name in /cache folder of the app.  
    Second time same exact URL is accessed, the cache file is accessed and yields this response:

    erawelddiMegapmoH morf tnetnoc gnidaer yltnerruc era uoY .nimda ,olleH
    
    Hello, admin. You are currently reading content from HompageMiddleware [FROM CACHE]
 
As this is a middleware stack, within the index.php file, certain middlewares can be excluded to produce different results.
