$(document).ready(function () {
  $(".list").click(function () {
    const value = $(this).attr("data-filter");
    if (value == "all") {
      $(".itemPost").show("1000");
    } else {
      $(".itemPost")
        .not("." + value)
        .hide("1000");
      $(".itemPost")
        .filter("." + value)
        .show("1000");
    }
  });
  $(".list").click(function () {
    $(this).addClass("activee").siblings().removeClass("activee");
  });
});
