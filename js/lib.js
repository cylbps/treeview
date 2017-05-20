function hide()
{
    /*document.getElementById('label1').style.display = "none";
     document.getElementById('label2').style.display = "none";
     document.getElementById('label3').style.display = "none";
     document.getElementById('label1_2').style.display = "none";*/
    var q = document.querySelectorAll(".menu-items")
    for (var i = 0; i < q.length; i++) {
        q[i].style.display = 'none'
    }
}

function menu(menuId)
{
    if (document.getElementById(menuId).style.display == "none")
    {
        //hide();
        document.getElementById(menuId).style.display = "block";
    }
    else
    {
        //hide();
        document.getElementById(menuId).style.display = "none";
    }
}


