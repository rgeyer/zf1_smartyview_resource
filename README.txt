Simply add this as a submodule to your project (if you're using git).

  git submodule add git://github.com/rgeyer/zf1_smartyview_resource.git library/ZSmarty

Or, if you're using some other VCS, simply put the files from this project in ~/library/ZSmarty.

Create the directories APPLICATION_PATH "/templates/", APPLICATION_PATH "/tmp/smarty_compile", APPLICATION_PATH "/tmp/smarty_cache" and make them writable by your apache process/user

Then add the following to your application config file.

  autoloadernamespaces[] = "ZSmarty_"
  pluginPaths.ZSmarty_Resource = "ZSmarty/Resource"
  resources.view = true
  
  smarty.caching = 1
  smarty.cache_lifetime = 14400 ; 4 hours
  smarty.template_dir = APPLICATION_PATH "/templates/"
  smarty.compile_dir = APPLICATION_PATH "/tmp/smarty_compile/"
  smarty.config_dir = ""
  smarty.cache_dir = APPLICATION_PATH "/tmp/smarty_cache/"
  smarty.left_delimiter = "{"
  smarty.right_delimiter = "}"

  
http://gediminasm.org/article/smarty-3-extension-for-zend-framework