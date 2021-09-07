$
$(document).ready(function () {
    $('#eye').click(function () {
        if ($('#password').attr('type') === 'password') {
            $('#eye').removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
            $('#password').attr('type','text');
        } else {
            $('#eye').removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
            $('#password').attr('type','password');
        }
        
    });
});

var Button=document.querySelectorAll('.navbutton');
var activebutton,button,link,i;
for(i=0;(button=Button[i]);i++){
	link=button.firstElementChild;

	if(link.href===window.location.href){
		activebutton=button;
		break;
	}
}
if(activebutton){
	activebutton.classList.add('navbutton-active');
}


