$(document).ready(function() {
  $('#button').click(function() {
    var toAdd = $('#toAdd').val();
    $('.todoList').append('<div class="checkbox"> <input type="checkbox">' + toAdd + '</div>');

  });
  $(document).on('click', '.checkbox', function() {
    $(this).remove();
  });
});