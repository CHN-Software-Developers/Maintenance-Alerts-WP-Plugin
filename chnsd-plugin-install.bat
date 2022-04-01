@echo off
echo Installing plugin...
cd wordpress\wp-content\plugins
mkdir maintenance-alerts
cd ..
cd ..
cd ..
copy src wordpress\wp-content\plugins\maintenance-alerts

echo -------------------------------
echo Plugin installed successfully.
echo -------------------------------