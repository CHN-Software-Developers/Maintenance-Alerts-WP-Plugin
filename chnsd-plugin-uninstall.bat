@echo off
echo Uninstalling plugin...
cd wordpress\wp-content\plugins
cd maintenance-alerts

echo remove folder : templates
del templates
rmdir templates

echo remove folder : js
del js
rmdir js

cd ..

echo remove folder : maintenance-alerts
del maintenance-alerts
rmdir maintenance-alerts

cd ..
cd ..
cd ..

echo -------------------------------
echo Plugin uninstalled successfully.
echo -------------------------------