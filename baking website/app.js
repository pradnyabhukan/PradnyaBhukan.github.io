//select element function
const selectElement=function(element){
return document.querySelector(element);
};

let menuToggler= selectElement('.menu-toggle');
let body= selectElement('body');

menuToggler.addEventListener('click',function(){
    body.classList.toggle('open');
});

$(document).ready(function(){
    $('#autoWidth').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad:function(){
            $('autoWidth').removeClass('cS-hidden');
        }
    })
})

