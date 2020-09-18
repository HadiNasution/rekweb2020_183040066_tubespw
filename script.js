let keyword = document.getElementById('keyword');
let container = document.getElementById('container');

keyword.addEventListener('keyup',function(){
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('get','cari_ajax.php?keyword=' + keyword.value);
    xhr.send();
});