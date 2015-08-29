// Vanilla-JavaScript
document.addEventListener("DOMContentLoaded", function (event) {
    var codeBlocks = document.querySelectorAll("pre code");
    for (var i = 0; i < codeBlocks.length; i++) {
        var block = codeBlocks[i];
        if (block.className == '') {
            block.className = 'hljs text';
        }
        hljs.highlightBlock(block);
    }
});


/*
// With jQuery
$(document).ready(function() {
    $('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
    });
});
*/
