var list = document.getElementsByTagName("uphp");
console.log(list.innerHTML);
$.each(list, function (index, value){
    let new_res = value.innerHTML;
    $.post("useph.php", {res: new_res}, function (data) {
        value.innerHTML = (data);
    })
})

