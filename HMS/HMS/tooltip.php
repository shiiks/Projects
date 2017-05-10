<?php session_start(); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script language="javascript">
function show_popup(id) {
    if (document.getElementById){
        obj = document.getElementById(id);
        if (obj.style.display == "none") {
            obj.style.display = "";
        }
    }
}
function hide_popup(id){
    if (document.getElementById){
        obj = document.getElementById(id);
        if (obj.style.display == ""){
            obj.style.display = "none";
        }
    }
}
</script>

</head><body>
<div id="my_popup" style="z-index:10px; display:none;border:1px dotted gray;padding:.3em;background-color:black;position:absolute;width:200px;height:200px;left:100px;top:100px">
    <div align="right">
        <a href="javascript:hide_popup('my_popup')">close</a>
    </div>
<h3>Vooler PopUp</h3>
<p>You contents go here, whatever style or anything</p>
</div>


Somewhere in code
<a href="javascript:show_popup('my_popup')">Show popup</a>

</body></html>