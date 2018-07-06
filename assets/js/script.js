$(function(){

    $("input").on("input", function(){
        $(this).val(function(i, j){
            return j.toLocaleUpperCase('tr-TR');
        })
    })

    $("#btn-check").click(function(){
        var jsonData = {};
        $(".row-inputs input").each(function(){
            var prm = $(this).attr("prm");
            jsonData[prm] = $(this).val();
        });
        $.ajax({
            type: "POST",
            url: "ajax/api.php",
            dataType: "json",
            data: jsonData,
            success: function(rt){
                swal(rt.b, rt.c, rt.d);
            }
        });
    });

});

