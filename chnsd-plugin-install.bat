@echo off
echo Installing plugin...
cd wordpress\wp-content\plugins
mkdir maintenance-alerts
cd maintenance-alerts
mkdir templates
mkdir js
cd ..
cd ..
cd ..
cd ..
copy src wordpress\wp-content\plugins\maintenance-alerts
copy src\templates wordpress\wp-content\plugins\maintenance-alerts\templates
copy src\js wordpress\wp-content\plugins\maintenance-alerts\js

echo -------------------------------
echo Plugin installed successfully.
echo -------------------------------