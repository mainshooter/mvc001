var contact;

(function() {
  contact = {
    read: function(contactID) {
      document.body.innerHTML = ajax("?op=show&contactID=" + contactID);
      console.log(contactID);
    }
  }
})();
function ajax(url) {
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", url, false);
  xhttp.send();

  return(xhttp.responseText);
}
