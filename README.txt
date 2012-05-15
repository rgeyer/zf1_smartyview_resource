Simply add this as a submodule to your project (if you're using git).

  git submodule add git://github.com/rgeyer/zf1_smartyview_resource.git library/SmartyViews

Or, if you're using some other VCS, simply put the files from this project in ~/library/SmartyViews.

Then add the following to your application config file.

  pluginPaths.SmartyViews = "SmartyViews"
