# C2C ACF Blocks

Plugin to create Gutenberg blocks using Advanced Custom Fields.

Please use Example ACF block (example-block) as template for your own blocks. 

# Block structure
# block.json
File containing definition of block for ACF
> Please remember to use namespace cab (eg. cab/example-block)
# block.php
Main block file used for registering the block, importing fields, etc.
> Please use distinctive function name with cab prefix, eg. cab_register_example_block
# fields.php
Definition of ACF fields used in the block.
Fields can be prepared on some side WP installation and exported to PHP
> Please use distinctive function name with cab prefix, eg. cab_fields_example_block
# script.js
Scripts used in the block
# style.scss
Styles used in the block
# template.php
Template of the block 
> In scripts, stylesheets and templates please use distinctive IDs and classnames with cab-[blockname] prefix, eg. .cab-example-block, .cab-example-block__title, #cab-example-block__btn

# Remember to register your block in:
## Main block
index.php
## Styles
styles.scss
## Scripts
index.js

# Dependencies
Advanced Custom Fields PRO (v6 or later)

# Installation

Run "npm install" to install locally all dependencies from package.json file

# Builds

Webpack command to compile blocks before push to production
> npm run build

# License

The C2C ACF Blocks Plugin is a proprietary/commercial plugin created by Webdevdm

# Credits

C2C Blocks is built and maintained by Webdevdm

# Changelog
2.1.0 Updated webpack configuration
2.0.0 Change of plugin's structure, new webpack configuration
1.0.0 First test version of the plugin


