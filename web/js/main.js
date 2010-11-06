/**
 * show the loading text and locks the screen
 */
function showLoading()
{
  $.loading({
    align: 'center',
    pulse: 'working type',
    text: 'Loading...',
    mask: true
  });
}

/**
 * hide the loading text and unlocks the screen
 */
function hideLoading()
{
  $.loading(false);
}

/**
 * show the loading text and locks the element
 */
function showLoadingFor(id)
{
  $(id).loading({
    align: 'center',
    pulse: 'working type',
    text: 'Loading...',
    mask: true
  });
}

/**
 * hide the loading text and unlocks the element
 */
function hideLoadingFor(id)
{
  $(id).loading(false);
}