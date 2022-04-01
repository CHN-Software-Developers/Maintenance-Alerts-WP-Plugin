@echo off
echo Uninstalling plugin...
cd wordpress\wp-content\plugins
del maintenance-alerts
rmdir maintenance-alerts
cd ..
cd ..
cd ..

echo -------------------------------
echo Plugin uninstalled successfully.
echo -------------------------------