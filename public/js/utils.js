/* ALERT */
$(document).on('DOMContentLoaded', function(){
    if($('#close-alert').length){
        setTimeout(function(){
            $('#close-alert').toggle('slow');
        },3000);
    }
});


/* IMAGES FEEDBACK */
function FeedBackImg(InputImage, placeHolderImg, placeHolderText = false){
    console.log(InputImage);
    let preview = $(placeHolderImg) ?? placeHolderImg;
    $(InputImage).on('change',function(){
        let file = $(InputImage)[0].files[0];
        if(preview != false){
            let url = URL.createObjectURL(file);
            preview.attr('src', url);
        }
        if(placeHolderText != false){
            $(placeHolderText).text(file.name);
        }else{
            preview.text(file.name);
        }
    })
}