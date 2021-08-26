/* ALERT */
$(document).on('DOMContentLoaded', function(){
    if($('#close-alert').length){
        setTimeout(function(){
            $('#close-alert').toggle('slow');
        },3000);
    }
});


/* IMAGES FEEDBACK */
function FeedBackImg(InputImage, placeHolderImg){
    console.log(InputImage);
    let preview = $(placeHolderImg);
    $(InputImage).on('change',function(){
        console.log(InputImage);
        let file = $(InputImage)[0].files[0];
        let url = URL.createObjectURL(file);
        preview.attr('src', url);
        preview.text(file.name);
    })
}