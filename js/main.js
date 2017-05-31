var contact;
var webpage;

(function() {
  contact = {
    read: function(contactID) {
      document.body.innerHTML = ajax("?op=show&contactID=" + contactID);
      console.log(contactID);
    },
    mailAdressSelect: function(contactID) {
      ctrlResult = ajax("?op=emailSelectBox&highlateContactID=" + contactID);
      webpage.show(ctrlResult, 'ajaxResult');
    }
  }
})();

(function() {
  webpage = {
    show: function(result, id) {
      document.getElementById(id).innerHTML = result;
    },
    listeners: function() {
      var ajaxArray = document.getElementsByClassName('inputAjax');
      for (var i = 0; i < ajaxArray.length; i++) {
        ajaxArray[i].addEventListener('change', function(){contact.mailAdressSelect(this.value)});
      }
    }
  }
})();

function ajax(url) {
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", url, false);
  xhttp.send();

  return(xhttp.responseText);
}
