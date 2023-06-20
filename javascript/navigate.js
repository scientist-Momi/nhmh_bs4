function show(elementID, buttonID) {
    var ele = document.getElementById(elementID);
    var btn = document.getElementById(buttonID);

    if (!ele) {
        alert('No such page found');
        return;
    }

    var pages = document.getElementsByClassName('page');
    var btns = document.getElementsByClassName('nav_item');
    for (var i = 0; i < pages.length; i++){
        pages[i].style.display = 'none';
    }
    for (var i = 0; i < btns.length; i++){
        btns[i].style.borderBottom = 'none';
        btns[i].style.borderLeft = 'none';
    }

    ele.style.display = 'block';
    btn.style.borderBottom = '5px solid #1a8d97';
    btn.style.borderLeft = '5px solid #1a8d97';
}


      