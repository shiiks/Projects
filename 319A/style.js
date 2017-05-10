var cardId='';
var groupId=1;
var valueAddsUrl = 'http://54.225.111.46:8080/HolaEnterprise/analytics/valueAddsCollector';
function getDeviceType() {
	var ua = navigator.userAgent;
	var checker = {
		iphone: ua.match(/(iPhone|iPod|iPad)/),
		blackberry: ua.match(/BlackBerry/),
		android: ua.match(/Android/)
	};
	if (checker.android){
		return "Android";
	}
	else if (checker.iphone || checker.iPod || checker.iPad){
		return "Iphone";
	}
	else if (checker.blackberry){
		return "blackberry";
	}
	else {
		return "Desktop";
	}
}

function isLastPage() {
	plyButton(2); 
	var dev = getDeviceType();
	console.log("DEV TYPE"+ dev);

	if(dev=='Android') {
		try {
			window.parent.showLikeCommentDivs();
			AndroidFunction.displaySharePanel();
		} catch(err) {
			// Handle error(s) here
		}
	} else if(dev=='Iphone') {
		// Safari (in-app)
		var is_uiwebview = /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(navigator.userAgent);

		if(is_uiwebview) {
			window.location  = 'ios:isLastPage';
		}
	}
	var is_safari_or_uiwebview = /(iPhone|iPod|iPad).*AppleWebKit/i.test(navigator.userAgent);

	if(dev=='Desktop' || (is_safari_or_uiwebview)) {
		console.log("IN DESK TYPE");

		try {
			window.parent.showLikeCommentDivs();
		} catch(err) {
			// Handle error(s) here
		}
	}
	var url=getUrlVars();

if(url.length>0 && url[0]=="overlay" && url["overlay"]=="yes")

 {

  $("#p5pg5QXlX-an-anim").append('<div id="afterplay_overlay" style="opacity: 0.85; background-color: rgb(0, 0, 0); text-align: center; width: 320px; height: 416px; vertical-align: middle; color: rgb(255, 255, 255); display: block;"><div style="text-align:right"><a style="font-size:25px;color:#fff;cursorointer;padding:10px;" onclick="document.getElementById(\'afterplay_overlay\').style.display=\'none\';"><img src="//hola-dev.techvedika.com/close-icon.png" /></a></div><div style="position: relative; font-family: verdana; font-style: italic; font-size: 17px; margin-top: 20%;">Like this card! <br><div style="margin-left: 15%;margin-top: 8%;"><div style="float:left;">Download</div><div style="float:left;"><a href="http://www.holacards.com/" target="_blank"><img src="//hola-dev.techvedika.com/overlay-logo.png" style="height: 50px; padding-top: -4px;margin-top: -15px;margin-left: 5px;margin-right: 5px;"></a></div><div style="float:left;">App from</div></div></div><div style="margin-top: 48%; position: relative;"><a href="https://play.google.com/store/apps/details?id=com.techvedika.holacards.Activity&amp;hl=en" target="_blank"><img width="150px" src="//hola-dev.techvedika.com/scripts/Google-playstore.png"></a><br><a href="https://itunes.apple.com/tc/app/holacards/id779477259?mt=8" target="_blank"><img width="150px" src="//hola-dev.techvedika.com/scripts/ios-store.png"></a></div></div>');

}
}
function getUrlVars()
{
 var vars = [], hash;
 var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
 for(var i = 0; i < hashes.length; i++)
 {
  hash = hashes[i].split('=');

  if($.inArray(hash[0], vars)>-1)
  {
   vars[hash[0]]+=","+hash[1];
  }
  else
  {
   vars.push(hash[0]);
   vars[hash[0]] = hash[1];
  }
 }

 return vars;
}
function hideSocialPanels() {
	plyButton(1); 
	var dev = getDeviceType();
	console.log("DEV TYPE"+ dev);

	if(dev=='Android') {
		try {
			window.parent.hideLikeCommentDivs();
		} catch(err) {
			// Handle error(s) here
		}
	} else if(dev=='Iphone') {
		// Safari (in-app)
		var is_uiwebview = /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(navigator.userAgent);

		if(is_uiwebview) {
			//window.location  = 'ios:isLastPage';
		}
	}
	var is_safari_or_uiwebview = /(iPhone|iPod|iPad).*AppleWebKit/i.test(navigator.userAgent);

	if(dev=='Desktop' || (is_safari_or_uiwebview)) {
		console.log("hideSocialPanels IN DESK TYPE");

		try {
			window.parent.hideLikeCommentDivs();
		} catch(err) {
			// Handle error(s) here
		}
	}

}

$(document).ready(function(){
	console.log("CALING");
	var rurl='cardDetails.json';
	$.ajax({
      url: rurl,
      dataType: "json",
      success: function(data) {
		  cardId = data.cardDetails.cardCode;
		  groupId = data.cardDetails.groupId;
	  }
		   });

	//$( "#p5pg5QXlX-an-obj-12 img").click(function() {
		//hideSocialPanels();
	//});
});

function trackClick(url,linkLabel){
	$.ajax({
	  url:valueAddsUrl,
	  type: "POST",
	  contentType: 'application/json',
	   dataType: 'json',
	  data: JSON.stringify( { "clickedItem": linkLabel, "cardId":cardId, "groupId":groupId, "clickedUrl":url, "cardUrl":window.location.href, "timezone":"Asia/Calcutta"} ),
	  processData: false,
      success: function(resp) {
		  console.log("rep-->",resp);
	  },
				error: function (xhr, status, error) {
						console.log("error-->",error);
				}
		   });
}


function setCardDetails() {
	var url='cardDetails.json';
	var valBG;
	var valCol;
	$.ajax({
      		url: url,
      		dataType: "json",
      		success: function(data) {
				valBG = data.cardDetails.valueAddBG;
				valCol = data.cardDetails.valueAddColor;

		var cardObj = data.cardDetails.pageDetail;
		$.each(cardObj,function (i,cardObjval) {
			var textObj = cardObjval.textMessages;
			var infoObj = cardObjval.infoMessages;
			$.each(infoObj, function(k,val){
				var divId = val.divId;
				var value = val.value;	
				if(val.visibility=="yes"){
					$("#"+divId).show();
					$("#"+divId).addClass("toggl");
					//console.log($("#"+divId).position());
					var new_div=""
					if(val.iconType=="social"){
				       new_div+="<div class='info_"+divId+" info' style='height:auto;padding:0px 7px; background-color:"+valBG+"; color:"+valCol+" !important;'><ul>";
					   console.log("val.value-->",val.value);
							$.each(val.value,function (i,socialVal) {
									//if(socialVal.label=="Facebook"){
										new_div+="<li>"
										if(socialVal.url!=''){
											new_div+="<a href='"+socialVal.url+"' target='_blank' style='color:"+valCol+" !important;' onclick=\"trackClick('"+socialVal.url+"','"+socialVal.label+"')\">"+socialVal.description+"</a>";
										}else{
											new_div+=socialVal.label
										}
										new_div+="</li>";
									/*}
									if(socialVal.label=="Twitter"){
										new_div+="<li>"
										if(socialVal.url!=''){
											new_div+="<a href='"+socialVal.url+"' target='_blank' onclick=\"trackClick('"+socialVal.url+"','"+socialVal.label+"')\"><img src='assets/grey-twiiter.png' border='0'></a>";
										}else{
											new_div+="<img src='assets/twitter.png' border='0'>"
										}
										new_div+="</li>";
									}
									if(socialVal.label=="Youtube"){
										new_div+="<li>"
										if(socialVal.url!=''){
											new_div+="<a href='"+socialVal.url+"' target='_blank' onclick=\"trackClick('"+socialVal.url+"','"+socialVal.label+"')\"><img src='assets/grey-youtube' border='0'></a>";
										}else{
											new_div+="<img src='assets/youtube.png' border='0'>"
										}
										new_div+="</li>";
									}
									if(socialVal.label=="Linkedin"){
										new_div+="<li>"
										if(socialVal.url!=''){
											new_div+="<a href='"+socialVal.url+"' target='_blank' onclick=\"trackClick('"+socialVal.url+"','"+socialVal.label+"')\"><img src='assets/grey-linkedin.png' border='0'></a>";
										}else{
											new_div+="<img src='assets/linkedin.png' border='0'>"
										}
										new_div+="</li>";
									}
									if(socialVal.label=="Pinterest"){
										new_div+="<li>"
										if(socialVal.url!=''){
											new_div+="<a href='"+socialVal.url+"' target='_blank' onclick=\"trackClick('"+socialVal.url+"','"+socialVal.label+"')\"><img src='assets/grey-pinterest.png' border='0'></a>";
										}else{
											new_div+="<img src='assets/pinterest.png' border='0'>"
										}
										new_div+="</li>";
									}*/
						    });
						new_div+="</ul>";
					}else{
						new_div+="<div class='info_"+divId+" info' style='background-color:"+valBG+";'><a href='"+val.value+"' target='_blank' style='color:"+valCol+" !important;' onclick=\"trackClick('"+val.value+"','"+val.label+"')\">"+val.description+"</a> ";
					}
					new_div+="</div>"
					$(new_div).insertAfter($("#"+divId));
				}else{
					updateCls($( "#"+divId).next(),divId,$("#"+divId).attr("class"))
					function updateCls(currid,oldid,ncls){
						var addId=oldid
						if(ncls){
							var spId = ncls.split("new_");
							addId=spId[1];
						 }
						currid.css('-webkit-animation-name','ani-'+addId+'-0');
						currid.addClass("new_"+addId);
						var nxtDiv = currid.closest("div").nextAll("div[id]:first");
						if(nxtDiv && currid[0]){
							updateCls(nxtDiv,currid[0].id,nxtDiv.attr("class"));	
						}

					}
					$("#"+divId).hide();
				}
			});
			$.each(textObj,function (j,val) {
				var divId = val.divId;
				var value = val.value;

				var cst = val.isCustomText;
	
				if(cst=="yes")
				{
					
					$(this).html(val.value);
				}
				var key = val.key;

				var color = val.color;

				if(color != "" && color !=null) {
					$("#"+divId).css('color',color);
				}

				var fontWeight = val.fontWeight;
				if(fontWeight != "" && fontWeight !=null) {
					$("#"+divId).css('font-weight',fontWeight);
				}

				var fontSize = val.fontSize;
				if(fontSize != "" && fontSize !=null) {
					console.log("FONT SIZE"+fontSize);
					$("#"+divId).css('font-size',fontSize+"px");
				}

				var fontStyle = val.fontStyle;
				if(fontStyle != "" && fontStyle !=null) {
					$("#"+divId).css('font-style',fontStyle);
				}

				var fontFamily = val.fontFamily;
				if(fontFamily != "" && fontFamily !=null) {
					$("#"+divId).css('font-family',fontFamily);
				}

				var visibility = val.visibility;
				$("#"+divId).html("<span>"+value+"</span>");
				$("#"+divId).css("visibility","visible");

				if(visibility=='no'){
					$("#"+divId).css("visibility","hidden");
				}
			});
									 
		});
	     }
	});
}

function plyButton(mode)
{	
	var playId="";
	$("li#p5pg5QXlX-an-scene-0 div.p5pg5QXlX-an-stage div img").each(function () {
		if($(this).attr("src").indexOf("play")>0){
			playId=$(this).parent().parent().attr("id"); 
		} 
	});	
	if(playId!="")
	{
		if(mode==1)
		{
			$("#"+playId).hide();
		}
		if(mode==2)
		{
			$("#"+playId).show();		
		}
	}
}

function css(a) {
    var sheets = document.styleSheets, o = {};
    for (var i in sheets) {
        var rules = sheets[i].rules || sheets[i].cssRules;
        for (var r in rules) {
            if (a.is(rules[r].selectorText)) {
                o = $.extend(o, css2json(rules[r].style), css2json(a.attr('style')));
            }
        }
    }
    return o;
}

function css2json(css) {
    var s = {};
    if (!css) return s;
    if (css instanceof CSSStyleDeclaration) {
        for (var i in css) {
            if ((css[i]).toLowerCase) {
                s[(css[i]).toLowerCase()] = (css[css[i]]);
            }
        }
    } else if (typeof css == "string") {
        css = css.split("; ");
        for (var i in css) {
            var l = css[i].split(": ");
            s[l[0].toLowerCase()] = (l[1]);
        }
    }
    return s;
}