$("textarea").css("height", $(window).height() - 150);

//run AJAX every time the content in textarea changes
//to save it in our database
$("textarea").keyup(function() {
  $.ajax({
    type: "POST",
    url: "updatediary.php",
    data: { diary: $("textarea").val() }
  })
    .fail(function() {

    })

})
