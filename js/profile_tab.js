var content1=document.getElementById("content1");
var content2=document.getElementById("content2");
var content3=document.getElementById("content3");

var btn1=document.getElementById("btn1");
var btn2=document.getElementById("btn2");
var btn3=document.getElementById("btn3");

function infoDetails1()
{
    content1.style.display="block";
	content2.style.display="none";
    content3.style.display="none";
    
    btn1.style.background='#d7d4d4';
}
function infoDetails2()
{
    content1.style.display="none";
	content2.style.display="block";
    content3.style.display="none";
    
    btn1.style.background='rgb(172, 168, 168)';
}
function infoDetails3()
{
    content1.style.display="none";
	content2.style.display="none";
    content3.style.display="block";
    
}
