<!--
Local Host info:
Some extra information regarding the address bar if you are using local server :
-- localhost/no htdocs/fileName : can skip writing the directory pof htdocs because it is alraedy included by default
-- localhost/folderName : will go into file with the name of the index.php by default if you do not specify the name of the file  


Class info:
When to create a class and how many class should be created?
- There is no specific time when you must create a class. It's just good to create classes when you gave behavior that you think can be split up or when you think you will want to re-use this code.


***************
In simple words, CLASS are files that store variable and fucntion so that you can use it anywhere without the need to repeat the code.
***************

Log in info :
- How do we make sure that only logged in user can access the content of our webpages?
- So , We will have to remember whether they have logged in or not using session superglobals


CSS length unit :
- vh
Equal to 1% of the height of the viewport's initial containing block.
-- EG : if 100vh, it will cover 100% of viewport height
- vw
Equal to 1% of the width of the viewport's initial containing block.

*** Imagin margin as BLANK(NO TEXT,NO CONTENT)SPACE OUTSIDE THE ELEMENT, this will clarify a lot of things.

NOTE THAT : The top and bottom margins have NO EFFECT on non-replaced INLINE ELEMENTS, such as <span> or <code>.

CSS position property :
- fixed : relative to the viewport blocks directlu
- relative : relative to its original position
- absolute : relative to it containing block (closest positioned ancestor) which has a position property as well
- These property are used with top, right, bottom,left

Caching problem with CSS : Causes CSS not updating
- Caching is a technique that stores a copy of a given resource and serves it back when requested. When a web cache has a requested resource in its store, it intercepts the request and returns its copy instead of re-downloading from the originating server. This achieves several goals: it eases the load of the server that doesn’t need to serve all clients itself, and it improves performance by being closer to the client, i.e., it takes less time to transmit the resource back. For a web site, it is a major component in achieving high performance. On the other side, it has to be configured properly as not all resources stay identical forever: it is important to cache a resource only until it changes, not longer.

- There are several types of cache :
1) No cache :
- All identical request are going through the server
2) Local cache :
- The 1st request is going throught the server but the subsequent identical request are not even sent but served by local web browser cache.
3) Shared cache :
- 1st request is going through the server, subsequent request are served by a common cache of a web browser.
-->