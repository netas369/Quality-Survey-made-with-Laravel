document.addEventListener("DOMContentLoaded", function() {
    const ratingContainers = document.querySelectorAll('.rating');

    ratingContainers.forEach(function(ratingContainer) {
        const ratingInputs = ratingContainer.querySelectorAll('input[type="radio"]');

        ratingInputs.forEach(function(input) {
            input.addEventListener("click", function() {
                // Remove the "selected" class from all inputs and labels within the container
                ratingInputs.forEach(function(ratingInput) {
                    const label = ratingContainer.querySelector('label[for="' + ratingInput.id + '"]');
                    ratingInput.classList.remove("selected");
                    label.classList.remove("selected");
                });

                // Add the "selected" class to the selected input and label within the container
                const selectedInput = ratingContainer.querySelector('input[type="radio"]:checked');
                const selectedLabel = ratingContainer.querySelector('label[for="' + selectedInput.id + '"]');
                selectedInput.classList.add("selected");
                selectedLabel.classList.add("selected");
            });
        });
    });
});
