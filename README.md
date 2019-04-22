# Model - Wordpress Application
This is a intro dummy text that very shortly can describe this repository. Project website consits of: 
* Static Pages with basic wysiwyg content
* No fancy script running in the background that a dev needs to be aware of

## Local development
### Install
Create a local wordpress install. Delete your local `wp-content` folder and clone this project to your local wordpress install. In order to compile our Sass files and our JavaScript files in `/wp-content/themes/.../assets` in to `styles.css` and `compiled-scripts.js` we need **Gulp** running. `cd .` into wordpress root folder that contains `package.json` and run:
```
npm install 
```
This will install the dependencies needed. After this, open `guplfile.js` and **edit row 22-24** to match your local dev-environment.

### Run local development
Now it's time to run gulp to watch for changes in `/wp-content/themes/.../assets` and recompile sass and script bundles and also run a Browsersync `localhost:3000`  in order to see your changes in real time. `cd .` into wordpress root folder that contains `gulpfile.js` and run:

```
gulp --> Compile without minify css + sourcemap
```

Now you are all set. Open `http://localhost:3000` in your browser. This should reflect your Wordpress-install. Try to edit a file in `/assets/styles` or `/assets/javascript/`, this should refresh your styles and scripts without manually refreshing the page.

### Build for production
To get minified `style.css` and uglified `compiled-scripts.js` to send to production server, run:
```
gulp min --> Compile with minify css - sourcemap
```
```
gulp inj --> Injects css into head
```

### Functions

##### Defer or async scripts

Add your JS names to function ```wsds_defer_scripts``` to defer/async them. Otherwise you'll get jQuery error, as the main jQuery is deferred on page load.

Find the correct JS name with ```wsds_detect_enqueued_scripts```.

## Wordpress plugins
* acf-content-analysis-for-yoast-seo - *Hooks ACF with Yoast SEO*
* admin-menu-editor-pro - *Edit the Wordpress menu*
* advanced-custom-fields-pro - *Handle custom wordpress fields*
* autoptimize - *Bundle, minify, uglify, caching etc.* 
* brozzme-db-prefix-change - *Replace standard `wp_` in db to prevent automated attacks*
* cms-tree-page-view - *Better overview of Pages in wp-admin* 
* duplicate-post - *Duplicate any Page/Post for fast content creating* 
* force-regenerate-thumbnails - *Delete old and create new sizes of images in media library* 
* gravityforms-sv_SE - *Add swedish translations for Gravity Forms*
* gravityforms - *Create html forms in a snap*
* safe-svg - *Make them svg-files secure in the media library* 
* wordpress-seo - *Handle meta data, sitemaps and much more*
* wp-migrate-db-pro-media-files - *Tool for migrating media library files between different installs*
* wp-migrate-db-pro - *Tool for migrating databases between different installs*
* wp-smushit - *Optimize images uploaded to media library* 
* wps-hide-login - *Hides wp-login in order to prevent brute force attacks*  
* stream - *Track what client is doing to prevent overide content*  
* query-monitor - *checking queries to db - optimize and remove bottlenecks*
* better search and replace - *search in db and replace*

## JavaScript plugins /.../assets/javascript/
* [/vendor/waypoint.min.js](http://imakewebthings.com/waypoints/) - *Trigger function when scrolling to element* 
* /custom/svg-to-inline.js - *Add class svg to image `<img class="svg".../>` and the svg will be inline html*
* /custom/custom-bundle.js - *Contains some simple functions, for example toggle burger menu and lorem ipsum*

## Theme structure
```
clientname/
├── /assets/
│   └── /fonts/ - custom font files
│   └── /images/ - static images/icons
│   └── /javascript/ - custom javascript functions
|   └── /styles/ - sass files
└── /lib/
    └── clean-up.php - removes bloating wp stuff
    └── extras.php - some extra global functions to enhance wp 
    └── /plugins/ - more custom php plugins
    └── /posttype-taxonomy/ - custom post types and taxonomies
└── /page-templates/ - templates that can be choosen from wp-admin
└── /partials/ - components used throughout our theme
└── /wp-search-updated/ - overwrite template from wp-search plugin
│
│
... standard wp-theme files like page.php & single.php
```
 

## Note (stuff that can be good to know)
In wordpress root folder there is a file called `lorem-ipsum.php` In this file there is a function that triggers a cron job that runs every other hour called `import_events`. This will create **posts of post-type event** from the list `http://api-lorem-ipsum/event.json` More instructions are available in the php-file.
