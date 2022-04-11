@echo off
echo Building plugin...
mkdir bin
cd bin
echo Build date and time : %date% - %time% > buildinfo.txt
mkdir assets
cd ..
copy assets bin\assets
cd bin
mkdir trunk
cd ..

copy src bin\trunk

cd bin\trunk
mkdir templates
cd ..
cd ..
copy src\templates bin\trunk\templates

echo -------------------------------
echo Plugin built successfully.
echo -------------------------------
