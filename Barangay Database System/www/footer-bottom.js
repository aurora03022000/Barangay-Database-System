$(document).ready(function(){
    let bodyheight=$(document).outerHeight()
    let footerheight=$('#footer').outerHeight()

    let container=bodyheight-footerheight
    $('#container').css('height',`${container}px`)
})