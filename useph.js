var list = document.getElementsByTagName("uphp");
var n_list = {};
$.each(list, function (index, value){
    n_list[index] = value.innerHTML;
})
$.ajax({
    type: 'post',
    url: "useph.php",
    data: n_list,
    success: function(data) {
        try {
            $.each(data, function (index, value) {
                list[value.key].innerHTML = value.text;
            })
        }catch (err){
            console.log(err)
            list[data.key].innerHTML = data.text;
        }
    }
});