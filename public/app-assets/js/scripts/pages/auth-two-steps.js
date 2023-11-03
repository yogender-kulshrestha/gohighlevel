var inputContainer = document.querySelector('.auth-input-wrapper');

// Get focus on next element after max-length reach
inputContainer.onkeyup = function (e) {
  var target = e.srcElement;
  var maxLength = parseInt(target.attributes['maxlength'].value, 10);
  var currentLength = target.value.length;

  if (e.keyCode === 8) {
    if (currentLength === 0) {
      var next = target;
      while ((next = next.previousElementSibling)) {
        if (next == null) break;
        if (next.tagName.toLowerCase() == 'input') {
          next.focus();
          break;
        }
      }
    }
  } else {
    if (currentLength >= maxLength) {
      var next = target;
      while ((next = next.nextElementSibling)) {
        if (next == null) break;
        if (next.tagName.toLowerCase() == 'input') {
          next.focus();
          break;
        }
      }
    }
  }
};

//  Two Steps Verification
const numeralMask = document.querySelectorAll('.numeral-mask');

// Verification masking
if (numeralMask.length) {
  numeralMask.forEach(e => {
    new Cleave(e, {
      numeral: true
    });
  });
}
