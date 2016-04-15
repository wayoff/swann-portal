
/***************************************************************************
 *   Copyright (C) 2006, Paul Lutus                                        *
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU General Public License as published by  *
 *   the Free Software Foundation; either version 2 of the License, or     *
 *   (at your option) any later version.                                   *
 *                                                                         *
 *   This program is distributed in the hope that it will be useful,       *
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of        *
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the         *
 *   GNU General Public License for more details.                          *
 *                                                                         *
 *   You should have received a copy of the GNU General Public License     *
 *   along with this program; if not, write to the                         *
 *   Free Software Foundation, Inc.,                                       *
 *   59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.             *
 ***************************************************************************/

function addEvent(o,e,f) {
  if (o.addEventListener) {
    o.addEventListener(e,f,false);
    return true;
  }
  else if (o.attachEvent) {
    return o.attachEvent("on"+e,f);
  }
  else {
    return false;
  }
}

addEvent(window,"load",setup);
addEvent(window,"unload",makeCookie);

function getCookie(path)
{
  var result = "";
  var a = document.cookie.indexOf(path);
  if(a != -1) {
    a += path.length + 1;
    var b = document.cookie.indexOf(";",a);
    if(b == -1) {
      b = document.cookie.length;
    }
    result = unescape(document.cookie.substring(a,b));
  }
  return result;
}

var cookie_array = null;
function processCookie()
{
  var cookie = getCookie(window.location.pathname);
  if (cookie != ''){
    cookie_array = cookie.split(" ");
  }
}

function makeCookie() {
  var values = ((document.getElementById("ampm1").checked)?"1":"0");
  values += " " + ((document.getElementById("daylight1").checked)?"1":"0");
  var exp = new Date(new Date().getTime() + 30 * 24 * 60 * 60 * 1000);
  document.cookie=window.location.pathname + "=" + values + "; expires=" + exp.toGMTString();
}

var locations=["Samoa", "Hawaii", "Juneau","San Francisco"
,"Denver","Chicago","New York","Caracas"
,"Rio De Janeiro","Recife","Azores","London"
,"Paris","Cairo","Moscow","Baku"
,"Karachi","Dacca","Bangkok","Hong Kong"
,"Tokyo","Sydney","Noumea","Wellington"];

function setup()
{
  var d = new Date();
  var ltz = d.getTimezoneOffset();
  var dec = new Date(d.getFullYear(), 11, 1);
  var jun = new Date(d.getFullYear(), 5, 1);
  var a = dec.getTimezoneOffset();
  var b = jun.getTimezoneOffset();
  var isdst;
  if(b > a) {
    isdst = ltz != b;
  }
  else {
    isdst = ltz != a;
  }
  
  processCookie();
  setup_disp();
  // default DST setting based on date
  document.getElementById((isdst)?"daylight1":"daylight0").checked = true;
  if(cookie_array) {
    document.getElementById("ampm" + cookie_array[0]).checked = true;
    document.getElementById("daylight" + cookie_array[1]).checked = true;
  }
  update_clock();
}

function setup_disp()
{
  s = "<table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" bordercolor=\"#c0c0c0\" bgcolor=#ffffe0>";
  s += "<tr><td class=\"ccm\" colspan=\"2\">";
  s += "<input id=\"ampm0\" type=\"radio\" name=\"ampm\" checked=\"checked\">24 Hour&nbsp;";
  s += "<input id=\"ampm1\" type=\"radio\" name=\"ampm\">AM/PM";
  s += "</td><td class=\"ccm\">";
  s += "<input id=\"daylight0\" type=\"radio\" name=\"daylight\">Standard&nbsp;";
  s += "<input id=\"daylight1\" type=\"radio\" name=\"daylight\">Daylight";
  s += "</td></tr>";
  s += "<tr bgcolor=\"#ccffcc\"><td class=\"ccb\">Zone</td>";
  s += "<td class=\"ccb\">Place</td>";
  s += "<td class=\"ccb\" >Date/Time</td></tr>";
  daylight = (cookie_array && cookie_array[1] == "1")?1:0;
  offset = (new Date().getTimezoneOffset()/60) + daylight;
  for(i = 0; i < 24;i++) {
    q = "tz" + i;
    j = i-11;
    si = "" + Math.abs(j)
    if(si.length < 2) si = "0" + si;
    si = ((j < 0)?"-":"+") + si;
    mod = (i-11 == -offset)?" bgcolor=\"#f0f0ff\"":"";
    s += "<tr" + mod + " id=\"row" + i + "\"><td class=\"cc\">UTC" + si + "</td>";
    s += "<td class=\"cc\">" + locations[i] + "</td>";
    s += "<td class=\"ccm\" id=\"v" + i + "\"></td></tr>";
  }
  s += "</table>";
  document.getElementById("clock_disp").innerHTML = s;
}

function lz(v)
{
  return (v < 10)?"0" + v:v;
}

function formatDate(d)
{
  s = lz((d.getMonth()+1))
  + "/" + lz(d.getDate())
  + "/" + d.getFullYear() + " ";
  h = d.getHours();
  if (document.getElementById("ampm1").checked) {
    ap = (h >= 12)?"PM":"AM";
    h = (h % 12);
    if(h == 0) h = 12;
    s += lz(h)
    + ":" + lz(d.getMinutes())
    + ":" + lz(d.getSeconds())
    + " " + ap;
  }
  else {
    s += lz(h)
    + ":" + lz(d.getMinutes())
    + ":" + lz(d.getSeconds());
  }
  return s;
}

var old_offset = -1;
var hour = 3600000; // one hour in milliseconds
function update_clock() {
  var d = new Date();
  offset = d.getTimezoneOffset()/60;
  // add daylight hour if specified
  daylight = (document.getElementById("daylight1").checked)?1:0;
  // set initial TZ to UTC-11
  offset += daylight;
  d.setTime(d.getTime() - (11 * hour) + offset * hour);
  // create time zone outputs
  for(i = -11;i <= 12;i++) {
    document.getElementById("v" + (i+11)).innerHTML = formatDate(d);
    if(old_offset != offset) {
      color=(i == -offset)?"#f0f0ff":"#ffffe0";
      document.getElementById("row" + (i+11)).style.background = color;
    }
    d.setTime(d.getTime() + hour);
  }
  old_offset = offset;
  setTimeout('update_clock()', 990);
}
