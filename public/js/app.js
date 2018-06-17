var postid = 0;
var postBodyElement = null;
var postTitleElement = null;

$('.post').find('.interaction').find('.edit').on('click', function(event) {
    event.preventDefault();
    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    var postBody = postBodyElement.textContent;
    postTitleElement = event.target.parentNode.parentNode.parentNode.childNodes[1];
    var postTitle = postTitleElement.textContent;
    postid = event.target.parentNode.parentNode.dataset['postid'];
    $('#post-body').val(postBody);
    $('#post-title').val(postTitle);
    $('#edit-modal').modal();
});

$(document).on('click', '#modal-save', function(){
    $.ajax({
       method: 'POST',
        url: url_,
        data: { body: $('#post-body').val(), title: $('#post-title').val(), postid: postid, _token: token }
    })
        .done(function (msg) {
            $(postBodyElement).text(msg['new_body']);
            $(postTitleElement).text(msg['new_title']);
            $('#modal-close').click();
        });
});