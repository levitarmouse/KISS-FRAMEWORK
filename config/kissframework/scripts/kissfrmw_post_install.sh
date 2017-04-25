#!/bin/bash

mkdir -p config/kissorm;
cp -rp ./vendor/levitarmouse/kiss_orm/scripts/post_install.sh ./kissorm_post_install.sh;
chmod 0775 ./kissorm_post_install.sh;
./kissorm_post_install.sh;
echo "Kiss-Orm configured";
rm -rf kissorm_post_install.sh;


mkdir -p config/kissrest;
cp -rp ./vendor/levitarmouse/kiss_rest/scripts/post_install.sh ./kissrest_post_install.sh;
chmod 0775 ./kissrest_post_install.sh;
./kissrest_post_install.sh;
echo "Kiss-Rest configured";
rm -rf kissrest_post_install.sh;