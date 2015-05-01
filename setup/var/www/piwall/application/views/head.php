<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Piwall Controller</title>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<!-- 	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
 -->	<link href='http://fonts.googleapis.com/css?family=Pathway+Gothic+One' rel='stylesheet' type='text/css'>
	<script>
	var _validFileExtensions = [".mov", ".m4v", ".mp4"]; 
	function Validate(oForm) {
		var arrInputs = oForm.getElementsByTagName("input");
		for (var i = 0; i < arrInputs.length; i++) {
			var oInput = arrInputs[i];
			if (oInput.type == "file") {
				var sFileName = oInput.value;
				if (sFileName.length > 0) {
					var blnValid = false;
					for (var j = 0; j < _validFileExtensions.length; j++) {
						var sCurExtension = _validFileExtensions[j];
						if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
							blnValid = true;
							break;
						}
					}
					
					if (!blnValid) {
						alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
						return false;
					}
				}
			}
		}
	  
		return true;
	}
	</script>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	/*body {
		background-color: #eee;
		margin: auto;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
		width: 700px;
	}*/

	body {
		color: #eee;
		font-family: sans-serif;
		font-size: 0.8em;
		background-color: #000;
	}
	
	.content-block {
		background-color: #111;
		border: 3px solid #d0d0d0;
		margin-top: 15px;
		padding: 6px 12px;
	}

	ul {
		list-style: none;
	}

	a {
		color: #ff0;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		box-sizing: border-box;
		color: rgb(255, 255, 255);
		cursor: default;
		direction: ltr;
		display: inline;
		font-family: 'TradeGothicLTStdRegular', 'Pathway Gothic One', sans-serif;
		font-size: 36px;
		font-style: normal;
		font-weight: normal;
		height: auto;
		line-height: 50.4000015258789px;
		margin-bottom: 18px;
		margin-left: 0px;
		margin-right: 0px;
		margin-top: 7.19999980926514px;
		padding-bottom: 0px;
		padding-left: 0px;
		padding-right: 0px;
		padding-top: 0px;
		text-rendering: optimizeLegibility;
		text-transform: uppercase;
		width: auto;
	}

	h3 {
		color: #ddd;
		font-family: 'Pathway Gothic One', sans-serif;	
		padding-left: 15px;
		font-size: 30px;
	}

	#logo {
		box-sizing: border-box;
		color: rgb(238, 238, 238);
		cursor: default;
		display: inline-block;
		font-family: 'Pathway Gothic One', sans-serif;
		font-size: 16px;
		font-style: normal;
		font-weight: normal;
		height: 90px;
		line-height: 16px;
		max-width: 100%;
		padding-bottom: 8px;
		padding-left: 8px;
		padding-right: 8px;
		padding-top: 8px;
		vertical-align: middle;
		width: 117px;
	}
	/*h1 {
		background-color: #333;
		border-bottom: 1px solid #d0d0d0;
		color: #dd0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px;
		padding: 14px 15px 10px;
	}*/
	

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 15px;
	}



	p.footer {
		
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	p.footer .left {
		text-align: left;
		float: left;
	}
	
	p.footer .right {
		text-align: right;
		float: right;
	}
	
	.clear {
		clear: both;
	}
	
	#container {
		margin: 10px;
		background-color: #efefef;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>