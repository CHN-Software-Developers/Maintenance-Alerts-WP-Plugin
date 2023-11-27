    /*  
    You can use this plugin to show the website maintenance scheduled information to the visitors of your website or put your site into full maintenance mode.
    Copyright (C) 2021-2023  Himashana (Email : Himashana@chnsoftwaredevelopers.com)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/

function showTandCiframe(){
    document.getElementById('privacyPolicyiframe').style.display = 'none';
    document.getElementById('TandCiframe').style.display = 'block';
    document.getElementById('showTandCbtn').style.color = 'blue';
    document.getElementById('showPrivacyPolicybtn').style.color = 'black';
}

function showPrivacyPolicyiframe(){
    document.getElementById('privacyPolicyiframe').style.display = 'block';
    document.getElementById('TandCiframe').style.display = 'none';
    document.getElementById('showPrivacyPolicybtn').style.color = 'blue';
    document.getElementById('showTandCbtn').style.color = 'black';
}

function showColorCombiningWindow(){
    document.getElementById("colorCombiningWindow").style.display = "block";
}

function displayInputColors(){
    document.getElementById("colorCombiningWindow").style.display = "none";
    document.getElementById("textcolorDisplayBox").style.backgroundColor = document.getElementById("textcolor").value;
    document.getElementById("textcolorPreview").style.color = document.getElementById("textcolor").value;
    document.getElementById("backgroundcolorDisplayBox").style.backgroundColor = document.getElementById("backgroundcolor").value;
    document.getElementById("backgroundcolorPreview").style.backgroundColor = document.getElementById("backgroundcolor").value;
}