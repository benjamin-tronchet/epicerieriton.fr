# starter-bootstrap3-v2
Starter kit pour dévellopement de site en PHP


Installation 
--------------------------

1. REPOSITORY
   
* $ cd repository
   
2. NPM

* $ npm install

3. GULPFILE

Replace "var localhostPath" with your repository name


Serve project
-----------------

Generate server, watch files, compile sass and live reload

* $ gulp serve


Build project
-------------

Minify images, css and js files.. And all of other files in prod/ 

* $ gulp build


Dependencies included in the project
------------------------------------

* Bootstrap Sass V3
* Slick


APP STRUCTURE
-------------------

* app
  * -- index.html <- Modify this !
  * -- js
    * -- app.js <- Modify this
  * -- sass
    * -- app.scss <- Modify this
    * -- _bootstrap.scss <- Modify this
    * -- _bootstrap-variables.scss <- Modify this
    * -- bootstrap  <- Dont modify
  * -- img  <- Add images and folders image
  * -- fonts  <- Add yours fonts files here