# Corona

![](http://i.imgur.com/FWYpZU1.jpg)

Corona is a simple WordPress theme, inspired by Windows 10s MDL2 design language.

### Getting Started

* Clone this repo
* Package the files into a .zip
* Upload it to your WordPress theme
* Once the theme is installed and activated, create a page and use the template "Homepage" for that page
* Go to the Customization section on the WordPress dashboard and set that page as teh static front page

### Requirements

Corona is a simple tehme and it doesn't have a gallery or sharing buttons built-in, but it works nicely with two of the following plugins which you would have to install if you want these functionalities. 

* [Sharify](https://wordpress.org/plugins/sharify/)
* [Gallerify](https://wordpress.org/plugins/gallerify/)

### Customization

From the Corona Settings page in WordPress Customization dashboard, you can set a logo for our site, configure the amount of articles that get displayed on the homepage, enable/disable the featured section, choose the category that's used to feature aricles and enable/disable Disqus comments:

![](http://i.imgur.com/OgWDVXb.png)


### SASS

Corona is built on SASS and you can easily change the accent if you want. Simply modify the `$accent` variable on `style.scss` and compile it using a SASS compiler. If you have Visual Studio Code, you can simply use `gulp` and `gulp-sass` to compile hte SASS file (`npm install gulp` and `npm install gulp-sass`, then do `CTRL+SHIFT+B` everytime you want to compile the file.


### Stuff used to make this:

 * [Bootstrap](https://github.com/twbs/bootstrap) for the basic components
 * [WinStrap](https://github.com/winjs/winstrap) for MDL
 * [Underscores](https://underscores.me/) to jumpstart the dev process
