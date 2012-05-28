# Description
This is a simple Zend Framework (designed for v1.11) Resource Plugin which replaces normal view scripts with Smarty based templates.

Templates are still found in APPLICATION_PATH "/views/scripts/<controller>/<action>" but should be suffixed with '.tpl' rather than '.phtml'

The ZF layouts mechanism is abandoned in favor of Smarty style templates.  I.E. extend templates, where templates have {block} definitions that are completed by the view.  See a couple simple examples below and the documenation at http://www.smarty.net/docs/en/language.function.block.tpl

APPLICATION_PATH "/views/scripts/layout/default.tpl"
```html
<html>
  <head>
    <title>{block name="title"}Default Title{/block}</title>
  </head>
  <body>
    <p>Note the changed title above</p>
  </body>
</html>
``` 

APPLICATION_PATH "/views/scripts/index/index.tpl"
```html
{extends file="layout/default.tpl"}
{block name="title"}Index Page Title{/block}
```

# Requirements
* Smarty 3.x (probably would work with 2.x also)
* Zend Framework 1.11

# Usage
Simply add this as a submodule to your project (if you're using git).

```bash
git submodule add git://github.com/rgeyer/zf1_smartyview_resource.git library/ZSmarty
```

Or, if you're using some other VCS, simply put the files from this project in ~/library/ZSmarty.

Create the directories APPLICATION_PATH "/tmp/smarty_compile" and APPLICATION_PATH "/tmp/smarty_cache" and make them writable by your apache process/user

Lastly add the following to your application config file.

```ini
autoloadernamespaces[] = "ZSmarty_"
pluginPaths.ZSmarty_Resource = "ZSmarty/Resource"
resources.view = true

smarty.caching = 1
smarty.cache_lifetime = 14400 ; 4 hours
smarty.template_dir = APPLICATION_PATH "/views/scripts/"
; You can specify many template directories by treating the input as an array.  Beware namespace collisions though!
; In the case of modules, it's probably better to have a duplicate of this configuration in each module directory,
; rather than trying to specify them all here, specifically due to namespace collisions.
;smarty.template_dir[] = APPLICATION_PATH "/modules/default/views/scripts/"
;smarth.template_dir[] = APPLICATION_PATH "/modules/blog/views/scripts/"
smarty.compile_dir = APPLICATION_PATH "/tmp/smarty_compile/"
smarty.config_dir = ""
smarty.cache_dir = APPLICATION_PATH "/tmp/smarty_cache/"
smarty.left_delimiter = "{"
smarty.right_delimiter = "}"
```

# Credits
This is heavily inspired by a blog post by Gediminas.  In fact the ~/ZSmarty.php file is effectively an unedited copy of (his?) code. 

http://gediminasm.org/article/smarty-3-extension-for-zend-framework

# TODO