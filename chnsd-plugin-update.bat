@echo off
echo Updating plugin...
cd wordpress\wp-content\plugins
mkdir maintenance-alerts
cd maintenance-alerts
mkdir templates
cd ..
cd ..
cd ..
cd ..
copy src wordpress\wp-content\plugins\maintenance-alerts
copy src\templates wordpress\wp-content\plugins\maintenance-alerts\templates

echo -------------------------------
echo Plugin updated successfully.
echo -------------------------------