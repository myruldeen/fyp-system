$(window).scroll(function(){
   if ($(window).scrollTop() == 0) {
    $(".navbar").removeClass("fixed-top");
 } else {
    $(".navbar").addClass("fixed-top");
 }
});
function _(x){
	return document.getElementById(x);
}
function emptyElement(x){
	_(x).innerHTML = "";
	_("title").style.borderColor = "black";
	_("description").style.borderColor = "black";
	_("category").style.borderColor = "black";
	_("file").style.borderColor = "black";
}
 function showMyImage(fileInput) {
    var files = fileInput.files;
    for (var i = 0; i < files.length; i++) {           
        var file = files[i];
        var imageType = /image.*/;     
        if (!file.type.match(imageType)) {
            continue;
        }           
        var img = _("thumbnil");            
        img.file = file;    
        var reader = new FileReader();
        reader.onload = (function(aImg) { 
            return function(e) { 
                aImg.src = e.target.result; 
            }; 
        })(img);
        reader.readAsDataURL(file);
    }    
}