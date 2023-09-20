setTimeout(function () {
    var mensagemElements = document.getElementsByClassName('alert-danger');
    for (var i = 0; i < mensagemElements.length; i++) {
        mensagemElements[i].style.display = 'none';
    }
}, 5000);

setTimeout(function () {
    var mensagemElement = document.getElementById('msg-exc');
    if (mensagemElement) {
        mensagemElement.style.display = 'none';
    }
}, 5000);