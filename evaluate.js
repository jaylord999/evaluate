document.getElementById('proceedToEvaluation').addEventListener('click', function() {
    var form = document.getElementById('initialForm');
    var formData = new FormData(form);
  
    fetch('process_initial_form.php', {
      method: 'POST',
      body: formData
    })
    .then(function(response) {
      if (response.ok) {
        // Redirect to the main evaluation form
        window.location.href = 'evaluation_form.php';
      } else {
        alert('Error submitting the form. Please try again.');
      }
    })
    .catch(function(error) {
      console.error('Error:', error);
      alert('An error occurred. Please try again later.');
    });
  });
  
  // Get all the rating inputs
  const ratingInputs = document.querySelectorAll('.rating-input');
  
  // Add event listener to each rating input
  ratingInputs.forEach((input) => {
    input.addEventListener('input', updateRatingBar);
  });
  
  function updateRatingBar(event) {
    const ratingInput = event.target;
    const ratingValue = parseInt(ratingInput.value);
    const ratingBar = ratingInput.closest('.rating-bar').querySelector('.bar');
    ratingBar.style.width = `${(ratingValue / 5) * 100}%`;
  }