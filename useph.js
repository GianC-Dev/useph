const res = $("uphp").text();
$.post("useph.php", {res: res}, function (data) {
    console.log(data)
    $("uphp").text(data);
})
