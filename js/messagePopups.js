var lastAlertId = 0;
function messageSuccess(message) {
  messageGeneral("Success!", message, "success");
}
function messageInfo(message) {
  messageGeneral("Info!", message, "info");
}
function messageError(message) {
  messageGeneral("Error!", message, "error");
}
function messageGeneral(header, message, type) {
  lastAlertId++;
  var thisID = lastAlertId;
  $('#alerts').append('<div id="alert' + thisID + '" class="alert alert-' + type + '" style="display:none;"><a type="button" class="close" href="#" onClick="$(\'#alert' + thisID + '\').hide(\'slow\');return false;">&times;</a><strong>' + header + '</strong> ' + message + '</div>');
  $('#alert' + thisID).show("slow");
  setTimeout(function () {
    $('#alert' + thisID).hide('slow');
  }, 5000);
}
