# WordPress Starter Theme
My personal starter theme for WordPress projects. Based on the [Sage](https://github.com/roots/sage) starter theme for WordPress. Utilizes a few [Bootstrap](https://github.com/twbs/bootstrap-sass) javascript utilities. Breakpoint paradigm inspired by [Foundation](https://github.com/zurb/foundation-sites).

----
## Instructions for Starting a New Theme

First things first. After cloning the repository, run `npm install` and `bower install` in order to install all project dependencies. Now lets customize naming of our new project.

1. Open `assets/manifest.json` and change the`devUrl` to the development URL you wish to proxy.
2. Globally search theme files for `_textdomain_` and replace it with your i18n text domain for the current project. This cannot be a PHP variable.
3. Rename `lang/_textdomain_.pot` to the same text domain you used in the previous step.
4. Whenever any system text is added to the theme, add it to the `.pot` file referenced in the previous step. This will make translation of the theme easy if needed down the line.
5. Edit `style.css` to reflect details and authorship of the project.

----
## Theme Assets
There are a handful of super useful JS files/libraries included in the theme assets directory, but these are not activated by default. To include any of these (located in `assets/scripts`), edit `assets/manifest.json` to add the desired assets within the `vendor` object after `modernizr.js`. Additionally, uncomment the relevant companion SCSS files in `main.scss`.

----
## Development and Deployment
To use the included `gulpfile.js` file for development, run `gulp` followed by `gulp watch` to utilize BrowserSync. When ready for theme deployment to a production server, run `gulp --production`.

----
## Thanks
* [Sage](https://github.com/roots/sage) 
* [Bootstrap](https://github.com/twbs/bootstrap-sass)
* [Foundation](https://github.com/zurb/foundation-sites)